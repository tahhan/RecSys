<?php
Doo::loadModel('MainModel');

class SeekerEduDegree extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $seeker_id;

    /**
     * @var enum 'uni_bachelors','masters','phd').
     */
    public $degree_level;

    /**
     * @var varchar Max length is 250.
     */
    public $uni_name;

    /**
     * @var varchar Max length is 250.
     */
    public $degree;

    public $_table = 'seeker_edu_degree';
    public $_primarykey = 'id';
    public $_fields = array('id','seeker_id','degree_level','uni_name','degree');

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

                'degree_level' => array(
                        array( 'notnull' ),
                ),

                'uni_name' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                ),

                'degree' => array(
                        array( 'maxlength', 250 ),
                        array( 'notnull' ),
                )
            );
    }

}