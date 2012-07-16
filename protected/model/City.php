<?php
Doo::loadModel('MainModel');

class City extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 150.
     */
    public $city_name;

    /**
     * @var int Max length is 11.
     */
    public $country_id;

    public $_table = 'city';
    public $_primarykey = 'id';
    public $_fields = array('id','city_name','country_id');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'city_name' => array(
                        array( 'maxlength', 150 ),
                        array( 'notnull' ),
                ),

                'country_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                )
            );
    }

}