<?php

Doo::loadController('MainController');
Doo::loadModel('Seeker');
Doo::loadModel('Country');
Doo::loadModel('SeekerProfessionalInfo');
Doo::loadModel('Industry');
Doo::loadModel('SeekerWorkExp');
Doo::loadModel('SeekerEduDegree');
Doo::loadModel('SeekerEdu');
Doo::loadModel('SeekerEduInfo');
Doo::loadModel('SeekerOtherInfo');

class SeekerController extends MainController {

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
    * view seeker's profile
    * link to edit my profile
    * link to view and edit my CV
    * link to see the jobs applied for
    */

   public function index() {
      $md5_id = $_SESSION['user']['MID'];
      $seeker = new Seeker();
      $seeker = $seeker->getOne(array('where' => "md5(id) = '$md5_id'"));
      if (!$seeker instanceof Seeker)
         return $this->returnFlash('error', 'user not found');
      if ($seeker->status == 'new')
         return Doo::conf()->APP_URL . 'seeker/create_profile';

      if ($seeker->status != 'complete')
         if (!$seeker->upload_cv)
            return Doo::conf()->APP_URL . 'seeker/cv_builder';

      $seeker = $seeker->relateMany(array('SeekerEduInfo', 'SeekerProfessionalInfo', 'SeekerOtherInfo'));
      $seeker = $seeker[0];

      if (!$seeker instanceof Seeker)
         return $this->returnFlash('error', 'seeker not found');

      $seeker->nationalities = json_decode($seeker->nationalities);
      $nationalities = array();
      foreach ($seeker->nationalities as $nationalitie) {
         $national = new Country();
         $national->id = $nationalitie;
         $national = $national->getOne();
         $nationalities[] = $national;
      }

      $seeker->nationalities = $nationalities;
      $living_in = new Country();
      $living_in->id = $seeker->living_in;
      $seeker->living_in = $living_in->getOne();

      $comm = new Industry();
      $comm->id = $seeker->SeekerProfessionalInfo->primary_comm;
      $seeker->SeekerProfessionalInfo->primary_comm = $comm->getOne();

      if ($seeker->SeekerProfessionalInfo->second_comm != 0) {
         $comm = new Industry();
         $comm->id = $seeker->SeekerProfessionalInfo->second_comm;
         $seeker->SeekerProfessionalInfo->second_comm = $comm->getOne();
      }

      if ($seeker->SeekerProfessionalInfo->third_comm != 0) {
         $comm = new Industry();
         $comm->id = $seeker->SeekerProfessionalInfo->third_comm;
         $seeker->SeekerProfessionalInfo->third_comm = $comm->getOne();
      }
      $seeker->SeekerProfessionalInfo->lang_list = json_decode($seeker->SeekerProfessionalInfo->lang_list);

      $place = new Country();
      $place->id = $seeker->SeekerProfessionalInfo->preferd_place;
      $seeker->SeekerProfessionalInfo->preferd_place = $place->getOne();

      $this->data['seeker'] = $seeker;
      return $this->renderTemplate('index', 'seeker');
   }

   /*
    * create_profile:
    * view create_profile page
    * to enter his basic info, his profissional info
    * his educational info, his CV info and id he want to upload the CV now or
    * later or create a new one at now
    */

   public function create_profile() {
      $md5_id = $_SESSION['user']['MID'];
      $seeker = new Seeker();
      $seeker = $seeker->getOne(array('where' => "md5(id) = '$md5_id'"));
      if (!$seeker instanceof Seeker)
         return $this->returnFlash('error', 'user not found');
      if ($seeker->status != 'new')
         return Doo::conf()->APP_URL . 'seeker';

      $country = new Country();
      $countries = $country->find();
      $this->data['countries'] = $countries;

      $industry = new Industry();
      $industries = $industry->find();
      $this->data['industries'] = $industries;

      $this->data['page_js'] = array('seeker/create_profile');
      return $this->renderTemplate('create_profile', 'seeker');
   }

