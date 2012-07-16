<?php
Doo::loadModel('MainModel');
Doo::loadModel('SeekerApplyVacancy');
Doo::loadModel('Candidate');

class Vacancy extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $department_id;

    /**
     * @var varchar Max length is 20.
     */
    public $job_title;

    /**
     * @var text
     */
    public $job_description;

    /**
     * @var int Max length is 11.
     */
    public $salary;

    /**
     * @var int Max length is 11.
     */
    public $no_employees_required;

    /**
     * @var varchar Max length is 20.
     */
    public $type_employment;

    /**
     * @var varchar Max length is 20.
     */
    public $reason_employment;

    public $country_id;
    
    public $industry_id;
    
    /**
     * @var varchar Max length is 20.
     */
    public $status;

    public $_table = 'vacancy';
    public $_primarykey = 'id';
    public $_fields = array('id','department_id','job_title','job_description','salary','no_employees_required','type_employment','reason_employment','country_id','industry_id','status');

    
    public function delete_vacancy(){
       $candidate = new Candidate();
       $candidate->vacancy_id = $this->id;
       $candidates = $candidate->find();
       
       if(!empty ($candidates)){
          foreach($candidates as $candidate){
             $candidate->delete();
          }
       }
       
       $applicant = new SeekerApplyVacancy();
       $applicant->vacancy_id = $this->id;
       $applicants = $applicant->find();
       
       if(!empty ($applicants)){
          foreach($applicants as $applicant){
             $applicant->delete();
          }
       }
       
       $this->delete();
    }
    
    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'department_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'job_title' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'job_description' => array(
                        array( 'notnull' ),
                ),

                'salary' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'no_employees_required' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'type_employment' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'reason_employment' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                ),

                'country_id' => array(
                        array( 'notnull' ),
                ),
            
                'industry_id' => array(
                        array( 'notnull' ),
                ),
            
                'status' => array(
                        array( 'maxlength', 20 ),
                        array( 'notnull' ),
                )
            );
    }

}