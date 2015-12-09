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
                	<h2>Templates</h2>
                </div><!-- commen-heading -->
                <div class="code-ur-own-bs">
                	<div class="commen-tab">
                        <div class="tab-margin">
                            <ul class="resp-tabs-list clearfix">
				<li><a href="#">Code Your Own</a></li>
                               <li><a href="#">Themes</a></li>
                            </ul>
                        </div>
                        <div class="resp-tabs-container">
                        	<div class="tab-items">
                                <div class="cods-grid">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="code-block">
                                                <div class="code-img">
                                                    <span class="code-default"><img src="{$url->urlImageBase}img-code-1.png" class="img-responsive"></span>
                                                    <span class="code-over"><img src="{$url->urlImageBase}img-code-1-h.png" class="img-responsive"></span>
                                                </div><!-- code-img --->
                                                <div class="code-content">
                                                    <h4>Paste in code</h4>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    </p>
                                                    <a href="{$url->urlBase}createtemplates_next.php" class="code-link"></a>
                                                </div><!--- code-content -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="code-block">
                                                <div class="code-img">
                                                    <span class="code-default"><img src="{$url->urlImageBase}img-code-2.png" class="img-responsive"></span>
                                                    <span class="code-over"><img src="{$url->urlImageBase}img-code-2-h.png" class="img-responsive"></span>
                                                </div><!-- code-img --->
                                                <div class="code-content">
                                                    <h4>Import HTML</h4>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    </p>
                                                    <a href="#linkpopup" class="code-link code-popup"></a>
                                                    <div class="pop-content" id="linkpopup">
                                                        <h3>Import HTML</h3>
                                                        <form method="post" action="{$url->urlBase}createtemplates_next.php" enctype="multipart/form-data">
                                                            <div class="pop-form-content">
                                                                <div class="elm-block">
                                                                    <label class="form-label">Template name</label>
                                                                    <input type="text" name="template_name" class="form-control commen-text-feild" placeholder="">
                                                                </div><!-- elm-block -->
                                                                <div class="elm-block">
                                                                    <label class="form-label">Template file <span>(HTML file only please)</span></label>
                                                                    <div class="cm-file-chooser">
                                                                        <input type="file" class="cm-file-upload" value="Upload" name="upfilecontent">
                                                                    </div><!-- cm-file-chooser -->
                                                                </div><!-- elm-block -->
                                                                <div class="elm-block elm-button-div">
                                                                    <input type="submit" name="uploaddoc" class="cm-submit" value="Upload">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div><!--- code-content -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="code-block">
                                                <div class="code-img">
                                                    <span class="code-default"><img src="{$url->urlImageBase}img-code-3.png" class="img-responsive"></span>
                                                    <span class="code-over"><img src="{$url->urlImageBase}img-code-3-h.png" class="img-responsive"></span>
                                                </div><!-- code-img --->
                                                <div class="code-content">
                                                    <h4>Import from Any url</h4>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    </p>
                                                    <a href="#linkpopupurl" class="code-link code-popup"></a>
                                                   
                                                    <div class="pop-content" id="linkpopupurl">
                                                            <h3>Import from Any url</h3>
                                                             <form method="post" action="{$url->urlBase}createtemplates_next.php" enctype="multipart/form-data">
                                                                <div class="pop-form-content">
                                                                    <div class="elm-block">
                                                                        <label class="form-label">Template name</label>
                                                                        <input type="text" name="template_name" class="form-control commen-text-feild" placeholder="">
                                                                    </div><!-- elm-block -->
                                                                    <div class="elm-block">
                                                                        <label class="form-label">Website Url</label>
                                                                        http://<input type="text" name="urlimport" class="form-control commen-text-feild" placeholder="Enter the website url">
                                                                    </div><!-- elm-block -->
                                                                    <div class="elm-block elm-button-div">
                                                                        <input type="submit" name="importurl" class="cm-submit" value="Import">
                                                                    </div>
                                                                </div>
                                                             </form>
                                                    </div>
                                                    
                                                </div><!--- code-content -->
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="tab-items">
                            	<div class="temp-box-control">
                                    <div class="row">
                                        
                                        {if ( $listCnt > 0 )}
                                            {foreach $templates as $item}
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="temp-cm-block">
                                                        <div class="temp-img">
                                                            <a href="{$url->urlBase}{$item.template_path}/index.html" data-fancybox-type="iframe"  class="temp-popup"><img src="{$url->urlBase}{$item.template_path}/preview.gif" class="img-responsive"></a>
                                                        </div><!-- temp-img -->
                                                        <div class="temp-content">
                                                            <p>{$item.built_template_name|stripslashes}({$item.category_name|stripslashes})</p>
                                                            <a href="{$url->urlBase}createtemplates_next.php?TemplateID={$item.template_path|sonEncode}" class="temp-select">Select</a>
                                                        </div>            	
                                                    </div><!-- temp-cm-block -->
                                                </div>
                                            {/foreach}
                                        {else}
                                            <div class="cc-list" style=" padding:12px 12px; text-align:center; color:#FF0000; ">
                                            No templates found!!
                                            </div>
                                        {/if}
                            
                                        
                                       
                                    </div>
                                </div>
                                {if $listCnt > 0}
                                    <div class="pagination">
                                    {$pager -> showPager(1,1,1)}
                                    </div>     
                                {/if}
                            </div>
                        </div>
                    </div>
                </div><!-- code-ur-own -->
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