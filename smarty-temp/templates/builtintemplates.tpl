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
                <div class="template-base">
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
                </div><!-- template-base -->
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