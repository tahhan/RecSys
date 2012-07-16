<?php
Doo::loadModel('MainModel');

class SeekerEduInfo extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $seeker_id;

    /**
     * @var tinyint Max length is 4.
     */
    public $have_degree;

    /**
     * @var enum 'elementary','high_school','diploma','uni').
     */
    public $highest_level;

    public $_table = 'seeker_edu_info';
    public $_primarykey = 'id';
    public $_fields = array('id','seeker_id','have_degree','highest_level');

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

                'have_degree' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'optional' ),
                ),

                'highest_level' => array(
                        array( 'optional' ),
                )
            );
    }

}