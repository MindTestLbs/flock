<?php /* Smarty version Smarty-3.1.19, created on 2015-12-15 14:42:26
         compiled from "/var/www/flock/smarty-temp/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:787445736566fd97ad58e37-56992067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdcccd5215f1b3ff6998a6ae5e3f402f9941a1b9' => 
    array (
      0 => '/var/www/flock/smarty-temp/templates/login.tpl',
      1 => 1449722320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '787445736566fd97ad58e37-56992067',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'errorString' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_566fd97adc7f98_21374230',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566fd97adc7f98_21374230')) {function content_566fd97adc7f98_21374230($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ("meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Meta"), 0);?>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		 <?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Header"), 0);?>
 


<section class="login-section">
    	<div class="container">
        	<div class="row">
                <div class="col-lg-6 col-md-8 col-sm-10 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
                    <div id="login-box">
                        <h3>Login</h3>
                        <div class="login-form">
                            <form name="loginform" action="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
login.php" method="post">
						
								
								<?php if ($_smarty_tpl->tpl_vars['errorString']->value!='') {?> <?php echo $_smarty_tpl->tpl_vars['errorString']->value;?>
 <?php }?>
							<?php if ($_REQUEST['confirmMessage']!='') {?>
									<span style="text-align:center; color:#FF0000; font-size:12px;">
									<?php echo $_REQUEST['errmsg'];?>

								</span>		
								<?php }?>
                                <div class="row">
                                    <div class="col-lg-2 col-sm-4 col-md-3 col-xs-2">
                                        <span class="ico">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/img-username-ico.png" alt="">
                                        </span>
                                    </div>
                                    <div class="col-lg-10 col-sm-8 col-md-9 col-xs-10">
                                    	<div class="lgoin-feild-div">
                                        	<input type="text"  name="user_email" id="user_email" class="form-control login-textfeild" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-sm-4 col-md-3 col-xs-2">
                                        <span class="ico">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/img-password-ico.png" alt="">
                                        </span>
                                    </div>
                                    <div class="col-lg-10 col-sm-8 col-md-9 col-xs-10">
                                    	<div class="lgoin-feild-div">
                                        	<input name="login_password" id="login_password" type="password" class="form-control login-textfeild" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-offset-2 col-sm-10">
                                    	<<?php ?>?php /*?<?php ?>><label class="remember">
                                        	<input type="checkbox" class="remember-me">
                                            Remember me
                                        </label><<?php ?>?php */?<?php ?>>
                                        <a href="forgot_password.php" class="forget-password"  style="cursor:pointer; color:#D05601;">Forgot Password ?</a>
                                        <input type="submit" name="login" class="login-submit" value="Login">
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                            	<div class="col-sm-6">
                                	<div class="backto-site">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/img-text.png">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
">flockmails.com</a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                	<img class="img-responsive pull-right"  src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/img-sm-logo.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    
    

    
    <!-- FOOTER -->
  
    <?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Footer and compare"), 0);?>

	<!--footer-block-->
	
  
  <?php echo $_smarty_tpl->getSubTemplate ("js_index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Quick View"), 0);?>

  

 <?php echo $_smarty_tpl->getSubTemplate ("end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"End"), 0);?>
<?php }} ?>
