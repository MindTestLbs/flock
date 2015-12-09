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
    	{include file="inner_left.tpl" title="Dashboard Left"}
		 <!-- flock-sidebar -->
        
		<div class="right-panel">
        	<div class="container-fluid">
            	<div class="commen-heading">
                	<h2>Add New Subscriber</h2>
                </div><!-- commen-heading -->
				<form name="addcontactfrm" id="addcontactfrm" method="post" action="">
                <div class="send-email-base">
					{if $errorString!=''} {$errorString} {/if}
                	<p>Fill out the form below to add an email to the list "{$list_name}".</p>
                    <h3 class="commen-h3">SUBSCRIBER DETAILS</h3>
                    <div class="sd-form-1">
                    	<div class="row">
                        	<div class="col-md-12">
                            	<label class="form-label">Email Address*</label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" placeholder="" name="email_id" id="email_id" value="{$smarty.post.email_id}"  data-validation="required">
                                </div><!-- cm-sl-mode -->
                                
                            </div>
                            
                            <div class="visible-lg col-xs-12"></div>
							
							<div class="col-md-6">
                            	<label class="form-label">First Name </label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="firstname" value="{$smarty.post.firstname}" >
                                </div><!-- cm-sl-mode -->
                               
                            </div>
							
                            <div class="col-md-6">
                            	<label class="form-label">Last Name   </label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="lastname" value="{$smarty.post.lastname}" >
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
                    {if ( $customCnt > 0 )}
					
					
					
					<!--<h3 class="commen-h3" style="padding-top:10px;">CUSTOM FIELDS</h3>
						<div class="sd-form-1">
                    		<div class="row">
                     			
									{foreach $customFields as $item}
									<div class="col-md-6">
										<label class="form-label">{$item.customfield_name|stripslashes} </label>
										<div class="cm-sl-mode">
											<input type="text" class="form-control commen-text-feild" name="firstname" value="{$smarty.post.firstname}" >
										</div>
										<span class="smallipop cs-tooltip">
											<span class="smallipop-hint">
												The name of the person who owns this list. This is the default name used when you send an email campaign to this contact list.
											</span>
										</span>
									</div>
									<input type="checkbox" name="custom_fields[]"  value="{$item.customfield_id}" >&nbsp;{$item.customfield_name|stripslashes}<br />
									{/foreach}						
                      		
                        </div>
                    </div>--><!-- sd-form-1-->
					{/if}
					
				
                    <!-- sd-form-1-->
					
                    <div class="button-panel">
                    	<input type="submit" class="cm-submit" name="submit" value="Submit">
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

	$('#addcontactfrm')
		.submit(function() {
			if ($(this).validate(false, validationSettings))
				return true;

			return false;
		})
		.validateOnBlur(false, validationSettings)
		.showHelpOnFocus();

</script>
	
{include file="end.tpl" title="End of the page"}