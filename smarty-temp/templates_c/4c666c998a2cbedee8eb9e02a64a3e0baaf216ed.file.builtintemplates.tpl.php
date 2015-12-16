<?php /* Smarty version Smarty-3.1.19, created on 2015-12-10 11:46:29
         compiled from "/var/www/flock/smarty-temp/templates/builtintemplates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:400498468566918bd2538b2-55299781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c666c998a2cbedee8eb9e02a64a3e0baaf216ed' => 
    array (
      0 => '/var/www/flock/smarty-temp/templates/builtintemplates.tpl',
      1 => 1449722320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '400498468566918bd2538b2-55299781',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listCnt' => 0,
    'templates' => 0,
    'url' => 0,
    'item' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_566918bd29ee32_72688755',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566918bd29ee32_72688755')) {function content_566918bd29ee32_72688755($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_stripslashes')) include '/var/www/flock/Smarty/libs/plugins/modifier.stripslashes.php';
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<?php echo $_smarty_tpl->getSubTemplate ("inner_meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Meta"), 0);?>

</head>
<body>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <section class="commen-base">
    	<?php echo $_smarty_tpl->getSubTemplate ("dashboard_left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Dashboard Left"), 0);?>

		 <!-- flock-sidebar -->
        
                 <div class="right-panel">
        	<div class="container-fluid">
            	<div class="commen-heading">
                	<h2>Templates</h2>
                </div><!-- commen-heading -->
                <div class="template-base">
                    <div class="temp-box-control">
                        <div class="row">
                            <?php if (($_smarty_tpl->tpl_vars['listCnt']->value>0)) {?>
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['templates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="temp-cm-block">
                                            <div class="temp-img">
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['template_path'];?>
/index.html" data-fancybox-type="iframe"  class="temp-popup"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
<?php echo $_smarty_tpl->tpl_vars['item']->value['template_path'];?>
/preview.gif" class="img-responsive"></a>
                                            </div><!-- temp-img -->
                                            <div class="temp-content">
                                                <p><?php echo smarty_modifier_stripslashes($_smarty_tpl->tpl_vars['item']->value['built_template_name']);?>
(<?php echo smarty_modifier_stripslashes($_smarty_tpl->tpl_vars['item']->value['category_name']);?>
)</p>
                                            </div>            	
                                        </div><!-- temp-cm-block -->
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="cc-list" style=" padding:12px 12px; text-align:center; color:#FF0000; ">
                                No templates found!!
                                </div>
                            <?php }?>
                            
                            	 
                        </div> 
                    </div>
                <?php if ($_smarty_tpl->tpl_vars['listCnt']->value>0) {?>
                   <div class="pagination">
                   <?php echo $_smarty_tpl->tpl_vars['pager']->value->showPager(1,1,1);?>

                   </div>     
               <?php }?>
                </div><!-- template-base -->
            </div><!-- right-panel -->
        </div>
		
    </section><!-- commen-base -->
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
	
<?php echo $_smarty_tpl->getSubTemplate ("end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"End of the page"), 0);?>
<?php }} ?>