   public function create_profile_submit() {
      $md5_id = $_SESSION['user']['MID'];
      if ((!isset($_POST['seeker']) || empty($_POST['seeker']) ) && (!isset($_POST['seeke_prof_info']) || empty($_POST['seeke_prof_info']) ) && (!isset($_POST['seeker_edu_info']) || empty($_POST['seeker_edu_info']) )) {
         return $this->returnFlash('error', 'all field required');
      }

      $seeker = new Seeker();
      $seeker = $seeker->getOne(array('where' => "md5(id) = '$md5_id'"));

      if (!$seeker instanceof Seeker) {
         return $this->returnFlash('error', 'user not found');
      }

      $_POST['seeker']['id'] = $seeker->id; //to set the id in the post
      $_POST['seeker']['password'] = $seeker->password; //to set the id in the post
      $_POST['seeker']['email'] = $seeker->email; //to set the id in the post
      $_POST['seeker']['nationalities'] = json_encode($_POST['nationalities']);

      $seeker = new Seeker($_POST['seeker']); //the constructer take the id 
      $v_res = $seeker->validate();

      if ($this->check_err($v_res)) {
         return $this->returnFlash('error', $this->error_str);
      }

      $seeker->update(); //updadte with the id that has been set

      $_POST['seeke_prof_info']['lang_list'] = json_encode($_POST['languages']);

      if ($_POST['seeke_prof_info']['exp_years']) {
         $_POST['seeke_prof_info']['have_exp'] = 1;
      }

      $_POST['seeke_prof_info']['seeker_id'] = $seeker->id;

      $seeker_prof_info = new SeekerProfessionalInfo($_POST['seeke_prof_info']);
      $v_res = $seeker_prof_info->validate();

      if ($this->check_err($v_res)) {
         return $this->returnFlash('error', $this->error_str);
      }
      $seeker_prof_info->insert();

      $_POST['seeker_edu_info']['seeker_id'] = $seeker->id;

      $seeker_edu_info = new SeekerEduInfo($_POST['seeker_edu_info']);
      $v_res = $seeker_edu_info->validate();

      if ($this->check_err($v_res)) {
         return $this->returnFlash('error', $this->error_str);
      }
      $seeker_edu_info->insert();

      $seeker->status = 'complete';
      $seeker->update();

      if ($seeker->upload_cv)
         return Doo::conf()->APP_URL . 'seeker';
      else
         return Doo::conf()->APP_URL . 'seeker/cv_builder';
   }

   public function cv_builder() {
      $country = new Country();
      $countries = $country->find();
      $this->data['countries'] = $countries;

      $this->data['page_js'] = array('seeker/cv_builder');
      return $this->renderTemplate('cv_builder', 'seeker');
   }

   public function cv_builder_submit() {

      if ((!isset($_POST['work_exp']) || empty($_POST['work_exp']) ) && (!isset($_POST['degree']) || empty($_POST['degree']) ) && (!isset($_POST['edu']) || empty($_POST['edu']) ) && (!isset($_POST['other']) || empty($_POST['other']) ))
         return $this->returnFlash('error', 'must not be empty');

      $md5_id = $_SESSION['user']['MID'];
      $seeker = new Seeker();
      $seeker = $seeker->getOne(array('where' => "md5(id) = '$md5_id'"));
      if (!$seeker instanceof Seeker) {
         return $this->returnFlash('error', 'user not found');
      }

      foreach ($_POST['work_exp'] as $work_exp_post) {

         $work_exp_post['seeker_id'] = $seeker->id;

         $work_exp = new SeekerWorkExp($work_exp_post);
         $v_res = $work_exp->validate();
         if ($this->check_err($v_res)) {
            $this->addFlash('error', $this->error_str);
         } else {
            $work_exp->insert();
         }
      }

      foreach ($_POST['degree'] as $degree_post) {
         $degree_post['seeker_id'] = $seeker->id;
         $degree = new SeekerEduDegree($degree_post);
         $v_res = $degree->validate();
         if ($this->check_err($v_res)) {
            $this->addFlash('error', $this->error_str);
         } else {
            $degree->insert();
         }
      }

      foreach ($_POST['edu'] as $edu_post) {
         $edu_post['seeker_id'] = $seeker->id;
         $edu = new SeekerEdu($edu_post);
         $v_res = $edu->validate();
         if ($this->check_err($v_res)) {
            $this->addFlash('error', $this->error_str);
         } else {
            $edu->insert();
         }
      }

      foreach ($_POST['other'] as $other_post) {
         $other_post['seeker_id'] = $seeker->id;
         $other = new SeekerOtherInfo($other_post);
         $v_res = $other->validate();
         if ($this->check_err($v_res)) {
            $this->addFlash('error', $this->error_str);
         } else {
            $other->insert();
         }
      }

      if (isset($this->error_str) && !empty($this->error_str)) {
         return $_SERVER['HTTP_REFERER'];
      }
      $seeker->status = 'complete';
      $seeker->update();

      $this->addFlash('success', 'Cv built successfuly');
      return Doo::conf()->APP_URL . 'seeker';
   }

