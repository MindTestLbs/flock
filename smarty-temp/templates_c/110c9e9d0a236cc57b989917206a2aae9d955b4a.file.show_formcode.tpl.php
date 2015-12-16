<?php /* Smarty version Smarty-3.1.19, created on 2015-12-15 15:46:19
         compiled from "/var/www/flock/smarty-temp/templates/show_formcode.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1912149217566fe8730be6f6-21844174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '110c9e9d0a236cc57b989917206a2aae9d955b4a' => 
    array (
      0 => '/var/www/flock/smarty-temp/templates/show_formcode.tpl',
      1 => 1450174252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1912149217566fe8730be6f6-21844174',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'errorString' => 0,
    'formapp' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_566fe8730f8614_39374070',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566fe8730f8614_39374070')) {function content_566fe8730f8614_39374070($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_stripslashes')) include '/var/www/flock/Smarty/libs/plugins/modifier.stripslashes.php';
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
                	<h2>Show website form script</h2>
                </div><!-- commen-heading -->
                <div class="ps-code-base">
                	<p>Displays the form html script</p>
                    <div class="ps-code-feilds">
                        <?php if ($_smarty_tpl->tpl_vars['errorString']->value!='') {?> <?php echo $_smarty_tpl->tpl_vars['errorString']->value;?>
 <?php }?>
                    	
                    </div>
                    <div class="ps-code-fes">
                        
                        <div class="row">
                            <div class="col-md-8">
                                <textarea class="form-control code-edit-feild" name="code" onclick="this.select();"><?php echo smarty_modifier_stripslashes($_smarty_tpl->tpl_vars['formapp']->value);?>
</textarea>
                            </div>
                        </div>
                        
						<div class="sc-submit-base">
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
list_forms.php" class="cm-submit">OK</a>
						</div><!-- sc-submit-base -->
                    </div><!-- ps-code-fes -->
                </div><!-- ps-code-base -->
            </div><!-- right-panel -->
        </div>
		
    </section><!-- commen-base -->
    
    
    
    
	<?php echo $_smarty_tpl->getSubTemplate ("inner_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Inner page js"), 0);?>

	
	
  
<?php echo $_smarty_tpl->getSubTemplate ("end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"End of the page"), 0);?>
<?php }} ?>
