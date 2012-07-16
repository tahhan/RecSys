<?php
Doo::loadModel('MainModel');

class SeekerWorkExp extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $seeker_id;

    /**
     * @var int Max length is 11.
     */
    public $job_title;

    /**
     * @var int Max length is 11.
     */
    public $company_name;

    /**
     * @var int Max length is 11.
     */
    public $country_id;

    /**
     * @var date
     */
    public $start_date;

    /**
     * @var date
     */
    public $end_date;

    /**
     * @var tinyint Max length is 4.
     */
    public $still_working;

    /**
     * @var text
     */
    public $description;

    public $_table = 'seeker_work_exp';
    public $_primarykey = 'id';
    public $_fields = array('id','seeker_id','job_title','company_name','country_id','start_date','end_date','still_working','description');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'seeker_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'job_title' => array(
                        array( 'notnull' ),
                ),

                'company_name' => array(
                        array( 'notnull' ),
                ),

                'country_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'start_date' => array(
                        array( 'date' ),
                        array( 'notnull' ),
                ),

                'end_date' => array(
                        array( 'date' ),
                        array( 'optional' ),
                ),

                'still_working' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'notnull' ),
                ),

                'description' => array(
                        array( 'notnull' ),
                )
            );
    }

}