   /*
    * edit_profile:
    * view edit_profile page
    */

   public function edit_profile() {
      $md5_id = $_SESSION['user']['MID'];
      $seeker = new Seeker();
      $seeker = $seeker->getOne(array('where' => "md5(id) = '$md5_id'"));
      if (!$seeker instanceof Seeker)
         return $this->returnFlash('error', 'user not found');

      $seeker = $seeker->relateMany(array('SeekerEduInfo', 'SeekerProfessionalInfo'));
      $seeker = $seeker[0];
      $seeker->nationalities = json_decode($seeker->nationalities);
      $seeker->SeekerProfessionalInfo->lang_list = json_decode($seeker->SeekerProfessionalInfo->lang_list);

      if (!$seeker instanceof Seeker)
         return $this->returnFlash('error', 'seeker not found');

      $country = new Country();
      $countries = $country->find();
      $this->data['countries'] = $countries;

      $industry = new Industry();
      $industries = $industry->find();
      $this->data['industries'] = $industries;

      $this->data['page_js'] = array('seeker/create_profile');

      $this->data['seeker'] = $seeker;
      return $this->renderTemplate('edit_profile', 'seeker');
   }

   public function edit_profile_submit() {

      $md5_id = $_SESSION['user']['MID'];
      if ((!isset($_POST['seeker']) || empty($_POST['seeker']) ) && (!isset($_POST['seeke_prof_info']) || empty($_POST['seeke_prof_info']) ) && (!isset($_POST['seeker_edu_info']) || empty($_POST['seeker_edu_info']) )) {
         return $this->returnFlash('error', 'all field required');
      }

      $seeker = new Seeker();
      $seeker = $seeker->getOne(array('where' => "md5(id) = '$md5_id'"));

      if (!$seeker instanceof Seeker) {
         return $this->returnFlash('error', 'user not found');
      }
      $_POST['seeker']['id'] = $seeker->id; //to set the id in the post
      $_POST['seeker']['password'] = $seeker->password; //to set the id in the post
      $_POST['seeker']['email'] = $seeker->email; //to set the id in the post
      $_POST['seeker']['nationalities'] = json_encode($_POST['nationalities']);

      $seeker = new Seeker($_POST['seeker']); //the constructer take the id 
      $v_res = $seeker->validate();

      if ($this->check_err($v_res)) {
         return $this->returnFlash('error', $this->error_str);
      }

      $seeker->update(); //updadte with the id that has been set


      $_POST['seeke_prof_info']['lang_list'] = json_encode($_POST['languages']);

      if ($_POST['seeke_prof_info']['exp_years']) {
         $_POST['seeke_prof_info']['have_exp'] = 1;
      }

      $seeker_prof_info = new SeekerProfessionalInfo();
      $seeker_prof_info->seeker_id = $seeker->id;
      $seeker_prof_info = $seeker_prof_info->getOne();
      echo "<pre>";
      var_dump($seeker_prof_info);
      echo"<hr/>";
      var_dump($_POST['seeke_prof_info']);
      echo"<hr/>";
      die();
      $seeker_prof_info->update_attributes($_POST['seeke_prof_info']);


      $seeker_edu_info = new SeekerEduInfo();
      $seeker_edu_info->seeker_id = $seeker->id;
      $seeker_edu_info = $seeker_edu_info->getOne();
      $seeker_edu_info->update_attributes($_POST['seeker_edu_info']);


      $this->addFlash('error', 'seeker\'s profile updated successfuly');
      return Doo::conf()->APP_URL . 'seeker';
   }

