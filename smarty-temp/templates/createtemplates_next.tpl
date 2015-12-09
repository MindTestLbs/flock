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
                	<h2>Create Template</h2>
                </div><!-- commen-heading -->
                <form method="post" action="{$url->urlBase}createtemplates_next.php" enctype="multipart/form-data">
                <div class="ps-code-base">
                	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.                    </p>
                    <div class="ps-code-feilds">
                        {if $errorString!=''} {$errorString} {/if}
                    	<div class="row">
                        	<div class="col-sm-6">
                            	<label class="form-label">Template Names</label>
                                <input type="text" class="form-control commen-text-feild" placeholder="Template Name" name="template_name" id="template_name" value="{$smarty.post.template_name|stripslashes}">
                            </div>
                            
                        </div>
                    </div>
                    <div class="ps-code-fes">
                        
                        <div class="row"  ng-app="textAngularTest" ng-controller="wysiwygeditor">
                            <div class="col-md-7">
                             <div text-angular="text-angular" name="htmlcontent" ng-model="htmlcontent" ta-disabled='disabled' class="code-preview"></div>
                            </div>    
                            <div class="col-md-5">
                                <div class="source-code-base">
                                    <h5>Edit code</h5>
                                    <div class="source-editor">
                                        <textarea class="form-control code-edit-feild" ng-model="htmlcontent" name="template_html_content" id="template_html_content">{$smarty.post.template_html_content|stripslashes}</textarea>
                                    </div>
                                    <div class="source-save">
                                      <a href="javascript:void(0)" class="file-mgr">File manager</a>									</div><!-- source-save  -->
                                    </div><!-- source-code-base -->
                            </div>
                        </div>
                        
						<div class="sc-submit-base">
                                                    <input type="submit" name="submit" class="cm-submit" value="Create">
						</div><!-- sc-submit-base -->
                    </div><!-- ps-code-fes -->
                </div><!-- ps-code-base -->
                </form>
            </div><!-- right-panel -->
        </div>
		
    </section><!-- commen-base -->
    
    
    
    {include file="filemanager_popup.tpl" title="Dashboard Left"}
    
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
	
	
	  <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular.min.js'></script>
  <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular-sanitize.min.js'></script>
  <script src='{$url->urlBase}angular/textAngular.min.js'></script>
  
  <script>
       
       angular.module("textAngularTest", ['textAngular']);
	function wysiwygeditor($scope) {
		$scope.orightml = document.getElementById("template_html_content").value;;
		$scope.htmlcontent = $scope.orightml;
		$scope.disabled = false;
	};
  </script>
   
  
{include file="end.tpl" title="End of the page"}