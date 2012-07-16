<?php

Doo::loadController('MainController');
Doo::loadModel('Company');
Doo::loadModel('Department');
Doo::loadModel('Employee');
Doo::loadModel('BusinessPartner');
Doo::loadModel('Vacancy');
Doo::loadModel('Rrf');

class EmployerController extends MainController {

   public function beforeRun($resource, $action) {
      session_start();

      //if not login, group = anonymous
      $role = (isset($_SESSION['user']['group'])) ? $_SESSION['user']['group'] : 'anonymous';

      //check against the ACL rules
      if ($rs = $this->acl()->process($role, $resource, $action)) {
         //echo $role .' is not allowed for '. $resource . ' '. $action;
         return $rs;
      }
   }

   /*
    * index:
    * view company's profile
    * and we hv links to edit my profile, view all RRFs, search for CVs,
    * view vacancies, view applicants, and a link
    * to assign the depts of the company and the contact person of each dept
    */

   public function index() {
      $employee_md5_id = $_SESSION['user']['MID'];
      $employee = new BusinessPartner();
      $employee = $employee->getOne(array('where' => "md5(employee.id) = '$employee_md5_id'"));
      $employee = $employee->relateExpand(array('Department', 'Company'));
      $employee = $employee[0];

      if ($employee instanceof BusinessPartner) {
         if ($employee->Department instanceof Department) {
            if ($employee->Department->name == 'HR') {
               if ($employee->Department->Company instanceof Company) {
                  if (!$employee->Department->Company->completed) {
                     return Doo::conf()->APP_URL . 'employer/assign_dept';
                  } else {
                     $department = new Department();
                     $this->data['departments'] = $department->find(array('where' => "company_id = '{$employee->Department->Company->id}' AND department.name NOT LIKE 'HR'"));

                     $vacancy = new Vacancy();
                     $this->data['vacancies'] = $vacancy->relate('Department', array('where' => "department.company_id = '{$employee->Department->Company->id}'"));

                     $rrf = new Rrf();
                     $this->data['rrfs'] = $rrf->relate('Department', array('where' => "department.company_id = '{$employee->Department->Company->id}'"));

                     return $this->renderTemplate('index', 'employer');
                  }
               }
            } else {
               return Doo::conf()->APP_URL . 'dept';
            }
         }
      } else {
         $this->addFlash('error', 'error');
         return Doo::conf()->APP_URL;
      }
   }

   /*
    * assign_dept:
    * assigns each dept and the contact person and the pswd of each one
    */

   public function assign_dept() {
      $this->data['page_js'] = array('company/assign_dept');
      return $this->renderTemplate('assign_dept', 'employer');
   }

   public function assign_dept_submit() {
      if (!isset($_POST['department']) || empty($_POST['department']))
         return $this->returnFlash('error', 'all field required');

      $employee_md5_id = $_SESSION['user']['MID'];
      $employee = new BusinessPartner();
      $employee = $employee->relate('Department', array('where' => "md5(employee.id) = '$employee_md5_id'"));
      $employee = $employee[0];
      if (!$employee instanceof BusinessPartner) {
         return $this->returnFlash('error', 'employee not found');
      }

      $company_id = $employee->Department->company_id;

      foreach ($_POST['department'] as $dpt) {
         $dpt['company_id'] = $company_id;
         $dpt['business_partner'] = 0;
         $department = new Department($dpt);
         $v_res = $department->validate();
         if ($this->check_err($v_res)) {
            $this->addFlash('error', $this->error_str);
         } else {
            $department->id = $department->insert();
            if ($department->id) {
               $dpt['employee']['department_id'] = $department->id;
               $dpt['employee']['password'] = md5($dpt['employee']['password']);
               $business_partner = new Employee($dpt['employee']);
               $v_res = $business_partner->validate();
               if ($this->check_err($v_res)) {
                  $this->addFlash('error', $this->error_str);
               } else {
                  $business_partner_id = $business_partner->insert();
                  if ($business_partner_id) {
                     $department->business_partner = $business_partner_id;
                     $department->update();
                  }
               }
            }
         }
      }

      if (isset($this->error_str) && !empty($this->error_str)) {
         return $_SERVER['HTTP_REFERER'];
      }

      $company = new Company();
      $company->id = $company_id;
      $company = $company->getOne();
      $company->completed = 1;
      $company->update();

      return Doo::conf()->APP_URL . 'employer';
   }

   public function edit_dept() {
      if (!isset($this->params[0]))
         return $this->returnFlash('error', 'error in url');

      $department = new Department();
      $department->id = $this->params[0];
      $department = $department->getOne();

      if (!$department instanceof Department) {
         return $this->returnFlash('error', 'Department not found found');
      }
      $department = $department->relate('BusinessPartner');
      $this->data['department'] = $department[0];

      return $this->renderTemplate('edit_dept', 'employer');
   }

   public function edit_dept_submit() {
      if (!isset($_POST['department_name']) || !isset($_POST['department_id']))
         return $this->returnFlash('error', 'must not be empty');

      $department = new Department();
      $department->id = $_POST['department_id'];
      $department = $department->getOne();

      if (!$department instanceof Department) {
         return $this->returnFlash('error', 'Department not found found');
      }

      $department->name = $_POST['department_name'];
      $department->update();

      $this->addFlash('success', 'company profile edited succefuly');
      return Doo::conf()->APP_URL . 'employer';
   }

