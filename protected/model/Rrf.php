<?php
Doo::loadModel('MainModel');

class Rrf extends MainModel{

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

    /**
     * @var date
     */
    public $posted_date;

    public $_table = 'rrf';
    public $_primarykey = 'id';
    public $_fields = array('id','department_id','job_title','job_description','salary','no_employees_required','type_employment','reason_employment','country_id','industry_id','status','posted_date');

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
                        array( 'optional' ),
                ),

                'posted_date' => array(
                        array( 'date' ),
                        array( 'optional' ),
                )
            );
    }

}