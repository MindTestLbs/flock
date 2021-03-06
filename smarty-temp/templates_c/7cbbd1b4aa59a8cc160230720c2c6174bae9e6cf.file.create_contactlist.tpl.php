<?php /* Smarty version Smarty-3.1.19, created on 2015-12-07 17:24:33
         compiled from "/var/www/flockmails-refined/smarty-temp/templates/create_contactlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46990096756657379d76ac2-45915427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cbbd1b4aa59a8cc160230720c2c6174bae9e6cf' => 
    array (
      0 => '/var/www/flockmails-refined/smarty-temp/templates/create_contactlist.tpl',
      1 => 1447928629,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46990096756657379d76ac2-45915427',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorString' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56657379dc0390_37501507',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56657379dc0390_37501507')) {function content_56657379dc0390_37501507($_smarty_tpl) {?><!DOCTYPE html>
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
                	<h2>Create a Contact List</h2>
                </div><!-- commen-heading -->
				<form name="createTempfrm" id="createTempfrm" method="post" action="">
                <div class="send-email-base">
					<?php if ($_smarty_tpl->tpl_vars['errorString']->value!='') {?> <?php echo $_smarty_tpl->tpl_vars['errorString']->value;?>
 <?php }?>
                	<p>Fill out the form below to create an email list.</p>
                    <h3 class="commen-h3">NEW LIST DETAILS</h3>
                    <div class="sd-form-1">
                    	<div class="row">
                        	<div class="col-md-6">
                            	<label class="form-label">List Name</label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" placeholder="" name="list_name" value="<?php echo $_POST['list_name'];?>
"  data-validation="required">
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	The name of the list as it will appear both in the control panel and on your subscription forms.
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
                            <div class="col-md-6">
                            	<label class="form-label">List Owners Name </label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="list_owner_name" value="<?php echo $_POST['list_owner_name'];?>
"  data-validation="required">
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	The name of the person who owns this list. This is the default name used when you send an email campaign to this contact list.
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
                            <div class="visible-lg col-xs-12"></div>
                            <div class="col-md-6">
                            	<label class="form-label">List Owners Email   </label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="list_owner_email_id" value="<?php echo $_POST['list_owner_email_id'];?>
"  data-validation="validate_email">
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	Emails are sent to this address when someone subscribes or unsubscribes from your contact list.<br/>This is also the default 'From' email address used when sending an email campaign to this contact list.
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
                            <div class="col-md-6">
                            	<label class="form-label">List Reply-To Email </label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="list_reply_to_mailId" value="<?php echo $_POST['list_reply_to_mailId'];?>
"  data-validation="validate_email">
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	This is the default reply address used when you send an email campaign to this contact list.
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
							
							   <div class="visible-lg col-xs-12"></div>
                            <div class="col-md-6">
                            	<label class="form-label">List Bounce Email   </label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="list_bounce_email" value="<?php echo $_POST['list_bounce_email'];?>
"  data-validation="validate_email">
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	Emails are sent to this address when someone subscribes or unsubscribes from your contact list.<br/>This is also the default 'From' email address used when sending an email campaign to this contact list.
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
							
                            <div class="visible-lg col-xs-12"></div>
                            
							
							<div class="col-md-3">
                            	<h5 style="font-size:16px; color:#474747; font-family:''aileronlight''">Notify the List Owner</h5>
                            </div>
                            <div class="col-md-9">
                            	<div class="commen-check">
                                	<label>
                                		<input name="notify_owner" type="checkbox" value="1" checked="checked" class="cm-checkbox">
                                      Yes, send subscribe and unsubscribe notification  emails to the list owner
                                    </label>
                                    <!-- cs-tooltip -->
                                </div>
                            </div>
                        </div>
                    </div><!-- sd-form-1-->
                
					
					<h3 class="commen-h3" style="padding-top:10px;">COMPANY DETAILS</h3>
                    <div class="sd-form-1">
                    	<div class="row">
                        	<div class="col-md-6">
                            	<label class="form-label">Company Name</label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" placeholder="" name="company_name" value="<?php echo $_POST['company_name'];?>
"  >
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	You can add your company name here to be used as a custom field in your emails so that you can adhere to the CAN-SPAM act.<br><br>The CAN-SPAM act states that you should include your company details in your emails
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
                            <div class="col-md-6">
                            	<label class="form-label">Company Address </label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="company_address" value="<?php echo $_POST['company_address'];?>
"  >
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	You can add your company address here to be used as a custom field in your emails so that you can adhere to the CAN-SPAM act.<br><br>The CAN-SPAM act states that you should include your company details in your emails.
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
                            <div class="visible-lg col-xs-12"></div>
                            <div class="col-md-6">
                            	<label class="form-label">Company Phone Number   </label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="company_phone_number" value="<?php echo $_POST['company_phone_number'];?>
" >
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	You can add your company phone number here to be used as a custom field in your emails so that you can adhere to the CAN-SPAM act.<br><br>The CAN-SPAM act states that you should include your company details in your emails.
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
                            
                           							
							
                            
                        </div>
                    </div><!-- sd-form-1-->
					
                    <div class="button-panel">
                    	<input type="submit" class="cm-submit" name="create" value="Submit">
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

	$('#createTempfrm')
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
