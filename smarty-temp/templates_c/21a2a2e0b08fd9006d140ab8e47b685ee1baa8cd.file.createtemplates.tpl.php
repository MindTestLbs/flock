<?php /* Smarty version Smarty-3.1.19, created on 2015-12-14 17:04:04
         compiled from "/var/www/flock/smarty-temp/templates/createtemplates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60862656566ea92c471617-55445286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21a2a2e0b08fd9006d140ab8e47b685ee1baa8cd' => 
    array (
      0 => '/var/www/flock/smarty-temp/templates/createtemplates.tpl',
      1 => 1449722320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60862656566ea92c471617-55445286',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'listCnt' => 0,
    'templates' => 0,
    'item' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_566ea92c4fb3a5_98799083',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566ea92c4fb3a5_98799083')) {function content_566ea92c4fb3a5_98799083($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_stripslashes')) include '/var/www/flock/Smarty/libs/plugins/modifier.stripslashes.php';
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
                                                    <span class="code-default"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-code-1.png" class="img-responsive"></span>
                                                    <span class="code-over"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-code-1-h.png" class="img-responsive"></span>
                                                </div><!-- code-img --->
                                                <div class="code-content">
                                                    <h4>Paste in code</h4>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    </p>
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
createtemplates_next.php" class="code-link"></a>
                                                </div><!--- code-content -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="code-block">
                                                <div class="code-img">
                                                    <span class="code-default"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-code-2.png" class="img-responsive"></span>
                                                    <span class="code-over"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-code-2-h.png" class="img-responsive"></span>
                                                </div><!-- code-img --->
                                                <div class="code-content">
                                                    <h4>Import HTML</h4>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    </p>
                                                    <a href="#linkpopup" class="code-link code-popup"></a>
                                                    <div class="pop-content" id="linkpopup">
                                                        <h3>Import HTML</h3>
                                                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
createtemplates_next.php" enctype="multipart/form-data">
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
                                                    <span class="code-default"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-code-3.png" class="img-responsive"></span>
                                                    <span class="code-over"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-code-3-h.png" class="img-responsive"></span>
                                                </div><!-- code-img --->
                                                <div class="code-content">
                                                    <h4>Import from Any url</h4>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    </p>
                                                    <a href="#linkpopupurl" class="code-link code-popup"></a>
                                                   
                                                    <div class="pop-content" id="linkpopupurl">
                                                            <h3>Import from Any url</h3>
                                                             <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
createtemplates_next.php" enctype="multipart/form-data">
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
                                                            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
createtemplates_next.php?TemplateID=<?php echo sonEncode($_smarty_tpl->tpl_vars['item']->value['template_path']);?>
" class="temp-select">Select</a>
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
                            </div>
                        </div>
                    </div>
                </div><!-- code-ur-own -->
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
