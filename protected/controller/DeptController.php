<?php

Doo::loadController('MainController');
Doo::loadModel('Company');
Doo::loadModel('Department');
Doo::loadModel('Employee');
Doo::loadModel('BusinessPartner');
Doo::loadModel('Vacancy');
Doo::loadModel('Rrf');
Doo::loadModel('Industry');
Doo::loadModel('Country');

class DeptController extends MainController {

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
    * view dept's profile and links to edit my profile, view applicants,
    * add new RRF, view sent RRF, view related vacancies, search for CVs
    */

   public function index() {
      $employee_md5_id = $_SESSION['user']['MID'];
      $employee = new BusinessPartner();
      $employee = $employee->relate('Department', array('where' => "md5(employee.id) = '$employee_md5_id'"));

      if (!$employee[0] instanceof Employee) {
         $this->addFlash('error', 'employee not found');
         return Doo::conf()->APP_URL;
      }
      $employee = $employee[0];
      $this->data['dept'] = $employee->Department;

      $vacancy = new Vacancy();
      $this->data['vacancies'] = $vacancy->relate('Department', array('where' => "department.company_id = '{$employee->Department->company_id}'"));

      $rrf = new Rrf();
      $this->data['rrfs'] = $rrf->relate('Department', array('where' => "department.company_id = '{$employee->Department->company_id}'"));

      return $this->renderTemplate('index', 'dept');
   }

   /*
    * add_rrf:
    * view add_rrf page and a link to send it to HR
    */

   public function add_rrf() {
      $employee_md5_id = $_SESSION['user']['MID'];
      $employee = new BusinessPartner();
      $employee = $employee->relate('Department', array('where' => "md5(employee.id) = '$employee_md5_id'"));

      if (!$employee[0] instanceof Employee) {
         $this->addFlash('error', 'employee not found');
         return Doo::conf()->APP_URL;
      }
      $employee = $employee[0];

      $this->data['department_id'] = $employee->Department->id;

      $industry = new Industry();
      $industries = $industry->find();
      $this->data['industries'] = $industries;

      $country = new Country();
      $countries = $country->find();
      $this->data['countries'] = $countries;

      return $this->renderTemplate('add_rrf', 'dept');
   }

   public function add_rrf_submit() {
      if (!isset($_POST['rrf']) || empty($_POST['rrf']))
         return $this->returnFlash('error', 'must not be empty');

      $rrf = new Rrf($_POST['rrf']);

      $v_res = $rrf->validate();
      if ($this->check_err($v_res)) {
         return $this->returnFlash('error', $this->error_str);
      } else {
         $rrf->insert();
      }

      $this->addFlash('success', 'RRF Added successfuly');

      return Doo::conf()->APP_URL . 'dept';
   }

   /*
    * view_rrf:
    * view sent rrfs 
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
      return $this->renderTemplate('view_rrf', 'dept');
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
      if ($vacancy_app instanceof Vacancy) {
         if ($vacancy_app->Seeker instanceof Seeker) {
            $this->data['applicants'] = $vacancy_app->Seeker;
         } else {
            $this->data['applicants'] = array();
         }
      } else {
         $this->data['applicants'] = array();
      }
      return $this->renderTemplate('view_vacancy', 'dept');
   }

}

?>
