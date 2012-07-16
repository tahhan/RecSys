<?php
Doo::loadModel('MainModel');

class Contact extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 50.
     */
    public $name;

    /**
     * @var varchar Max length is 50.
     */
    public $email;

    /**
     * @var varchar Max length is 50.
     */
    public $country;

    /**
     * @var varchar Max length is 50.
     */
    public $phone_number;

    /**
     * @var text
     */
    public $message;

    public $_table = 'contact';
    public $_primarykey = 'id';
    public $_fields = array('id','name','email','country','phone_number','message');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'name' => array(
                        array( 'maxlength', 50 ),
                        array( 'notnull' ),
                ),

                'email' => array(
                        array( 'maxlength', 50 ),
                        array( 'notnull' ),
                ),

                'country' => array(
                        array( 'maxlength', 50 ),
                        array( 'notnull' ),
                ),

                'phone_number' => array(
                        array( 'maxlength', 50 ),
                        array( 'notnull' ),
                ),

                'message' => array(
                        array( 'notnull' ),
                )
            );
    }

}