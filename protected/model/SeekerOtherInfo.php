<?php
Doo::loadModel('MainModel');

class SeekerOtherInfo extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $seeker_id;

    /**
     * @var varchar Max length is 150.
     */
    public $title;

    /**
     * @var text
     */
    public $description;

    public $_table = 'seeker_other_info';
    public $_primarykey = 'id';
    public $_fields = array('id','seeker_id','title','description');

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

                'title' => array(
                        array( 'maxlength', 150 ),
                        array( 'notnull' ),
                ),

                'description' => array(
                        array( 'notnull' ),
                )
            );
    }

}