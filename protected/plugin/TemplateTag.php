<?php

//register global/PHP functions to be used with your template files
//You can move this to common.conf.php   $config['TEMPLATE_GLOBAL_TAGS'] = array('isset', 'empty');
//Every public static methods in TemplateTag class (or tag classes from modules) are available in templates without the need to define in TEMPLATE_GLOBAL_TAGS

Doo::conf()->TEMPLATE_GLOBAL_TAGS = array(
    'filter_fixar', 'filter_t', 'filter_noTags', 'filter_bool', 'filter_date', 'filter_txt', 'filter_num', 'filter_trim', 'filter_summary', 'filter_url_decode',
    'upper', 'tofloat', 'debug', 'url', 'url2', 'function_deny', 'isset', 'empty', 'strtok', 'exist', 'urlencode ', 'trim',
    'residency_status', 'ucfirst'
);

// <editor-fold  defaultstate="collapsed" desc="FILTERS" >

function filter_fixar($str) {
   return $str;
}

function filter_t($str) {

   include 'langs/app.' . Doo::conf()->lang . '.php';

   return isset($lang[$str]) ? $lang[$str] : $str;
}

function filter_noTags($str) {
   return trim(strip_tags($str));
}

function filter_bool($val) {

   return $val ? 'Yes' : 'No';
}

function filter_date($str) {

   return strtok($str, ' ');
}

function filter_txt($str) {

   return $str ? stripcslashes($str) : '';
}

function filter_num($num, $percision=2) {

   if ($num - (int) $num == 0) {

      return $num;
   } else {

      return number_format($num, $percision);
   }
}

function filter_trim($str, $length=200) {
   $str = stripcslashes($str);
   $str = strip_tags($str);
   $str = trim($str);
   return substr($str, 0, $length);
}

function filter_summary($text, $length) {

   $string = strip_tags($text);

   return substr($string, 0, $length);
}

function filter_url_decode($url) {

   return urlencode($url);
}

// </editor-fold>
// <editor-fold  defaultstate="collapsed" desc="PRE-SET FUNCTIONS" >
function upper($str) {

   return strtoupper($str);
}

function tofloat($str) {

   return sprintf("%.2f", $str);
}

function debug($var) {

   if (!empty($var)) {

      echo '<pre>';

      print_r($var);

      echo '</pre>';
   }
}

//This will be called when a function NOT Registered is used in IF or ElseIF statment

function function_deny($var=null) {

   $func_name = isset($var) ? "($var)" : '';



   echo "<span style='color:#ff0000;'>Function $func_name denied in IF or ElseIF statement!</span>";

   exit;
}

//Build URL based on route id

function url($id, $param=null, $addRootUrl=false) {

   Doo::loadHelper('DooUrlBuilder');

   // param pass in as string with format
   // 'param1=>this_is_my_value, param2=>something_here'



   if ($param != null) {

      $param = explode(', ', $param);

      $param2 = null;

      foreach ($param as $p) {

         $splited = explode('=>', $p);

         $param2[$splited[0]] = $splited[1];
      }

      return DooUrlBuilder::url($id, $param2, $addRootUrl);
   }



   return DooUrlBuilder::url($id, null, $addRootUrl);
}

//Build URL based on controller and method name

function url2($controller, $method, $param=null, $addRootUrl=false) {

   Doo::loadHelper('DooUrlBuilder');

   // param pass in as string with format
   // 'param1=>this_is_my_value, param2=>something_here'



   if ($param != null) {

      $param = explode(', ', $param);

      $param2 = null;

      foreach ($param as $p) {

         $splited = explode('=>', $p);

         $param2[$splited[0]] = $splited[1];
      }

      return DooUrlBuilder::url2($controller, $method, $param2, $addRootUrl);
   }



   return DooUrlBuilder::url2($controller, $method, null, $addRootUrl);
}

// </editor-fold>

function residency_status($residency_status) {
   switch ($residency_status) {
      case '0':
         return 'Citizen';
         break;
      case '1':
         return 'Residency Visa (Non-transferable)';
         break;
      case '2':
         return 'Residency Visa (Transferable)';
         break;
      case '3':
         return 'Student Visa';
         break;
      case '4':
         return 'Transit Visa';
         break;
      case '5':
         return 'Visit Visa';
         break;
      case '6':
         return 'No Visa';
         break;
   }
}

?>