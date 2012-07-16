<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
   <head>
      <title><?php echo $data['app_title']; ?></title>
      <meta http-equiv="content-type" content="text/html;charset=utf-8" />

      <meta http-equiv="X-UA-Compatible" content="IE=8" />

      <!-- STYLING -->
      <!--link href="<?php echo $data['APP_URL']; ?>global/css/reset.css" rel="stylesheet" type="text/css" / -->
      <link href="<?php echo $data['APP_URL']; ?>global/css/<?php echo $data['page_path']; ?>.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo $data['APP_URL']; ?>global/js/jquery/jquery-ui/flick/jquery-ui.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo $data['APP_URL']; ?>global/js/jquery/from-validator/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo $data['APP_URL']; ?>global/css/general.css" rel="stylesheet" type="text/css" />
      <!--[if lt IE 8]><link href="<?php echo $data['APP_URL']; ?>global/css/common/ie.css" rel="stylesheet" type="text/css" /><![endif]-->

      <!-- ENDOF STYLING -->

      <!-- JAVASCRIPT -->
      <script src="<?php echo $data['APP_URL']; ?>global/js/jquery/jquery.min.js" type="text/javascript" ></script>
      <script src="<?php echo $data['APP_URL']; ?>global/js/jquery/jquery-ui/jquery-ui.js" type="text/javascript" ></script>
      <script src="<?php echo $data['APP_URL']; ?>global/js/jquery/from-validator/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
      <script src="<?php echo $data['APP_URL']; ?>global/js/jquery/from-validator/jquery.validationEngine.js" type="text/javascript" ></script>
      <script src="<?php echo $data['APP_URL']; ?>global/js/app.js" type="text/javascript"></script>

      

      
      <?php $doo_view_basic_1342464966 = $data['page_js'];
if (!empty($doo_view_basic_1342464966)):
foreach($doo_view_basic_1342464966 as $data['jsfile']):
?>
      <script src="<?php echo $data['APP_URL']; ?>global/js/<?php echo $data['jsfile']; ?>.js" type="text/javascript"></script>
      <?php endforeach;
 else: ?>
      <!-- NO ADDITIONAL JS FILES -->
      <?php endif; ?>
      <!-- ENDOF JAVASCRIPTS -->

      <script type="text/javascript">
         var LANG = '<?php echo $data['lang']; ?>';
         var APP_URL = '<?php echo $data['APP_URL']; ?>';
         <?php $doo_view_basic_1342464967 = $data['page_js_vars'];
if (!empty($doo_view_basic_1342464967)):
foreach($doo_view_basic_1342464967 as $data['key']=>$data['value']):
?>
         var <?php echo $data['key']; ?>=<?php echo $data['value']; ?>;
         <?php endforeach;
 endif; ?>
         
         $(document).ready(function(){
            $('.button').button();
            
            $('#login_form').validationEngine();
            $('#signup_form').validationEngine();
            $('#add_rrf_form').validationEngine();
            $('#profile_add_form').validationEngine();
         });
      </script>
   </head>
   <body id="<?php echo $data['template']; ?>-<?php echo $data['page']; ?>" class="bp <?php echo $data['lang']; ?> <?php echo $data['template']; ?> <?php echo $data['page']; ?>">

      <div id="wrapper" class="container" >
         <div class="flash-container">
            <?php $doo_view_basic_1342464968 = $data['flash'];
