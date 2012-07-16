<?php
Doo::loadModel('MainModel');

class Company extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 250.
     */
    public $company_name;

    /**
     * @var int Max length is 11.
     */
    public $industry_id;

    /**
     * @var int Max length is 11.
     */
    public $no_employees;

    /**
     * @var int Max length is 11.
     */
    public $country_id;

    /**
     * @var varchar Max length is 150.
     */
    public $contact_person;

    public $website;


    /**
     * @var varchar Max length is 200.
     */
    public $hear_from;
    
    public $completed;

    public $_table = 'company';
    public $_primarykey = 'id';
    public $_fields = array('id','company_name','industry_id','no_employees','country_id','contact_person','website','hear_from', 'completed');
    public static $_defaults = array('contact_person'=>0);
    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'company_name' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'industry_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'no_employees' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'country_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'contact_person' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),
            
                'website' => array(
                        array( 'maxlength', 150 ),
                        array( 'notnull' ),
                ),

                'hear_from' => array(
                        array( 'maxlength', 200 ),
                        array( 'notnull' ),
                )
            );
    }

}