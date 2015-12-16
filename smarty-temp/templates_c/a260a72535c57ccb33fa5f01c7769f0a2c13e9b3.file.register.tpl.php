<?php /* Smarty version Smarty-3.1.19, created on 2015-12-15 10:35:50
         compiled from "/var/www/flock/smarty-temp/templates/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:998127344566f9faeb090b5-02016394%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a260a72535c57ccb33fa5f01c7769f0a2c13e9b3' => 
    array (
      0 => '/var/www/flock/smarty-temp/templates/register.tpl',
      1 => 1449722320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '998127344566f9faeb090b5-02016394',
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
  'unifunc' => 'content_566f9faeb90285_69180509',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566f9faeb90285_69180509')) {function content_566f9faeb90285_69180509($_smarty_tpl) {?><!DOCTYPE html>
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
 

    

<section class="pageHeader">
	<div class="container">
    	<h1>Sign Up</h1>
    </div>
</section>  

<section class="inner-content">
	<div class="container">
    	<div class="reg-info">
        	<h3>Start off your journey with Flock Mails!</h3>
            <p>We know that it takes a lot to reach out to people. Be it ads or promotions, reaching out to potential customers can cost a lot. Why not make it easier with the help of Flock Mails, that has everything you need and more? Come, be a part of our 650,000 happy Flock Mail users who have shaved off any marketing challenges with our software. Do enter your details below and the form of payment and you will gain access to one of the most powerful email marketing software ever created - that too without any long term commitments!
            </p>
        </div>
        <div class="row registration">
        	<div class="col-sm-5 col-sm-offset-1">
            	<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/img-reg.jpg" class="img-responsive" alt="">
            </div>
			<form name="registerfrm" method="post" action="">
			
            <div class="col-sm-6">
				<?php if ($_smarty_tpl->tpl_vars['errorString']->value!='') {?> <?php echo $_smarty_tpl->tpl_vars['errorString']->value;?>
 <?php }?>
					<?php if ($_REQUEST['confirmMessage']!='') {?>
							<span style="text-align:center; color:#FF0000; font-size:12px;">
							<?php echo $_REQUEST['confirmMessage'];?>

						</span>		
						<?php }?>
            	<ul>
                	<li>
                    	<input type="text" class="form-control" name="user_firstname" value="<?php echo $_POST['user_firstname'];?>
" placeholder="First Name *">
                    </li>
                    <li>
                    	<input type="text" class="form-control" name="user_lastname" value="<?php echo $_POST['user_lastname'];?>
" placeholder="Last Name *">
                    </li>
                    <li>
                    	<input type="text" class="form-control" name="user_email" value="<?php echo $_POST['user_email'];?>
" placeholder="Email">
                    </li>
					
					<li>
                    	<input type="password" class="form-control" name="user_pswd" value="<?php echo $_POST['user_pswd'];?>
" placeholder="Password *">
                    </li>
                    <li>
                    	<input type="password" class="form-control" name="user_conf_pswd" placeholder="Confirm Password *">
                    </li>
                    
                    <li>
                    	<div class="flockmail-terms">
                        	<label><input type="checkbox" name="agree_chk" value="1">I agree to Flock Mails <span>Terms</span> and <span>Conditions</span></label>
                            <p>For no. of subscribers greater than 100000, please contact our  <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
index.php#foot-sec">customer care</a></p>
                        </div>
                    </li>
                    <li>
                    	<input name="login" type="submit" class="view-all" value="Sign Up">
                    </li>
                </ul>
            </div>
			</form>
        </div>
    </div>
</section> 
    
    

    
    <!-- FOOTER -->
  
    <?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Footer and compare"), 0);?>

	<!--footer-block-->
	
  
  <?php echo $_smarty_tpl->getSubTemplate ("js_index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Quick View"), 0);?>

  

 <?php echo $_smarty_tpl->getSubTemplate ("end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"End"), 0);?>
<?php }} ?>
