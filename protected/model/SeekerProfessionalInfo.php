<?php
Doo::loadModel('MainModel');

class SeekerProfessionalInfo extends MainModel{

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
    public $have_exp;

    /**
     * @var int Max length is 11.
     */
    public $exp_years;

    /**
     * @var varchar Max length is 150.
     */
    public $last_job_title;

    /**
     * @var int Max length is 11.
     */
    public $primary_comm;

    /**
     * @var int Max length is 11.
     */
    public $second_comm;

    /**
     * @var int Max length is 11.
     */
    public $third_comm;

    /**
     * @var text
     */
    public $lang_list;

    /**
     * @var text
     */
    public $skills;

    /**
     * @var int Max length is 11.
     */
    public $preferd_place;

    public $_table = 'seeker_professional_info';
    public $_primarykey = 'id';
    public $_fields = array('id','seeker_id','have_exp','exp_years','last_job_title','primary_comm','second_comm','third_comm','lang_list','skills','preferd_place');

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

                'have_exp' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'notnull' ),
                ),

                'exp_years' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'last_job_title' => array(
                        array( 'maxlength', 150 ),
                        array( 'optional' ),
                ),

                'primary_comm' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'second_comm' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'third_comm' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'lang_list' => array(
                        array( 'notnull' ),
                ),

                'skills' => array(
                        array( 'optional' ),
                ),

                'preferd_place' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                )
            );
    }

}