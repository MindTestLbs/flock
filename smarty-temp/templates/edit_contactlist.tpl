<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
{include file="inner_meta.tpl" title="Meta"}
</head>
<body>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section class="commen-base">
    	{include file="dashboard_left.tpl" title="Dashboard Left"}
		 <!-- flock-sidebar -->
        
		<div class="right-panel">
        	<div class="container-fluid">
            	<div class="commen-heading">
                	<h2>Edit a Contact List</h2>
                </div><!-- commen-heading -->
				<form name="createTempfrm" id="createTempfrm" method="post" action="{$url->urlBase}edit_contactlist.php">
                <div class="send-email-base">
					{if $errorString!=''} {$errorString} {/if}
                	<p>Update the below form fields  to edit the list.</p>
                    <h3 class="commen-h3"> LIST DETAILS</h3>
                    <div class="sd-form-1">
                    	<div class="row">
                        	<div class="col-md-6">
                            	<label class="form-label">List Name</label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" placeholder="" name="list_name" value="{$smarty.post.list_name}"  data-validation="required">
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
                                	<input type="text" class="form-control commen-text-feild" name="list_owner_name" value="{$smarty.post.list_owner_name}"  data-validation="required">
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
                                	<input type="text" class="form-control commen-text-feild" name="list_owner_email_id" value="{$smarty.post.list_owner_email_id}"  data-validation="validate_email">
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
                                	<input type="text" class="form-control commen-text-feild" name="list_reply_to_mailId" value="{$smarty.post.list_reply_to_mailId}"  data-validation="validate_email">
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
                                	<input type="text" class="form-control commen-text-feild" name="list_bounce_email" value="{$smarty.post.list_bounce_email}"  data-validation="validate_email">
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
                                		<input name="notify_owner" type="checkbox" value="1" {if ( $smarty.post.notify_owner == '1' )} checked="checked" {/if} class="cm-checkbox">
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
                                	<input type="text" class="form-control commen-text-feild" placeholder="" name="company_name" value="{$smarty.post.company_name}"  >
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
                                	<input type="text" class="form-control commen-text-feild" name="company_address" value="{$smarty.post.company_address}"  >
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
                                	<input type="text" class="form-control commen-text-feild" name="company_phone_number" value="{$smarty.post.company_phone_number}" >
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
						<input type="hidden" name="list_id" value="{$smarty.request.list_id}">
                    	<input type="submit" class="cm-submit" name="update" value="Submit">
                    </div><!-- button-panel -->
                </div><!-- send-email-base -->
				</form>
            </div><!-- right-panel -->
        </div>
		
    </section><!-- commen-base -->
	{include file="inner_js.tpl" title="Inner page js"}
	
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
	
{include file="end.tpl" title="End of the page"}