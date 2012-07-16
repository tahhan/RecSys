<?php

Doo::loadController('MainController');

Doo::loadModel('Company');
Doo::loadModel('Department');
Doo::loadModel('Employee');
Doo::loadModel('Seeker');

class UserController extends MainController {

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
    * signup:
    * view signup page
    */

   public function signup() {
      if (!isset($this->params[0]))
         return $this->returnFlash('error', 'error in url');
      $this->data['user_type'] = $this->params[0];

      switch ($this->params[0]) {
         case 'employer':
            $industry = Doo::loadModel('Industry', true);
            $industry = $industry->find();
            $this->data['industries'] = $industry;

            $country = Doo::loadModel('Country', TRUE);
            $country = $country->find();
            $this->data['countries'] = $country;

            return $this->renderTemplate('employer_signup', 'user');
            break;
         case 'seeker':
            return $this->renderTemplate('seeker_signup', 'user');
            break;
      }
   }

   public function signup_submit() {
      if (!isset($this->params[0]))
         return $this->returnFlash('error', 'error in url');

      switch ($this->params[0]) {
         case 'employer':
            if ((!isset($_POST['company']) || empty($_POST['company'])) && (!isset($_POST['employee']) || empty($_POST['employee'])))
               return $this->returnFlash('error', 'you must fill form');
            
            $employee = new Employee();
            $employee->email = $_POST['employee']['email'];
            $employee = $employee->getOne();
            if($employee instanceof Employee){
               return $this->returnFlash('error', 'email already exist');
            }
            
            $_POST['company']['contact_person'] = 0;
            $company = new Company($_POST['company']);
            $v_res = $company->validate();

            if ($this->check_err($v_res)) {
               return $this->returnFlash('error', $this->error_str);
            }

            $company->id = $company->insert();

            $dept = new Department();
            $dept->company_id = $company->id;
            $dept->name = "HR";
            $dept->id = $dept->insert();

            $_POST['employee']['password'] = md5($_POST['employee']['password']);
            $employee = new Employee($_POST['employee']);
            $employee->department_id = $dept->id;
            $employee->id = $employee->insert();

            $dept->business_partner = $employee->id;
            $dept->update();

            $company->contact_person = $employee->id;
            $company->update();

            $_SESSION['user']['group'] = 'employer';
            $_SESSION['user']['name'] = $company->company_name;
            $_SESSION['user']['MID'] = md5($employee->id);

            $this->addFlash('highlight', 'Company created successfully');

            return Doo::conf()->APP_URL . 'employer/assign_dept';
            break;
         case 'seeker':
            if (!isset($_POST['user']) || empty($_POST['user']))
               return $this->returnFlash('error', 'you must fill form');

            if ($_POST['user']['password'] != $_POST['cpassword'])
               return $this->returnFlash('error', 'Passowrd Must match');
            
            $seeker = new Seeker();
            $seeker->email = $_POST['user']['email'];
            $seeker = $seeker->getOne();
            if($seeker instanceof Seeker){
               return $this->returnFlash('error', 'email already exist');
            }
            
            $_POST['user']['password'] = md5($_POST['user']['password']);
            $seeker = new Seeker();
            $seeker = $seeker->createDefault($_POST['user']);
            if (!$seeker)
               return $this->returnFlash('error', 'some data is wrong');

            $tmp_seeker = $seeker->getOne(array('where' => "email = '{$seeker->email}'"));
            if ($tmp_seeker instanceof Seeker) {
               return $this->returnFlash('error', 'email already taken');
            }


            $seeker->id = $seeker->insert();
            //upload CV we have to put a table for seeker_CV as the file upload and there names
            //or just upload the file and give it the id of the seeker and check if exist or not thats it

            $seeker->UploadCV('file');

            $_SESSION['user']['group'] = 'seeker';
            $_SESSION['user']['name'] = $seeker->full_name;
            $_SESSION['user']['MID'] = md5($seeker->id);

            $this->addFlash('highlight', 'registered successfully');

            return Doo::conf()->APP_URL . 'seeker/create_profile';
            break;
      }
   }

   public function login() {
      if (!isset($this->params[0]))
         return $this->returnFlash('error', 'error in url');
      if (isset($_SESSION['user']['group'])) {
         return Doo::conf()->APP_URL . $_SESSION['user']['group'];
      }

      if ($this->params[0] == 'employer') {
         $industry = Doo::loadModel('Industry', true);
         $industry = $industry->find();
         $this->data['industries'] = $industry;

         $country = Doo::loadModel('Country', TRUE);
         $country = $country->find();
         $this->data['countries'] = $country;
      }

      $this->data['user_type'] = $this->params[0];
      return $this->renderTemplate('login', 'user');
   }

   public function login_submit() {
      if (!isset($this->params[0]))
         return $this->returnFlash('error', 'error in url');
      if (!isset($_POST['user']) || empty($_POST['user']))
         return $this->returnFlash('error', 'please fill the form');
      $this->data['user_type'] = $this->params[0];

      switch ($this->params[0]) {
         case 'seeker':
            $seeker = new Seeker();
            $seeker->email = $_POST['user']['email'];
            $seeker = $seeker->getOne();
            if (!$seeker instanceof Seeker) {
               return $this->returnFlash('error', 'email or password is wrong');
            }
            if ($seeker->password != md5($_POST['user']['password'])) {
               return $this->returnFlash('error', 'email or password is wrong');
            }
            $_SESSION['user']['group'] = 'seeker';
            $_SESSION['user']['name'] = $seeker->full_name;
            $_SESSION['user']['MID'] = md5($seeker->id);
            return Doo::conf()->APP_URL . 'seeker';
            break;
         case 'employer':
            $employee = new Employee();
            $employee->email = $_POST['user']['email'];
            $employee = $employee->getOne();
            if (!$employee instanceof Employee) {
               return $this->returnFlash('error', 'email or password is wrong');
            }
            if ($employee->password != md5($_POST['user']['password'])) {
               return $this->returnFlash('error', 'email or password is wrong');
            }
            $_SESSION['user']['group'] = 'employer';
            $_SESSION['user']['name'] = $employee->name;
            $_SESSION['user']['MID'] = md5($employee->id);

            return DOO::conf()->APP_URL . 'employer';
            break;
      }
   }

   public function logout() {
      //session_start();
      unset($_SESSION['user']);
      session_destroy();
      return Doo::conf()->APP_URL;
   }

}

?>
