<?php
Doo::loadModel('MainModel');

class SavedSearchesCompanyCvs extends MainModel{

    /**
     * @var int Max length is 11.
     */
    public $id;

    /**
     * @var int Max length is 11.
     */
    public $company_id;

    /**
     * @var text
     */
    public $list_of_applicants_id;

    /**
     * @var varchar Max length is 50.
     */
    public $name;

    public $_table = 'saved_searches_company_cvs';
    public $_primarykey = 'id';
    public $_fields = array('id','company_id','list_of_applicants_id','name');

    public function getVRules() {
        return array(
                'id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'optional' ),
                ),

                'company_id' => array(
                        array( 'integer' ),
                        array( 'maxlength', 11 ),
                        array( 'notnull' ),
                ),

                'list_of_applicants_id' => array(
                        array( 'notnull' ),
                ),

                'name' => array(
                        array( 'maxlength', 50 ),
                        array( 'notnull' ),
                )
            );
    }

}