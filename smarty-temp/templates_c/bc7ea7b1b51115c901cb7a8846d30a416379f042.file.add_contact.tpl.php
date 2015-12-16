<?php /* Smarty version Smarty-3.1.19, created on 2015-12-10 12:59:45
         compiled from "/var/www/flock/smarty-temp/templates/add_contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:709778419566929e9dbd9a1-79100659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc7ea7b1b51115c901cb7a8846d30a416379f042' => 
    array (
      0 => '/var/www/flock/smarty-temp/templates/add_contact.tpl',
      1 => 1449722320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '709778419566929e9dbd9a1-79100659',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorString' => 0,
    'list_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_566929e9df1624_45328934',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566929e9df1624_45328934')) {function content_566929e9df1624_45328934($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<?php echo $_smarty_tpl->getSubTemplate ("inner_meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Meta"), 0);?>

</head>
<body>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section class="commen-base">
    	<?php echo $_smarty_tpl->getSubTemplate ("dashboard_left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Dashboard Left"), 0);?>

		 <!-- flock-sidebar -->
        
		<div class="right-panel">
        	<div class="container-fluid">
            	<div class="commen-heading">
                	<h2>Add New Subscriber</h2>
                </div><!-- commen-heading -->
				<form name="addcontactfrm" id="addcontactfrm" method="post" action="">
                <div class="send-email-base">
					<?php if ($_smarty_tpl->tpl_vars['errorString']->value!='') {?> <?php echo $_smarty_tpl->tpl_vars['errorString']->value;?>
 <?php }?>
                	<p>Fill out the form below to add an email to the list "<?php echo $_smarty_tpl->tpl_vars['list_name']->value;?>
".</p>
                    <h3 class="commen-h3">SUBSCRIBER DETAILS</h3>
                    <div class="sd-form-1">
                    	<div class="row">
                        	<div class="col-md-12">
                            	<label class="form-label">Email Address*</label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" placeholder="" name="email_id" id="email_id" value="<?php echo $_POST['email_id'];?>
"  data-validation="required">
                                </div><!-- cm-sl-mode -->
                            </div>
                            
                            <div class="visible-lg col-xs-12"></div>
							
							<div class="col-md-6">
                            	<label class="form-label">First Name </label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="firstname" value="<?php echo $_POST['firstname'];?>
" >
                                </div><!-- cm-sl-mode -->
                               
                            </div>
							
                            <div class="col-md-6">
                            	<label class="form-label">Last Name   </label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="lastname" value="<?php echo $_POST['lastname'];?>
" >
                                </div><!-- cm-sl-mode -->
                                
                            </div>
							
							<div class="visible-lg col-xs-12"></div>
							
							<div class="col-md-6">
                            	<label class="form-label">Email Format </label>
                                <div class="cm-sl-mode">
                                	<div class="commen-select-div">
                                	<select class="cm-select"  name="email_format">
                                    	<option value="h">HTML</option>
										<option value="t">Text</option>
                                    </select>
                                </div><!-- commen-select-div -->
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	You can select any one format for email.If HTML is selected the contacts will recieve HTML and Text emails.If Text is selected the contacts will recieve only tet emails
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
							
                            <div class="col-md-6">
                            	<label class="form-label">Status   </label>
                                <div class="cm-sl-mode">
                                	<div class="commen-select-div">
                                	<select class="cm-select"  name="confirmation_status">
                                    	<option value="1">Confirmed</option>
										<option value="0">Unconfirmed</option>
                                    </select>
                                </div><!-- commen-select-div -->
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	Through confirmation option,the user can confirm the subscription by clicking a link in the confirmation email.If 'unconfirmed' option is selected email with the confirmation link will be received at a later date 
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
                           
			
                            
							
                            <div class="visible-lg col-xs-12"></div>
                            
							
							
                            
                        </div>
                    </div><!-- sd-form-1-->
                 
					
				
                    <!-- sd-form-1-->
					
                    <div class="button-panel">
                    	<input type="submit" class="cm-submit" name="submit" value="Submit">
                    </div><!-- button-panel -->
                </div><!-- send-email-base -->
				</form>
            </div><!-- right-panel -->
        </div>
		
    </section><!-- commen-base -->
	<?php echo $_smarty_tpl->getSubTemplate ("inner_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Inner page js"), 0);?>

	
	 <script>
	var validationSettings = {
		errorMessagePosition : 'element',
		borderColorOnError : ''
	};

	$('#addcontactfrm')
		.submit(function() {
			if ($(this).validate(false, validationSettings))
				return true;

			return false;
		})
		.validateOnBlur(false, validationSettings)
		.showHelpOnFocus();

</script>
	
<?php echo $_smarty_tpl->getSubTemplate ("end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"End of the page"), 0);?>
<?php }} ?>
