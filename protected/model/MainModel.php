<?php

Doo::loadCore('db/DooModel');

class MainModel extends DooModel{

   public $_primarykey = 'id';

   /**
    * Loop and store objects ids
    * @param array of objects
    * @return array of IDs
    */
   public static function getIds($array) {

      if (!is_array($array) || !is_object($array[0]))
         return FALSE;
      $ids = array();
      foreach ($array as $key => $obj) {
         $ids [] = $obj->id;
      }
      return $ids;
   }

   /**
    * @return array of datatable default values
    */
   public static function getDataTableDefaults() {

      $REQ = array();

      $REQ['iDisplayStart'] = 0;

      $REQ['iDisplayLength'] = 10;

      $REQ['iSortCol_0'] = 0;

      $REQ['sSortDir_0'] = 'ASC';

      $REQ['sEcho'] = '';

      $REQ['sSearch'] = '';
      return $REQ;
   }

   /**
    * By default, this removes the _fields, _table, and _primarykey values. you can set other fields in the $fields_arr
    * @param array $fields_arr array of extra fields (optional)
    */
   public function unset_extra_fields($fields_arr = array()) {

      if (isset($this->_fields) && !empty($fields_arr)) {

         foreach ($fields_arr as $field) {

            if (in_array($field, $this->_fields))
               unset($this->$field);
         }
      }
      unset($this->_fields);

      unset($this->_table);

      unset($this->_primarykey);

      return $this;
   }

   /**
    * validates array of object values (like form $_POST)
    * @param array $arr	array of object values to be validated
    * @param string $checkMode	@see DooValidator::validate()
    * @return @see DooValidator::validate()
    */
   public function validate_arr($arr, $checkMode='all') {

      Doo::loadHelper('DooValidator');

      $v = new DooValidator;

      $v->checkMode = $checkMode;

      return $v->validate($arr, $this->getVRules());
   }

   public static function now($only_date = FALSE) {

      return $only_date ? date('Y-m-d') : date('Y-m-d H:i:s');
   }


   public static function createDefault($values = array()) {
      $values = array_merge(self::$_defaults, $values);
      $className = __CLASS__;
      $object = new $className($values);
      return ($object->validate()) ? FALSE : $object;
   }

}

?>