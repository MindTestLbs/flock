<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
{include file="inner_meta.tpl" title="Meta"}
    <link href="{$url->urlBase}bootstrap-colorpicker/src/bootstrap.colorpickersliders.css" rel="stylesheet" type="text/css" media="all">

    <script src="{$url->urlBase}js/vendor/jquery-1.11.1.min.js"></script>
    <script src="{$url->urlBase}js/vendor/bootstrap.min.js"></script>
    <script src="{$url->urlBase}js/run_prettify.min.js"></script>
    <script src="{$url->urlBase}js/tinycolor.min.js"></script>
    <script src="{$url->urlBase}bootstrap-colorpicker/src/bootstrap.colorpickersliders.js"></script>
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
				<form name="createformfrm" id="createformfrm" method="post" action="">
                <div class="send-email-base">
					{if $errorString!=''} {$errorString} {/if}
                	<p>Fill out the form below to create a website form.</p>
                    <h3 class="commen-h3">Form Name & Type</h3>
                    <div class="sd-form-1">
                    	<div class="row">
                        	<div class="col-md-6">
                            	<label class="form-label">Choose a Form Type</label>
                                <div class="cm-sl-mode">
								<select name="form_type" id="form_type" class="sl-select" onChange="document.createformfrm.submit();" data-validation="required">
									<option value="" {if $smarty.request.form_type==''} selected {/if}>Select</option>
									<option value="s" {if $smarty.request.form_type=='s'} selected {/if}>Subscription</option>
									<option value="u" {if $smarty.request.form_type=='u'} selected {/if}>Unsubscribe</option>
									<option value="m" {if $smarty.request.form_type=='m'} selected {/if}>Modify Details</option>
									<option value="f" {if $smarty.request.form_type=='f'} selected {/if}>Send to Friend</option>
							  </select>
							  
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	Choose the type of form you will be creating.<br>A <i>subscription</i> form lets visitors subscribe to your contact list.<br>An <i>unsubscribe</i> form allow visitors to unsubscribe from your contact list. This is optional, and an unsubscribe link can be added to your email campaigns automatically instead.<br>A <i>modify details</i> form allows contacts to modify their subscription information.<br>Finally, a <i>send to a friend</i> form lets users share your email campaign with their friends.
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
                            <div class="col-md-6">
                            	<label class="form-label">Name this Form</label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" name="form_name" id="form_name" value="{$smarty.post.form_name}"  data-validation="required">
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	Assign a name for your form
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
                            
                            
                            <div class="visible-lg col-xs-12"></div>
                            
							{if $smarty.request.form_type=='s' || $smarty.request.form_type=='u'}
							<div class="col-md-4">
                            	<label class="form-label" style="margin-top:4px; color:#333333;">Use Double Opt-In Confirmation? </label>
								<span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	Do you want the contact to receive a confirmation email with a link they must click to verify their action before they are added to or remove from your list?<br>Double opt-in is the industry standard, so if you\'re unsure you should tick this box.
                                    </span>
                                </span>
                            </div>
                            <div class="col-md-8">
                            	<div class="commen-check">
                                	<label>
                                		<input name="require_confirm" type="checkbox" value="1" checked="checked"  class="cm-checkbox">
                                     Yes, use double opt-in email confirmation
                                    </label>
									
                                    <!-- cs-tooltip -->
                                </div>
								
                            </div>
							{/if}
                        </div>
                    </div><!-- sd-form-1-->
                
					
					<h3 class="commen-h3" style="padding-top:30px;">Advanced Options</h3>
                    <div class="sd-form-1">
                    	<div class="row">
                        	<div class="col-md-6">
                            	<label class="form-label">Form Back Ground Color</label>
                                <div class="cm-sl-mode">
                                	 <input type="text" class="form-control commen-text-feild" id="full-popoverback" name="design_color" size="7" maxlength="7" value="{$smarty.post.design_color}" data-color-format="hex">
									
									
                                </div><!-- cm-sl-mode -->
								 <script>
								$("input#full-popoverback").ColorPickerSliders({
								  placement: 'bottom',
								  size: 'sm',
								  color: 'white',
								  sliders: false,
								  hsvpanel: true,
								  previewformat: 'hex',
								  previewontriggerelement:false
								});
							  </script>
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	Select the background color to be applied for your form.
                                    </span>
                                </span><!-- cs-tooltip -->
								
                            </div>
                            <div class="col-md-6">
                            	<label class="form-label">Form Letter Color</label>
                                <div class="cm-sl-mode">
                                	<input type="text" class="form-control commen-text-feild" id="full-popoverletter" name="letter_color" size="7" maxlength="7" value="{$smarty.post.letter_color}" data-color-format="hex">
                                </div><!-- cm-sl-mode -->
								<script>
								$("input#full-popoverletter").ColorPickerSliders({
								  placement: 'bottom',
								  size: 'sm',
								  color: 'black',
								  sliders: false,
								  hsvpanel: true,
								  previewformat: 'hex',
								  previewontriggerelement:false
								});
							  </script>
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	Select the font color to be applied for your form.
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
                            <div class="visible-lg col-xs-12"></div>
							{if $smarty.request.form_type=='s' || $smarty.request.form_type=='m'}
                            <div class="col-md-6">
                            	<label class="form-label">Email Campaign Format   </label>
                                <div class="cm-sl-mode">
                                <select id="form_format" name="form_format" class="sl-select">
									<option value="c" {if $smarty.request.form_format=='' || $smarty.request.form_format=='c'} selected {/if} >Allow Contact to Choose</option>
									<option value="fh" {if $smarty.request.form_format=='fh'} selected {/if}>HTML</option>
									<option value="ft" {if $smarty.request.form_format=='ft'} selected {/if}>Text</option>
							  </select>
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	Select format in which email need to be sent
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
                           	{/if}		
							
							{if $smarty.request.form_type!='f'}
                            <div class="col-md-6">
                            	<label class="form-label">Use CAPTCHA Form Security?</label>
                                <div class="cm-sl-mode">
                               <input  name="use_captcha" type="checkbox" value="1" checked="checked" />Yes, use CAPTCHA form security (recommended) 
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    Captcha (an acronym for \'Completely Automated Public Turing Test to Tell Computers and Humans Apart\') is a type of challenge-response test used in computing to determine whether or not the user is human. This helps prevent automated submission of your forms. If this is on, the form will ask for a \'security code\' to be entered in before the user can complete the website form.<br>If you are placing your form on a different domain to the one used for the application your contacts will have issues using captcha on browsers such as Safari as they do not allow third party cookies to be set by default.
                                    </span>
                                </span><!-- cs-tooltip -->
                            </div>
                           	{/if}					
							
                            
                        </div>
                    </div><!-- sd-form-1-->
					{if $smarty.request.form_type!='f'}
					<h3 class="commen-h3" style="padding-top:30px;">Choose Contact Lists</h3>
                    <div class="sd-form-1">
                    	<div class="row">
                        	<div class="col-md-6">
                            	<label class="form-label">Select Contact Lists</label>
                                <div class="cm-sl-mode">
                                 <div class="ffs-scroll">
                                        	<ul>
											{if $numLists > 0}
											{foreach $contactListArr as $item}
                                            <li>
											<div class="commen-check">
                                			<label><input  name="contctarr[]" type="checkbox" class="cm-checkbox" value="{$item.list_id}">{$item.list_name|stripslashes}</label>
											</div>
											</li>
											{/foreach}
											{/if}
                                            </ul>
                                 </div>
                                </div><!-- cm-sl-mode -->
                                <span class="smallipop cs-tooltip">
                                    <span class="smallipop-hint">
                                    	Select your required contact lists
                                    </span>
                                </span><!-- cs-tooltip -->
								
                            </div>
                   
                            
                        </div>
                    </div><!-- sd-form-1-->
						{/if}			
					
                    <div class="button-panel">
                    	<input type="submit" class="cm-submit" name="create" value="Submit">
                    </div><!-- button-panel -->
                </div><!-- send-email-base -->
				</form>
            </div><!-- right-panel -->
        </div>
		
    </section><!-- commen-base -->
	


	 <script>
	var validationSettings = {
		errorMessagePosition : 'element',
		borderColorOnError : ''
	};

	$('#createformfrm')
		.submit(function() {
			if ($(this).validate(false, validationSettings))
				return true;

			return false;
		})
		.validateOnBlur(false, validationSettings)
		.showHelpOnFocus();
		
</script>
	
    <script src="{$url->urlBase}js/jquery.matchHeight-min.js"></script>
    <script src="{$url->urlBase}js/chartist.min.js"></script>
	<script src="{$url->urlBase}js/easyResponsiveTabs.js"></script>
    <script src="{$url->urlBase}js/jquery.fs.selecter.min.js"></script>
    <script src="{$url->urlBase}js/jquery.uniform.min.js"></script>
    <script src="{$url->urlBase}js/jquery.smallipop.min.js"></script>
	<script src="{$url->urlBase}js/jquery.mCustomScrollbar.min.js"></script>
	<script type="text/javascript" src="{$url->urlBase}js/jquery.formvalidator.js"></script>
<link href="{$url->urlAssetsBase}css/validation-style.css?upd=1.5" type="text/css" rel="stylesheet"/>

    <script src="{$url->urlBase}js/jquery.fancybox.js"></script>
    <script src="{$url->urlBase}js/main.js"></script>
{include file="end.tpl" title="End of the page"}