   /*
    * view_RRF:
    * view the RRF with its all infos and we have
    * a link to accept RRF and this will post it as a vacancy to the site
    * and a link to refuse the RRf and contact the dept
    */

   public function view_rrf() {
      if (!isset($this->params[0]))
         return $this->returnFlash('error', 'error in url');

      $rrf = new Rrf();
      $rrf->id = $this->params[0];
      $rrf = $rrf->relateMany(array('Country', 'Industry'));
      $rrf = $rrf[0];

      if (!$rrf instanceof Rrf)
         return $this->returnFlash('error', 'Rrf not found');

      $this->data['rrf'] = $rrf;
      return $this->renderTemplate('view_rrf', 'employer');
   }

   /*
    * process_rrf:
    * shld publish the RRF to the website as a vacancy
    */

   public function process_rrf() {
      if (!isset($this->params[0]) || !isset($this->params[1]))
         return $this->returnFlash('error', 'error in url');

      $rrf = new Rrf();
      $rrf->id = $this->params[0];
      $rrf = $rrf->getOne();
      if (!$rrf instanceof Rrf)
         return $this->returnFlash('error', 'RRF not found');

      switch ($this->params[1]) {
         case 'r':
            $rrf->status = 'rejected';
            $rrf->update();
            $this->addFlash('success', 'RRf rejcted');
            break;
         case 'a':
            $new_rrf = clone $rrf;
            $new_rrf = $new_rrf->unset_extra_fields();
            $rrf_array = get_object_vars($new_rrf); // an old way to convert from object to array
            $vacancy = new Vacancy($rrf_array);
            $v_res = $vacancy->validate();
            if ($this->check_err($v_res)) {
               return $this->returnFlash('error', $this->error_str);
            } else {
               $vacancy->status = 'empty';
               $vacancy->insert();
               $rrf->delete();
               $this->addFlash('success', 'vacancy created successfuly');
            }
            break;

         case 'd':
            $rrf->delete();
            $this->addFlash('success', 'RRF deleted successfuly');
            break;
      }
      return Doo::conf()->APP_URL . 'employer';
   }

   public function view_vacancy() {
      if (!isset($this->params[0]))
         return $this->returnFlash('error', 'error in url');
      $vacancy = new Vacancy();
      $vacancy->id = $this->params[0];
      $vacancy = $vacancy->relateMany(array('Country', 'Industry'));
      $vacancy = $vacancy[0];
      if (!$vacancy instanceof Vacancy)
         return $this->returnFlash('error', 'Vacancy not found');

      $this->data['vacancy'] = $vacancy;

      $vacancy_can = $vacancy->relate('CandidateInfo');
      if ($vacancy_can instanceof Vacancy) {
         if ($vacancy_can->CandidateInfo instanceof CandidateInfo) {
            $this->data['candidates'] = $vacancy_can->CandidateInfo;
         } else {
            $this->data['candidates'] = array();
         }
      } else {
         $this->data['candidates'] = array();
      }

      $vacancy_app = $vacancy->relate('Seeker');
      $vacancy_app = $vacancy_app[0];
      if ($vacancy_app instanceof Vacancy) {
         $this->data['applicants'] = $vacancy_app->Seeker;
      } else {
         $this->data['applicants'] = array();
      }

      return $this->renderTemplate('view_vacancy', 'employer');
   }

   public function process_vacancy() {
      if (!isset($this->params[0]) || !isset($this->params[1]))
         return $this->returnFlash('error', 'error in url');

      $vacancy = new Vacancy();
      $vacancy->id = $this->params[0];
      $vacancy = $vacancy->getOne();

      if (!$vacancy instanceof Vacancy)
         return $this->returnFlash('error', 'Vacancy not found');


      switch ($this->params[1]) {
         case 'd':
            $vacancy->delete_vacancy();
            $this->addFlash('success', 'vacancy deleted successfuly');
            break;
      }

      return Doo::conf()->APP_URL . 'employer';
   }

   /*
    * edit_profile:
    * view edit_profile page
    */

   public function edit_profile() {
      $employee_md5_id = $_SESSION['user']['MID'];
      $employee = new BusinessPartner();
      $employee = $employee->getOne(array('where' => "md5(employee.id) = '$employee_md5_id'"));
      $employee = $employee->relateExpand(array('Department', 'Company'));
      $employee = $employee[0];

      if (!$employee instanceof BusinessPartner) {
         return $this->returnFlash('error', 'employee not found');
      }
      $this->data['company'] = $employee->Department->Company;

      $industry = Doo::loadModel('Industry', true);
      $industry = $industry->find();
      $this->data['industries'] = $industry;

      $country = Doo::loadModel('Country', TRUE);
      $country = $country->find();
      $this->data['countries'] = $country;
      return $this->renderTemplate('edit_profile', 'employer');
   }

   public function edit_profile_submit() {
      if (!isset($_POST['company']))
         return $this->returnFlash('error', 'must not be empty');

      $company = new Company();
      $company->id = $_POST['company']['id'];
      $company = $company->getOne();

      $company->update_attributes($_POST['company']);
      $v_res = $company->validate();

      if ($this->check_err($v_res)) {
         return $this->returnFlash('error', $this->error_str);
      }
      $company->update();

      $this->addFlash('success', 'company profile edited succefuly');
      return Doo::conf()->APP_URL . 'employer';
   }

   /*
    * search_cv:
    * view list of CVs page
    */

   public function search_cv() {
      return $this->renderTemplate('search_cv', 'app');
   }

}

?>
