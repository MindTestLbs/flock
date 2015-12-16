<?php /* Smarty version Smarty-3.1.19, created on 2015-12-15 15:44:36
         compiled from "/var/www/flock/smarty-temp/templates/form_makeconfirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3765824566fe80c11d640-45604199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6969630a6e33d701ed329e620db7529fc4bab6d8' => 
    array (
      0 => '/var/www/flock/smarty-temp/templates/form_makeconfirm.tpl',
      1 => 1450171752,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3765824566fe80c11d640-45604199',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'errorString' => 0,
    'fkeditor' => 0,
    'fkeditor1' => 0,
    'qrapp' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_566fe80c194f43_92512620',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566fe80c194f43_92512620')) {function content_566fe80c194f43_92512620($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<?php echo $_smarty_tpl->getSubTemplate ("inner_meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Meta"), 0);?>

   <link rel='stylesheet prefetch' href='<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/font-awesome.css'>
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
                	<h2>Create a New Website Form</h2>
                </div><!-- commen-heading -->
				<form name="confrimfrm" id="confrimfrm" method="post" action="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
form_makeconfirm.php" enctype="multipart/form-data">
				
				<div class="ps-code-base">
				<p>Fill out the confirmation form page details.</p>
                    <h3 class="commen-h3">Confirmation Page Options</h3>
                	
                    <div class="ps-code-feilds">
                        <?php if ($_smarty_tpl->tpl_vars['errorString']->value!='') {?> <?php echo $_smarty_tpl->tpl_vars['errorString']->value;?>
 <?php }?>
                    	<div class="row">
                        	<div class="col-sm-6">
                            	<label class="form-label"><strong>For the Confirmation Page</strong></label>
                               <input onClick="changecontent(1)" id="page_type" name="page_type" type="radio" value="html" checked>&nbsp;Let me customize what the page looks like
                            </div>
                            
                        </div>
                    </div>
                    <div class="ps-code-fes">
                        <div id="dispeditor">
                        <div class="row">
                            <div class="col-md-12">
							<?php echo $_smarty_tpl->tpl_vars['fkeditor']->value;?>

                            </div>    
                            
                        </div>
						</div>
                        
						
                    </div><!-- ps-code-fes -->
					<div class="ps-code-feilds">
                    	<div class="row">
                        	<div class="col-sm-12">
								<input onClick="changecontent(2)" id="page_type" name="page_type" type="radio" value="url" >&nbsp;Take the subscriber to an existing web site address
                            </div>
							<div class="col-sm-6">
								<div id="congirmpageurl" style="display:none">
								<div style="float:left; padding-top:5px; width:8%;"><strong>http://</strong></div>
								<div style="float:left; width:70%;"><input type="text" class="form-control commen-text-feild"  name="url" value="<?php echo $_REQUEST['url'];?>
" ></div>
								</div>
                            </div>
                            
                        </div>
                    </div>
					<h3 class="commen-h3">Email Options</h3>
					<div class="sd-form-1">
                        <?php if ($_smarty_tpl->tpl_vars['errorString']->value!='') {?> <?php echo $_smarty_tpl->tpl_vars['errorString']->value;?>
 <?php }?>
                    	<div class="row">
						<div class="col-md-6">
                            	<label class="form-label">Send From This Name</label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="send_from_name" id="send_from_name" value="<?php echo $_REQUEST['send_from_name'];?>
">
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	Which person or company should be shown in the \'From Name\' field for this email?<br/>You can change the default name by editing your contact list and changing the \'List Owners Name\'
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
							
							<div class="col-md-6">
                            	<label class="form-label">Send From This Email Address</label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="send_from_email" id="send_from_email" value="<?php echo $_REQUEST['send_from_email'];?>
">
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	Which email address should be shown in the \'From Email\' field for this email?<br/>You can change the default email address by editing your contact list and changing the \'List Owners Email\'
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
							
							<div class="col-md-6">
                            	<label class="form-label">Send Reply Emails to</label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="reply_to_email" id="reply_to_email" value="<?php echo $_REQUEST['reply_to_email'];?>
">
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	When a contact receives your email and clicks reply, which email address should that reply be sent to?<br/>You can change the default email address by editing your contact list and changing the \'Reply-To Email\'
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
							
							<div class="col-md-6">
                            	<label class="form-label">Send Bounced Emails to</label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="bounce_email" id="bounce_email" value="<?php echo $_REQUEST['bounce_email'];?>
">
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	When an email bounces, or is rejected by the mail server, which email address should the error be sent to? If you plan to use the bounce handler, then make sure no other emails will be sent to this address.<br/>You can change the default email address by editing your contact list and changing the \'Bounce Email\'
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
							
							<div class="col-md-6">
                            	<label class="form-label">Email Subject</label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="email_subject" id="email_subject" value="<?php echo $_REQUEST['email_subject'];?>
">
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	The subject of the confirmation email sent to the new contact.
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
							
							<div class="col-md-12">
                            	<label class="form-label">Confirmation Email (HTML)</label>
                                <div class="cm-sl-mode">
                                <?php echo $_smarty_tpl->tpl_vars['fkeditor1']->value;?>
	
                                </div><!-- cm-sl-mode -->
                                <!-- cs-tooltip -->
                            </div>
							
                        	<div class="col-md-12">
                            	<label class="form-label">Confirmation Email (Text)</label>
                                <div class="cm-sl-mode">
                                <textarea name="email_text" id="" cols="80" rows="13"><?php echo $_REQUEST['email_text'];?>
</textarea>
                                </div><!-- cm-sl-mode -->
                                <!-- cs-tooltip -->
                            </div>
                            
                        </div>
						<div class="button-panel">
						<?php echo $_smarty_tpl->tpl_vars['qrapp']->value;?>

                    	<input type="submit" class="cm-submit" name="submit" value="Submit">
                    </div>
                    </div>
					
					
					
                </div>
				
                <!-- send-email-base -->
				</form>
            </div><!-- right-panel -->
        </div>
		
    </section><!-- commen-base -->
<?php echo $_smarty_tpl->getSubTemplate ("inner_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Inner page js"), 0);?>


	 <script>
	
		function changecontent(pot)
		{
			//alert("dispcustom"+listId);
			//alert(document.getElementById('dispcustom'+listId).checked);
			if(pot==1)
			{
				document.getElementById("dispeditor").style.display='inline';
				document.getElementById("congirmpageurl").style.display='none';
			}
			if(pot==2)
			{
				document.getElementById("dispeditor").style.display='none';
				document.getElementById("congirmpageurl").style.display='inline';
			}
		
		}
		
</script>
	
   
<?php echo $_smarty_tpl->getSubTemplate ("end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"End of the page"), 0);?>
<?php }} ?>