if (!empty($doo_view_basic_1342464968)):
foreach($doo_view_basic_1342464968 as $data['f_key']=>$data['f']):
?>
            <div id="flash_<?php echo $data['f_key']; ?>" class="ui-corner-all ui-state-<?php echo $data['f']->flashClass; ?>">
               <p><?php echo filter_t($data['f']->flashMessage); ?></p>
               <span onclick="$('#flash_<?php echo $data['f_key']; ?>').hide();" class="close-div"> &times; </span>
            </div>
            <?php endforeach;
 endif; ?>
         </div>
         
         <div id="header">
            <div id="logo" onclick="window.open('<?php echo $data['APP_URL']; ?>', '_top');"><img alt="logo" src="<?php echo $data['APP_URL']; ?>global/img/logo.png"></div>
            <div id="login">
               <?php if($data['user_group']=='employer'): ?>
               <div class="loginl"><a href="<?php echo $data['APP_URL']; ?>user/logout">Logout</a></div>  <div class="loginl"><a href="<?php echo $data['APP_URL']; ?>employer">Control Page</a></div>  <div class="loginl">Welcome <?php echo $data['user_name']; ?></div>
               <?php elseif($data['user_group']=='seeker'): ?>
                <div class="loginl"><a href="<?php echo $data['APP_URL']; ?>user/logout">Logout</a></div> <div class="loginl"><a href="<?php echo $data['APP_URL']; ?>seeker">Profile Page</a></div> <div class="loginl">Welcome <?php echo $data['user_name']; ?></div> 
               <?php else: ?>
               <div class="loginl"><a href="<?php echo $data['APP_URL']; ?>user/login/employer">Employer Login</a></div>
               <div class="loginl"><a href="<?php echo $data['APP_URL']; ?>user/login/seeker">Job Seeker Login</a></div>
               <?php endif; ?>
               <div class="clear">&nbsp;</div>
            </div>
            <div class="clear">&nbsp;</div>
         </div>
         <div id="menu-bar">
            <div id="menu">
               <?php if($data['template']=='seeker'): ?>
               <div class="menu-item"><a href="<?php echo $data['APP_URL']; ?>" class="link" >Home</a></div>
               <div class="menu-item"><a href="<?php echo $data['APP_URL']; ?>user/login/seeker" class="link active" >Job Seeker</a></div>
               <div class="menu-item"><a href="<?php echo $data['APP_URL']; ?>user/login/employer" class="link" >Employer</a></div>
               <?php elseif(($data['template']=='employer')||($data['template']=='dept')): ?>
               <div class="menu-item"><a href="<?php echo $data['APP_URL']; ?>" class="link" >Home</a></div>
               <div class="menu-item"><a href="<?php echo $data['APP_URL']; ?>user/login/seeker" class="link" >Job Seeker</a></div>
               <div class="menu-item"><a href="<?php echo $data['APP_URL']; ?>user/login/employer" class="link active" >Employer</a></div>
               <?php elseif($data['template']=='app'&&$data['page']=='index'): ?>
               <div class="menu-item"><a href="<?php echo $data['APP_URL']; ?>" class="link active" >Home</a></div>
               <div class="menu-item"><a href="<?php echo $data['APP_URL']; ?>user/login/seeker" class="link" >Job Seeker</a></div>
               <div class="menu-item"><a href="<?php echo $data['APP_URL']; ?>user/login/employer" class="link" >Employer</a></div>
               <?php else: ?>
               <div class="menu-item"><a href="<?php echo $data['APP_URL']; ?>" class="link" >Home</a></div>
               <div class="menu-item"><a href="<?php echo $data['APP_URL']; ?>user/login/seeker" class="link" >Job Seeker</a></div>
               <div class="menu-item"><a href="<?php echo $data['APP_URL']; ?>user/login/employer" class="link" >Employer</a></div>
               <?php endif; ?>
               <div class="menu-item"><a href="<?php echo $data['APP_URL']; ?>app/about" class="link" >About</a></div>
               <div class="clear">&nbsp;</div>
            </div>
            <div id="search">
               <input class="search_field" type="text">
               <input class="submit" type="submit" value=" " />
               <div class="clear">&nbsp;</div>
            </div>
            <div class="clear">&nbsp;</div>
         </div>
         

         <div id="content">
            <?php
	if($data['page_path'] != DooViewBasic::$safeVariableResult){
		$doo_view_basic_1342464969 = $this->compileSubView($data['page_path']);
		if ($doo_view_basic_1342464969[0] == true) {
			include $doo_view_basic_1342464969[1];
		} else {
			echo $doo_view_basic_1342464969[1];
		}
	} else {
		echo '<span style="color:#ff0000">page_path is not set</span>';
	}
?>
         </div>

         
         <div id="footer">
            <div class="footer-col">
               <a href="#">Home</a><br/>
               <a href="#">Signup</a>
            </div>
            <div class="sep">&nbsp;</div>
            <div class="footer-col">
						Jobs : <br/>
               <a href="<?php echo $data['APP_URL']; ?>app/vacancies_by_countries">By country</a><br/>
               <a href="<?php echo $data['APP_URL']; ?>">By community</a>
            </div>
            <div class="sep">&nbsp;</div>
            <div class="footer-col">
						Sitemap: <br/>
               <a href="#">Home</a><br/>
               <a href="#">About us</a><br/>
               <a href="#">Contact</a>
            </div>
            <div class="clear">&nbsp;</div>
         </div>
         
      </div>
   </body>
</html>
