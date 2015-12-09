<?php /* Smarty version Smarty-3.1.19, created on 2015-12-07 17:45:42
         compiled from "/var/www/flockmails-refined/smarty-temp/templates/createtemplates_next.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15798382725665786f003812-53245861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50561c0f0d99d3c785647430ae88c4478300f055' => 
    array (
      0 => '/var/www/flockmails-refined/smarty-temp/templates/createtemplates_next.tpl',
      1 => 1449490497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15798382725665786f003812-53245861',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'errorString' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5665786f040f92_06159633',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5665786f040f92_06159633')) {function content_5665786f040f92_06159633($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_stripslashes')) include '/var/www/flockmails-refined/Smarty/libs/plugins/modifier.stripslashes.php';
?><!DOCTYPE html>
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
    <section class="commen-base  sidebar-toggle">
    	<?php echo $_smarty_tpl->getSubTemplate ("dashboard_left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Dashboard Left"), 0);?>

		 <!-- flock-sidebar -->
        
		<div class="right-panel pst-right-panel">
        	<div class="container-fluid">
            	<div class="commen-heading">
                	<h2>Create Template</h2>
                </div><!-- commen-heading -->
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
createtemplates_next.php" enctype="multipart/form-data">
                <div class="ps-code-base">
                	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.                    </p>
                    <div class="ps-code-feilds">
                        <?php if ($_smarty_tpl->tpl_vars['errorString']->value!='') {?> <?php echo $_smarty_tpl->tpl_vars['errorString']->value;?>
 <?php }?>
                    	<div class="row">
                        	<div class="col-sm-6">
                            	<label class="form-label">Template Names</label>
                                <input type="text" class="form-control commen-text-feild" placeholder="Template Name" name="template_name" id="template_name" value="<?php echo smarty_modifier_stripslashes($_POST['template_name']);?>
">
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
                                        <textarea class="form-control code-edit-feild" ng-model="htmlcontent" name="template_html_content" id="template_html_content"><?php echo smarty_modifier_stripslashes($_POST['template_html_content']);?>
</textarea>
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
    
    
    
    <?php echo $_smarty_tpl->getSubTemplate ("filemanager_popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Dashboard Left"), 0);?>

    
	<?php echo $_smarty_tpl->getSubTemplate ("inner_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Inner page js"), 0);?>

	
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
  <script src='<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
angular/textAngular.min.js'></script>
  
  <script>
       
       angular.module("textAngularTest", ['textAngular']);
	function wysiwygeditor($scope) {
		$scope.orightml = document.getElementById("template_html_content").value;;
		$scope.htmlcontent = $scope.orightml;
		$scope.disabled = false;
	};
  </script>
   
  
<?php echo $_smarty_tpl->getSubTemplate ("end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"End of the page"), 0);?>
<?php }} ?>
