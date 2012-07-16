<?php
Doo::loadModel('MainModel');

class Department extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $company_id;

    /**
     * @var varchar Max length is 100.
     */
    public $name;

    /**
     * @var int Max length is 11.
     */
    public $business_partner;

    public $_table = 'department';
    public $_primarykey = 'id';
    public $_fields = array('id','company_id','name','business_partner');
    public static $_defaults = array('business_partner'=>0);
    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'company_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'name' => array(
                        array( 'maxlength', 100 ),
                        array( 'notnull' ),
                ),

                'business_partner' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                )
            );
    }

}