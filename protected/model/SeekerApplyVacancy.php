<?php
Doo::loadModel('MainModel');

class SeekerApplyVacancy extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $seeker_id;

    /**
     * @var int Max length is 11.
     */
    public $vacancy_id;

    public $_table = 'seeker_apply_vacancy';
    public $_primarykey = 'vacancy_id';
    public $_fields = array('seeker_id','vacancy_id');

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
                )
            );
    }

}