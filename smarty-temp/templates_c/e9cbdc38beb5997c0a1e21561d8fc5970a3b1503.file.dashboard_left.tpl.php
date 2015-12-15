<?php /* Smarty version Smarty-3.1.19, created on 2015-12-15 15:46:19
         compiled from "/var/www/flock/smarty-temp/templates/dashboard_left.tpl" */ ?>
<?php /*%%SmartyHeaderCode:775491877566fe873137977-80082806%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9cbdc38beb5997c0a1e21561d8fc5970a3b1503' => 
    array (
      0 => '/var/www/flock/smarty-temp/templates/dashboard_left.tpl',
      1 => 1450170844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '775491877566fe873137977-80082806',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'profile_image' => 0,
    'fullname' => 0,
    'user_email' => 0,
    'pageName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_566fe87325a566_60221740',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566fe87325a566_60221740')) {function content_566fe87325a566_60221740($_smarty_tpl) {?><div class="flock-sidebar second-sidebar"><!--Add to  this class "second-sidebar" to change the sidebar style -->
        	<div class="flock-logo">
            	<h1 class="logo">
                	<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
member_home.php"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-logo.png" class="img-responsive"></a>
                </h1><!-- logo -->
            </div><!-- flock-logo -->
            <div class="user-overview">
            	<div class="user-thumb">
                	<a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
profileimages/thumb/<?php echo $_smarty_tpl->tpl_vars['profile_image']->value;?>
" class="img-responsive"></a>
                </div><!-- user-thumb -->
                <div class="user-information">
                	<h2><?php echo $_smarty_tpl->tpl_vars['fullname']->value;?>
</h2>
                    <span class="user-mail">
                    	<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
myprofile.php"><?php echo $_smarty_tpl->tpl_vars['user_email']->value;?>
</a>
                    </span>
                    <div class="user-button-group">
                    	<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
upgrade.php" class="us-upgrade">Upgrade</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
logout.php" class="log-out">Logout</a>
                    </div><!-- user-button-group -->
                </div><!-- user-information -->
            </div><!-- user-overview -->
            <div class="sidebar-nav">
            	<ul>
                	<li  <?php if (($_smarty_tpl->tpl_vars['pageName']->value=='member_home.php')) {?> class="active" <?php }?>>
                    	<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
member_home.php">
                        	<span class="span-icon">
                            	<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-1.png" class="img-default">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-1-h.png" class="img-over">
                            </span>
                            <span class="span-text">Dashboard</span>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li  <?php if (($_smarty_tpl->tpl_vars['pageName']->value=='contactlists.php'||$_smarty_tpl->tpl_vars['pageName']->value=='create_contactlist.php'||$_smarty_tpl->tpl_vars['pageName']->value=='edit_contactlist.php')) {?> class="active" <?php }?>>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-2.png" class="img-default">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-2-h.png" class="img-over">
                            </span>
                            <span class="span-text">Subscribers</span>
                            <div class="clearfix"></div>
                        </a>
                        <ul>
                        	<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
contactlists.php">Contactlists</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
create_contactlist.php">Create Contactlist</a></li>
							<?php if (($_smarty_tpl->tpl_vars['pageName']->value=='contactlist_contacts.php'||$_smarty_tpl->tpl_vars['pageName']->value=='add_contact.php'||$_smarty_tpl->tpl_vars['pageName']->value=='edit_contact.php')) {?>
                            <li <?php if (($_smarty_tpl->tpl_vars['pageName']->value=='contactlist_contacts.php')) {?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
contactlist_contacts.php?list_id=<?php echo $_REQUEST['list_id'];?>
">Contact Subscribers</a></li>
							 <li <?php if (($_smarty_tpl->tpl_vars['pageName']->value=='add_contact.php')) {?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
add_contact.php?list_id=<?php echo $_REQUEST['list_id'];?>
">Add Subscriber</a></li>
							 <li <?php if (($_smarty_tpl->tpl_vars['pageName']->value=='import_contacts.php')) {?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
import_contacts.php?list_id=<?php echo $_REQUEST['list_id'];?>
">Import Contacts</a></li>
							 <li <?php if (($_smarty_tpl->tpl_vars['pageName']->value=='export_contacts.php')) {?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
export_contacts.php?list_id=<?php echo $_REQUEST['list_id'];?>
">Export Contacts</a></li>
							<?php }?>
                        </ul>
                    </li>
                      <li  <?php if (($_smarty_tpl->tpl_vars['pageName']->value=='builtintemplates.php'||$_smarty_tpl->tpl_vars['pageName']->value=='custom_templates.php'||$_smarty_tpl->tpl_vars['pageName']->value=='createtemplates.php')) {?> class="active" <?php }?>>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-3.png" class="img-default">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-3-h.png" class="img-over">
                            </span>
                            <span class="span-text">Templates</span>
                            <div class="clearfix"></div>
                        </a>
                        <ul>
                        	<li <?php if (($_smarty_tpl->tpl_vars['pageName']->value=='builtintemplates.php')) {?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
builtintemplates.php">Built in Templates</a></li>
                            <li <?php if (($_smarty_tpl->tpl_vars['pageName']->value=='custom_templates.php')) {?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
custom_templates.php">Custom Templates</a></li>
                            <li <?php if (($_smarty_tpl->tpl_vars['pageName']->value=='createtemplates.php')) {?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
createtemplates.php">Create Custome Templates</a></li>
                        </ul>
                    </li>
					
					<li  <?php if (($_smarty_tpl->tpl_vars['pageName']->value=='list_campaigns.php'||$_smarty_tpl->tpl_vars['pageName']->value=='create_campaign.php'||$_smarty_tpl->tpl_vars['pageName']->value=='scheduled_email_queue.php')) {?> class="active" <?php }?>>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-3.png" class="img-default">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-3-h.png" class="img-over">
                            </span>
                            <span class="span-text">Campaigns</span>
                            <div class="clearfix"></div>
                        </a>
                        <ul>
                        	<li <?php if (($_smarty_tpl->tpl_vars['pageName']->value=='list_campaigns.php')) {?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
list_campaigns.php">Email Campaigns</a></li>
                            <li <?php if (($_smarty_tpl->tpl_vars['pageName']->value=='create_campaign.php')) {?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
create_campaign.php">Create Campaign</a></li>
                            <li <?php if (($_smarty_tpl->tpl_vars['pageName']->value=='scheduled_email_queue.php')) {?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
scheduled_email_queue.php">Scheduled Status</a></li>
                        </ul>
                    </li>
					
                    <li>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-4.png" class="img-default">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-4-h.png" class="img-over">
                            </span>
                            <span class="span-text">Reports</span>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['pageName']->value=='list_forms.php'||$_smarty_tpl->tpl_vars['pageName']->value=='create_form.php'||$_smarty_tpl->tpl_vars['pageName']->value=='view_form.php'||$_smarty_tpl->tpl_vars['pageName']->value=='edit_form.php'||$_smarty_tpl->tpl_vars['pageName']->value=='show_formcode.php'||$_smarty_tpl->tpl_vars['pageName']->value=='edit_arrange_customfield.php') {?> class="active" <?php }?>>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-5.png" class="img-default">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-5-h.png" class="img-over">
                            </span>
                            <span class="span-text">Website Forms</span>
                            <div class="clearfix"></div>
                        </a>
                        <ul>
                        	<li <?php if ($_smarty_tpl->tpl_vars['pageName']->value=='list_forms.php') {?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
list_forms.php">Website Forms</a></li>
                            <li <?php if ($_smarty_tpl->tpl_vars['pageName']->value=='create_form.php') {?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
create_form.php">Create New Form</a></li>
                        </ul>
                    </li>
                    <li>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-6.png" class="img-default">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-6-h.png" class="img-over">
                            </span>
                            <span class="span-text">Automation</span>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-7.png" class="img-default">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlImageBase;?>
img-menu-7-h.png" class="img-over">
                            </span>
                            <span class="span-text">Advanced</span>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                </ul>
                <a href="javascript:void(0)" class="menu-close hidden-xs"></a>
            </div><!--- sidebar-nav -->
            <div class="sidebar-menu-mobile">
            	<div class="mobile-menu-base">
                </div>
            	<a href="javascript:void(0)" class="menu-toggle">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </a>
            </div>
        </div><?php }} ?>
