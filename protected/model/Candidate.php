<?php
Doo::loadModel('MainModel');

class Candidate extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $seeker_id;

    /**
     * @var int Max length is 11.
     */
    public $vacancy_id;

    /**
     * @var tinyint Max length is 4.
     */
    public $status;

    public $_table = 'candidate';
    public $_primarykey = 'vacancy_id';
    public $_fields = array('seeker_id','vacancy_id','status');

    public function getVRules() {
        return array(
                'seeker_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'vacancy_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'status' => array(
                        array( 'integer' ),
                        array( 'maxlength', 4 ),
                        array( 'notnull' ),
                )
            );
    }

}