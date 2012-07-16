<?php
Doo::loadModel('MainModel');

class SeekerEdu extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $seeker_id;

    /**
     * @var enum 'elementary','high_school','diploma','uni_bachelors','masters','phd').
     */
    public $edu_level;

    /**
     * @var varchar Max length is 250.
     */
    public $degree;

    /**
     * @var varchar Max length is 250.
     */
    public $uni_name;

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
    public $graduation_date;

    public $_table = 'seeker_edu';
    public $_primarykey = 'id';
    public $_fields = array('id','seeker_id','edu_level','degree','uni_name','country_id','start_date','graduation_date');

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

                'edu_level' => array(
                        array( 'notnull' ),
                ),

                'degree' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'uni_name' => array(
                        array( 'maxlength', 250 ),
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

                'graduation_date' => array(
                        array( 'date' ),
                        array( 'notnull' ),
                )
            );
    }

}