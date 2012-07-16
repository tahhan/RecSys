<?php
Doo::loadModel('MainModel');

class Announced extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var varchar Max length is 45.
     */
    public $where;

    /**
     * @var date
     */
    public $date;

    /**
     * @var int Max length is 11.
     */
    public $vacancy_id;

    public $_table = 'announced';
    public $_primarykey = 'id';
    public $_fields = array('id','where','date','vacancy_id');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'where' => array(
                        array( 'maxlength', 45 ),
                        array( 'notnull' ),
                ),

                'date' => array(
                        array( 'date' ),
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