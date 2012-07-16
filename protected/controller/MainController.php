<?php

class MainController extends DooController {
/* public function gen_model() {
       Doo::loadCore('db/DooModelGen');
       DooModelGen::genMySQL(true, true, 'DooModel', false);

   }*/
   protected $err_str;

   /**
    * renderTemplate: renders the required page within a specific template.
    * @var $page_path: path to the view file (from view/app/), it will also include the following files:
    * css/app/$page_path, js/app/$page_path, css/app/$parent_path, js/app/$parent_path.
    * <br/>
    * <code>page_title, page_description, page_js_vars</code> should be set within $this->data array
    */
   protected function renderTemplate($page, $template_file='app') {
      $this->data['APP_URL'] = Doo::conf()->APP_URL;
      $this->data['app_title'] = Doo::conf()->app_title;
      $this->data['lang'] = Doo::conf()->lang;
      $this->data['template'] = $template_file;

      $this->data['page'] = str_replace('/', '-', $page);

      $this->data['page_path'] = "$template_file/$page";
      $this->data['flash'] = $this->getFlash();
      $this->data['page_js'] = isset($this->data['page_js']) ? $this->data['page_js'] : array();
      $this->data['page_js_vars'] = isset($this->data['page_js_vars']) ? $this->data['page_js_vars'] : array();
      
      $this->data['user_group'] = (isset($_SESSION['user']['group']) ? $_SESSION['user']['group'] : 'anonymous');
      $this->data['user_name'] = (isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : 'anonymous');
      
      return $this->view()->renderLayout($template_file, $this->data, true, true);
   }

   /**
    * Adds a flash message to the queue.
    * Saved in session.
    *
    * @param <string> $class, Available classes: highlight, error
    * @param <string> $msg
    * @return <void>
    */
   public function addFlash($class, $msg) {

      $_SESSION['flash'][] = new Flash($class, $msg);

      return TRUE;
   }

   public function returnFlash($class, $msg) {

      $_SESSION['flash'][] = new Flash($class, $msg);

      return isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : Doo::conf()->APP_URL;
   }

   public function getFlash() {

      if (isset($_SESSION['flash'])) {

         $tmp = $_SESSION['flash'];

         unset($_SESSION['flash']);

         return $tmp;
      } else {

         return array();
      }
   }

   /**
    *
    * @param  mixed  Validation result (null, array, or str)
    * @return bool {true:errors found}, {false: no errors}
    */
   public function check_err($v_res) {

      switch ($v_res) {
         case (null):
            return FALSE;
            break;

         case is_string($v_res):
            if (empty($this->error_str)) {
               $this->error_str = '<strong>Error, Please fix the following fields:</strong><br/>';
            }
            $this->error_str .= $v_res . '<br/>';
            return TRUE;
            break;

         case is_array($v_res):
            if (empty($this->error_str)) {
               $this->error_str = '<strong>Error, Please fix the following fields:</strong><br/>';
            }
            foreach ($v_res as $field => $msgArr) {

               $this->error_str .= "field ($field), ";

               if (is_array($msgArr)) {

                  foreach ($msgArr as $msg) {

                     $this->error_str .= "$msg ";
                  }
               } else {

                  $this->error_str .= "$msgArr ";
               }

               $this->error_str .= "<br/>";
            }
            return TRUE;
            break;
      }
   }

   public function ajaxFlash($class, $msg) {

      echo json_encode(array($class => $msg));
   }

   public function js_redirect($url) {
      echo("<script> top.location.href='$url'</script>");
      return FALSE;
   }

}

class Flash {

   var $flashClass;
   var $flashMessage;

   public function Flash($class, $msg) {

      $this->flashClass = $class;

      $this->flashMessage = $msg;
   }

}

?>