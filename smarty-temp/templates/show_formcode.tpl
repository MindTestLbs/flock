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
    <section class="commen-base  sidebar-toggle">
    	{include file="dashboard_left.tpl" title="Dashboard Left"}
		 <!-- flock-sidebar -->
        
		<div class="right-panel pst-right-panel">
        	<div class="container-fluid">
            	<div class="commen-heading">
                	<h2>Show website form script</h2>
                </div><!-- commen-heading -->
                <div class="ps-code-base">
                	<p>Displays the form html script</p>
                    <div class="ps-code-feilds">
                        {if $errorString!=''} {$errorString} {/if}
                    	
                    </div>
                    <div class="ps-code-fes">
                        
                        <div class="row">
                            <div class="col-md-8">
                                <textarea class="form-control code-edit-feild" name="code" onclick="this.select();">{$formapp|stripslashes}</textarea>
                            </div>
                        </div>
                        
						<div class="sc-submit-base">
                                                    <a href="{$url->urlBase}list_forms.php" class="cm-submit">OK</a>
						</div><!-- sc-submit-base -->
                    </div><!-- ps-code-fes -->
                </div><!-- ps-code-base -->
            </div><!-- right-panel -->
        </div>
		
    </section><!-- commen-base -->
    
    
    
    
	{include file="inner_js.tpl" title="Inner page js"}
	
	
  
{include file="end.tpl" title="End of the page"}