   /*
    * view_edit_cv:
    * view CV and we hv a link to edit CV
    */

   public function view_cv() {
      $md5_id = $_SESSION['user']['MID'];
      $seeker = new Seeker();
      $seeker = $seeker->getOne(array('where' => "md5(id) = '$md5_id'"));

      $seeker = $seeker->relateMany(array('SeekerWorkExp', 'SeekerEduDegree', 'SeekerEdu', 'SeekerOtherInfo'));
      $seeker = $seeker[0];

      if (!$seeker instanceof Seeker)
         return $this->returnFlash('error', 'user not found');

      $this->data['seeker'] = $seeker;

      $country = new Country();
      $countries = $country->find();
      $this->data['countries'] = $countries;

      $this->data['page_js'] = array('seeker/cv_builder');
      return $this->renderTemplate('view_cv', 'seeker');
   }

   public function view_cv_submit() {
      if ((!isset($_POST['work_exp']) || empty($_POST['work_exp']) ) && (!isset($_POST['degree']) || empty($_POST['degree']) ) && (!isset($_POST['edu']) || empty($_POST['edu']) ) && (!isset($_POST['other']) || empty($_POST['other']) ))
         return $this->returnFlash('error', 'must not be empty');

      $md5_id = $_SESSION['user']['MID'];
      $seeker = new Seeker();
      $seeker = $seeker->getOne(array('where' => "md5(id) = '$md5_id'"));
      if (!$seeker instanceof Seeker) {
         return $this->returnFlash('error', 'user not found');
      }

      Seeker::deleteAllWorkExps($seeker->id);
      foreach ($_POST['work_exp'] as $work_exp_post) {

         $work_exp_post['seeker_id'] = $seeker->id;

         $work_exp = new SeekerWorkExp($work_exp_post);
         $v_res = $work_exp->validate();
         if ($this->check_err($v_res)) {
            $this->addFlash('error', $this->error_str);
         } else {
            $work_exp->insert();
         }
      }

      Seeker::deleteAllDegrees($seeker->id);
      foreach ($_POST['degree'] as $degree_post) {
         $degree_post['seeker_id'] = $seeker->id;
         $degree = new SeekerEduDegree($degree_post);
         $v_res = $degree->validate();
         if ($this->check_err($v_res)) {
            $this->addFlash('error', $this->error_str);
         } else {
            $degree->insert();
         }
      }

      Seeker::deleteAllEdus($seeker->id);
      foreach ($_POST['edu'] as $edu_post) {
         $edu_post['seeker_id'] = $seeker->id;
         $edu = new SeekerEdu($edu_post);
         $v_res = $edu->validate();
         if ($this->check_err($v_res)) {
            $this->addFlash('error', $this->error_str);
         } else {
            $edu->insert();
         }
      }

      Seeker::deleteAllOthers($seeker->id);
      foreach ($_POST['other'] as $other_post) {
         $other_post['seeker_id'] = $seeker->id;
         $other = new SeekerOtherInfo($other_post);
         $v_res = $other->validate();
         if ($this->check_err($v_res)) {
            $this->addFlash('error', $this->error_str);
         } else {
            $other->insert();
         }
      }

      if (isset($this->error_str) && !empty($this->error_str)) {
         return $_SERVER['HTTP_REFERER'];
      }

      $this->addFlash('success', 'Cv updated successfuly');
      return Doo::conf()->APP_URL . 'seeker';
   }

   /*
    * applied_jobs:
    * view applied_jobs page
    */

   public function applied_jobs() {
      return $this->renderTemplate('applied_jobs', 'app');
   }

}

?>
