<?php
Doo::loadModel('MainModel');

class Employee extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 45.
     */
    public $name;

    /**
     * @var date
     */
    public $hire_date;

    /**
     * @var int Max length is 11.
     */
    public $department_id;

    /**
     * @var int Max length is 11.
     */
    public $salary;

    /**
     * @var varchar Max length is 45.
     */
    public $phone_number;

    /**
     * @var varchar Max length is 45.
     */
    public $email;

    /**
     * @var varchar Max length is 45.
     */
    public $password;

    public $_table = 'employee';
    public $_primarykey = 'id';
    public $_fields = array('id','name','hire_date','department_id','salary','phone_number','email','password');
    public static $_defaults = array('salary'=>'0');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'name' => array(
                        array( 'maxlength', 45 ),
                        array( 'notnull' ),
                ),

                'hire_date' => array(
                        array( 'date' ),
                        array( 'optional' ),
                ),

                'department_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'salary' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'phone_number' => array(
                        array( 'maxlength', 45 ),
                        array( 'notnull' ),
                ),

                'email' => array(
                        array( 'maxlength', 45 ),
                        array( 'notnull' ),
                ),

                'password' => array(
                        array( 'maxlength', 45 ),
                        array( 'notnull' ),
                )
            );
    }

}