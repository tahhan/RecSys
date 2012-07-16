<?php
Doo::loadModel('MainModel');

class Industry extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 250.
     */
    public $industry_name;

    public $_table = 'industry';
    public $_primarykey = 'id';
    public $_fields = array('id','industry_name');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'industry_name' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                )
            );
    }

}