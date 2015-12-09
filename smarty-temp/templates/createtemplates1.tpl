<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
{include file="inner_meta.tpl" title="Meta"}
<link rel='stylesheet prefetch' href='{$url->urlBase}css/font-awesome.css'>
<style>
.ta-editor {
  min-height: 300px;
  height: auto;
  overflow: auto;
  font-family: inherit;
  font-size: 100%;
}

</style>
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
                                 <div ng-app="textAngularTest" ng-controller="wysiwygeditor">
									  <h3>Editor</h3>
									  <div text-angular="text-angular" name="htmlcontent" ng-model="htmlcontent" ta-disabled='disabled'></div>
									  <h3>Raw HTML in a text area</h3>
									  <textarea ng-model="htmlcontent" name="mailcontent" id="mailcontent" style="width: 100%; height:400px;"></textarea>
									  
									</div>
                                  </div>
                            </div>
                            <div class="tab-items">
                            	<div class="temp-box-control">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="temp-cm-block" style="height: 313px;">
                                                <div class="temp-img">
                                                    <a href="#"><img src="{$url->urlImageBase}img-temp-1.jpg" class="img-responsive"></a>
                                                </div><!-- temp-img -->
                                                <div class="temp-content">
                                                    <p>Subscriber Alert</p>
                                                    <a href="#" class="temp-select">Select</a>
                                                </div>            	
                                            </div><!-- temp-cm-block -->
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="temp-cm-block" style="height: 313px;">
                                                <div class="temp-img">
                                                    <a href="#"><img src="{$url->urlImageBase}img-temp-2.jpg" class="img-responsive"></a>
                                                </div><!-- temp-img -->
                                                <div class="temp-content">
                                                    <p>Subscriber Alert</p>
                                                    <a href="#" class="temp-select">Select</a>
                                                </div>            	
                                            </div><!-- temp-cm-block -->
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="temp-cm-block" style="height: 313px;">
                                                <div class="temp-img">
                                                    <a href="#"><img src="{$url->urlImageBase}img-temp-3.jpg" class="img-responsive"></a>
                                                </div><!-- temp-img -->
                                                <div class="temp-content">
                                                    <p>Subscriber Alert</p>
                                                    <a href="#" class="temp-select">Select</a>
                                                </div>            	
                                            </div><!-- temp-cm-block -->
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="temp-cm-block" style="height: 313px;">
                                                <div class="temp-img">
                                                    <a href="#"><img src="{$url->urlImageBase}img-temp-4.jpg" class="img-responsive"></a>
                                                </div><!-- temp-img -->
                                                <div class="temp-content">
                                                    <p>Subscriber Alert</p>
                                                    <a href="#" class="temp-select">Select</a>
                                                </div>            	
                                            </div><!-- temp-cm-block -->
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="temp-cm-block" style="height: 313px;">
                                                <div class="temp-img">
                                                    <a href="#"><img src="{$url->urlImageBase}img-temp-5.jpg" class="img-responsive"></a>
                                                </div><!-- temp-img -->
                                                <div class="temp-content">
                                                    <p>Subscriber Alert</p>
                                                    <a href="#" class="temp-select">Select</a>
                                                </div>            	
                                            </div><!-- temp-cm-block -->
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="temp-cm-block" style="height: 313px;">
                                                <div class="temp-img">
                                                    <a href="#"><img src="{$url->urlImageBase}img-temp-6.jpg" class="img-responsive"></a>
                                                </div><!-- temp-img -->
                                                <div class="temp-content">
                                                    <p>Subscriber Alert</p>
                                                    <a href="#" class="temp-select">Select</a>
                                                </div>            	
                                            </div><!-- temp-cm-block -->
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="temp-cm-block" style="height: 313px;">
                                                <div class="temp-img">
                                                    <a href="#"><img src="{$url->urlImageBase}img-temp-7.jpg" class="img-responsive"></a>
                                                </div><!-- temp-img -->
                                                <div class="temp-content">
                                                    <p>Subscriber Alert</p>
                                                    <a href="#" class="temp-select">Select</a>
                                                </div>            	
                                            </div><!-- temp-cm-block -->
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="temp-cm-block" style="height: 313px;">
                                                <div class="temp-img">
                                                    <a href="#"><img src="{$url->urlImageBase}img-temp-8.jpg" class="img-responsive"></a>
                                                </div><!-- temp-img -->
                                                <div class="temp-content">
                                                    <p>Subscriber Alert</p>
                                                    <a href="#" class="temp-select">Select</a>
                                                </div>            	
                                            </div><!-- temp-cm-block -->
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="temp-cm-block" style="height: 313px;">
                                                <div class="temp-img">
                                                    <a href="#"><img src="{$url->urlImageBase}img-temp-9.jpg" class="img-responsive"></a>
                                                </div><!-- temp-img -->
                                                <div class="temp-content">
                                                    <p>Subscriber Alert</p>
                                                    <a href="#" class="temp-select">Select</a>
                                                </div>            	
                                            </div><!-- temp-cm-block -->
                                        </div>
                                    </div>
                                </div>
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
	
	
	  <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular.min.js'></script>
  <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular-sanitize.min.js'></script>
  <script src='{$url->urlBase}angular/textAngular.min.js'></script>
  
   <script src="{$url->urlBase}angular/angulareditor.js"></script>
  
{include file="end.tpl" title="End of the page"}