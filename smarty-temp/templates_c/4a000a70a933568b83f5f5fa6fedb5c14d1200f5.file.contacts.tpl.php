<?php /* Smarty version Smarty-3.1.19, created on 2015-12-10 13:28:57
         compiled from "/var/www/flock/smarty-temp/templates/contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:697636135566930c1693b02-05533936%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a000a70a933568b83f5f5fa6fedb5c14d1200f5' => 
    array (
      0 => '/var/www/flock/smarty-temp/templates/contacts.tpl',
      1 => 1449722320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '697636135566930c1693b02-05533936',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorString' => 0,
    'listCnt' => 0,
    'contacts' => 0,
    'item' => 0,
    'url' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_566930c17133c7_40080694',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566930c17133c7_40080694')) {function content_566930c17133c7_40080694($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_stripslashes')) include '/var/www/flock/Smarty/libs/plugins/modifier.stripslashes.php';
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
                	<h2>Contact Subscribers</h2>
                </div><!-- commen-hading -->
                <div class="cs-base">
					<form action="" method="post" name="searchfrm" id="adminform">
					<div class="cs-filter">
                    	<div class="row">
                        	<div class="col-sm-2 col-md-1">
                            	<p>Filter</p>
                            </div>
                            <div class="col-sm-10 col-md-3">
                            	<input type="text" class="form-control commen-text-feild" name="keyword" value="<?php echo $_REQUEST['keyword'];?>
" placeholder="Keyword">
                            </div>

                            <div class="col-md-12 visible-md"></div>
                            <div class="col-sm-6 col-lg-1">
                            	<input type="submit"  name="search" class="apply-bt" value="Apply">
                            </div>

                        </div>
                    </div>
					</form>
                    <div class="compaine-content">
						<?php if ($_smarty_tpl->tpl_vars['errorString']->value!='') {?> <?php echo $_smarty_tpl->tpl_vars['errorString']->value;?>
 <?php }?>
					<?php if ($_REQUEST['confirmMessage']!='') {?>
							<span style="text-align:center; color:#FF0000; font-size:12px;">
							<?php echo $_REQUEST['confirmMessage'];?>

						</span>		
						<?php }?>
						
                    	<div class="cc-top">
                            <a  href="add_contact.php?list_id=<?php echo $_REQUEST['list_id'];?>
" class="cm-create">Add New</a>
							<?php if (($_smarty_tpl->tpl_vars['listCnt']->value>0)) {?>
                            <a href="#" class="cm-delete" onClick="javascript:document.contacts.submit();">Delete</a>
							<?php }?>
                        </div><!-- cc-top -->
						<?php if (($_smarty_tpl->tpl_vars['listCnt']->value>0)) {?>
						
						<div class="cc-tbr-head">
                        	<div class="row">
                            	<div class="col-lg-5">
                                	<h5>Email Address</h5>
                                </div>
                                <div class="col-lg-2">
                                	<h5>Added DATE</h5>
                                </div>
                                <div class="col-lg-2">
                                	<h5>Email Format</h5>
                                </div>
                                <div class="col-lg-3">
                                	<h5>Actions</h5>
                                </div>
                            </div>
                        </div>
						
						
						<div class="cc-tbr-div">
                        	<ul>
							<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            	<li>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="tbr-first tbr-height">
                                                <h5><?php echo smarty_modifier_stripslashes($_smarty_tpl->tpl_vars['item']->value['email_id']);?>
</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="tbr-second tbr-height">
                                                <p><?php echo $_smarty_tpl->tpl_vars['item']->value['subscriber_added_date'];?>
</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="tbr-second tbr-height">
                                                <p><?php if ($_smarty_tpl->tpl_vars['item']->value['email_format']=='h') {?>
															HTML
															<?php } else { ?>
															Text
															<?php }?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="tbr-button-div">
											<div class="visible-lg" style="padding-top:6px;"></div>
											<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
edit_contact.php?SubscriberId=<?php echo $_smarty_tpl->tpl_vars['item']->value['subscriber_id'];?>
&list_id=<?php echo $_REQUEST['list_id'];?>
" class="bt-edit">Edit</a>
												
											<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
contactlist_contacts.php?action=delete&delid=<?php echo base64_encode(base64_encode($_smarty_tpl->tpl_vars['item']->value['subscriber_id']));?>
&list_id=<?php echo $_REQUEST['list_id'];?>
" onClick="return confirm('Are you sure, you want to delete this list?')" class="bt-delete"></a>
													
                                              </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>  
							  
                            </ul>
                        </div>
						
						<?php } else { ?>
							 <div class="cc-list" style=" padding:12px 12px; text-align:center; color:#FF0000; ">
							 No contactlist added yet!!
							 </div>
						<?php }?>
                    </div><!-- compaine-content -->
					
					 <?php if ($_smarty_tpl->tpl_vars['listCnt']->value>0) {?>
					 <div class="pagination">
							<?php echo $_smarty_tpl->tpl_vars['pager']->value->showPager(1,1,1);?>

					</div>     
					  <?php }?>	 
					
                </div><!-- cs-base -->
            </div><!-- right-panel -->
        </div>
    </section><!-- commen-base -->
	<?php echo $_smarty_tpl->getSubTemplate ("inner_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Inner page js"), 0);?>

	
<?php echo $_smarty_tpl->getSubTemplate ("end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"End of the page"), 0);?>
<?php }} ?>
