<?php

Doo::loadModel('MainModel');
Doo::loadModel('SeekerApplyVacancy');

class Seeker extends MainModel {

   /**
    * @var int Max length is 11.
    */
   public $id;
   /**
    * @var varchar Max length is 200.
    */
   public $full_name;
   /**
    * @var varchar Max length is 100.
    */
   public $telephone;
   /**
    * @var varchar Max length is 150.
    */
   public $email;
   /**
    * @var varchar Max length is 100.
    */
   public $password;
   /**
    * @var date
    */
   public $DOB;
   /**
    * @var tinyint Max length is 4.
    */
   public $gender;
   /**
    * @var tinyint Max length is 4.
    */
   public $marital_status;
   /**
    * @var text
    */
   public $nationalities;
   /**
    * @var int Max length is 11.
    */
   public $living_in;
   /**
    * @var tinyint Max length is 4.
    */
   public $residency_status;
    
   public $upload_cv;
   
   public $status;
   
   public $_table = 'seeker';
   public $_primarykey = 'id';
   public $_fields = array('id', 'full_name', 'telephone', 'email', 'password', 'DOB', 'gender', 'marital_status', 'nationalities', 'living_in', 'residency_status', 'upload_cv', 'status');
   public static $_defaults = array();


   public function getVRules() {
      return array(
          'id' => array(
              array('integer'),
              array('maxlength', 11),
              array('optional'),
          ),
          'full_name' => array(
              array('maxlength', 200),
              array('optional'),
          ),
          'telephone' => array(
              array('maxlength', 100),
              array('optional'),
          ),
          'email' => array(
              array('maxlength', 150),
              array('optional'),
          ),
          'password' => array(
              array('maxlength', 100),
              array('notnull'),
          ),
          'DOB' => array(
              array('date'),
              array('optional'),
          ),
          'gender' => array(
              array('integer'),
              array('maxlength', 4),
              array('optional'),
          ),
          'marital_status' => array(
              array('integer'),
              array('maxlength', 4),
              array('optional'),
          ),
          'nationalities' => array(
              array('optional'),
          ),
          'living_in' => array(
              array('integer'),
              array('maxlength', 11),
              array('optional'),
          ),
          'residency_status' => array(
              array('integer'),
              array('maxlength', 4),
              array('optional'),
          )
      );
   }

   public static function createDefault($values = array()) {
      $values = array_merge(self::$_defaults, $values);
      $className = __CLASS__;
      $object = new $className($values);
      return ($object->validate()) ? FALSE : $object;
   }

   public function UploadCV($filename) {
      Doo::loadHelper('DooFile');
      $allowType = array('application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.oasis.opendocument.text', 'text/plain');
      $allowExt = array('pdf', 'doc', 'docx', 'txt');
      $uploadPath = Doo::conf()->SITE_PATH . 'global/uploads/cvs/';
              
      $file = new DooFile();
      if($file->checkFileType($filename, $allowType) ){  
         if($file->checkFileExtension($filename, $allowExt) ){
            $file_name = $file->upload($uploadPath, $filename, 'cv-' . $this->id);
            if($file_name){
               $this->upload_cv = 1;
               $this->update();
               return array('success','uploaded CV successfuly');
            }else{
               return array('error','error in uploading the file');
            }
         }else{
            return array('error','extention not allowed');
         }
      }else{
         return array('error','type not allowed');
      }
   }
   
   public function apply($vacancy_id){
      $seeker_apply_vacancy = new SeekerApplyVacancy();
      $seeker_apply_vacancy->seeker_id = $this->id;
      $seeker_apply_vacancy->vacancy_id = $vacancy_id;
      $seeker_apply_vacancy->insert();
   }
   
   
   public static function deleteAllWorkExps($seeker_id){
      $seeker = new Seeker();
      $seeker->id = $seeker_id;
      $seeker = $seeker->relate('SeekerWorkExp');
      foreach($seeker[0]->SeekerWorkExp as $work_exp){
         $work_exp->delete();
      }
   }

   public static function deleteAllDegrees($seeker_id){
      $seeker = new Seeker();
      $seeker->id = $seeker_id;
      $seeker = $seeker->relate('SeekerEduDegree');
      foreach($seeker[0]->SeekerEduDegree as $dgree){
         $dgree->delete();
      }
   }
   
   public static function deleteAllEdus($seeker_id){
      $seeker = new Seeker();
      $seeker->id = $seeker_id;
      $seeker = $seeker->relate('SeekerEdu');
      foreach($seeker[0]->SeekerEdu as $edu){
         $edu->delete();
      }
   }
   
   public static function deleteAllOthers($seeker_id){
      $seeker = new Seeker();
      $seeker->id = $seeker_id;
      $seeker = $seeker->relate('SeekerOtherInfo');
      foreach($seeker[0]->SeekerOtherInfo as $other){
         $other->delete();
      }
   }

}