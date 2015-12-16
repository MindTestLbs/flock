<?php /* Smarty version Smarty-3.1.19, created on 2015-12-15 14:42:26
         compiled from "/var/www/flock/smarty-temp/templates/meta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:941254192566fd97adcce52-58086709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2721a6ddc4d34de3819046aba44f1995fef8553c' => 
    array (
      0 => '/var/www/flock/smarty-temp/templates/meta.tpl',
      1 => 1449722320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '941254192566fd97adcce52-58086709',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'metaDetails' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_566fd97adf6229_41227938',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566fd97adf6229_41227938')) {function content_566fd97adf6229_41227938($_smarty_tpl) {?><meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
       <title><?php echo $_smarty_tpl->tpl_vars['metaDetails']->value['page_title'];?>
</title>
		<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['metaDetails']->value['meta_desc'];?>
">
		<meta name="keywords" content='<?php echo $_smarty_tpl->tpl_vars['metaDetails']->value['meta_tags'];?>
'>
		
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/bootstrap.min.css">

        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/bootstrap-theme.min.css">
        
        
        <!-- Owl Carousel Assets -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/owl.carousel.css" rel="stylesheet">
        
        <!-- dont use -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/owl.theme.css" rel="stylesheet">
        <!-- dont use -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/owl.transitions.css" rel="stylesheet">
        
		<!-- fancy box -->
		<link href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/jquery.fancybox.css" rel="stylesheet" >
		
        <link href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/uniform.default.css" rel="stylesheet" >
		<link href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/main.css" rel="stylesheet" >
        <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script><?php }} ?>
