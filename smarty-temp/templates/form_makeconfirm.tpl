<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
{include file="inner_meta.tpl" title="Meta"}
   <link rel='stylesheet prefetch' href='{$url->urlBase}css/font-awesome.css'>
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
                	<h2>Create a New Website Form</h2>
                </div><!-- commen-heading -->
				<form name="confrimfrm" id="confrimfrm" method="post" action="{$url->urlBase}form_makeconfirm.php" enctype="multipart/form-data">
				
				<div class="ps-code-base">
				<p>Fill out the confirmation form page details.</p>
                    <h3 class="commen-h3">Confirmation Page Options</h3>
                	
                    <div class="ps-code-feilds">
                        {if $errorString!=''} {$errorString} {/if}
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
							{$fkeditor}
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
								<div style="float:left; width:70%;"><input type="text" class="form-control commen-text-feild"  name="url" value="{$smarty.request.url}" ></div>
								</div>
                            </div>
                            
                        </div>
                    </div>
					<h3 class="commen-h3">Email Options</h3>
					<div class="sd-form-1">
                        {if $errorString!=''} {$errorString} {/if}
                    	<div class="row">
						<div class="col-md-6">
                            	<label class="form-label">Send From This Name</label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="send_from_name" id="send_from_name" value="{$smarty.request.send_from_name}">
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
                                	<input type="text" class="form-control commen-text-feild" name="send_from_email" id="send_from_email" value="{$smarty.request.send_from_email}">
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
                                	<input type="text" class="form-control commen-text-feild" name="reply_to_email" id="reply_to_email" value="{$smarty.request.reply_to_email}">
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
                                	<input type="text" class="form-control commen-text-feild" name="bounce_email" id="bounce_email" value="{$smarty.request.bounce_email}">
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
                                	<input type="text" class="form-control commen-text-feild" name="email_subject" id="email_subject" value="{$smarty.request.email_subject}">
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
                                {$fkeditor1}	
                                </div><!-- cm-sl-mode -->
                                <!-- cs-tooltip -->
                            </div>
							
                        	<div class="col-md-12">
                            	<label class="form-label">Confirmation Email (Text)</label>
                                <div class="cm-sl-mode">
                                <textarea name="email_text" id="" cols="80" rows="13">{$smarty.request.email_text}</textarea>
                                </div><!-- cm-sl-mode -->
                                <!-- cs-tooltip -->
                            </div>
                            
                        </div>
						<div class="button-panel">
						{$qrapp}
                    	<input type="submit" class="cm-submit" name="submit" value="Submit">
                    </div>
                    </div>
					
					
					
                </div>
				
                <!-- send-email-base -->
				</form>
            </div><!-- right-panel -->
        </div>
		
    </section><!-- commen-base -->
{include file="inner_js.tpl" title="Inner page js"}

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
	
   
{include file="end.tpl" title="End of the page"}