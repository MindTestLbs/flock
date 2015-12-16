<?php /* Smarty version Smarty-3.1.19, created on 2015-12-15 15:20:39
         compiled from "/var/www/flock/smarty-temp/templates/contactlists.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2123825105566fe26feda893-61369544%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '365c555a63caa1867db07b977e72f22abf6b40b8' => 
    array (
      0 => '/var/www/flock/smarty-temp/templates/contactlists.tpl',
      1 => 1449722320,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2123825105566fe26feda893-61369544',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errorString' => 0,
    'url' => 0,
    'listCnt' => 0,
    'contactlsts' => 0,
    'item' => 0,
    'urlParam' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_566fe27004ceb0_40259127',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566fe27004ceb0_40259127')) {function content_566fe27004ceb0_40259127($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_stripslashes')) include '/var/www/flock/Smarty/libs/plugins/modifier.stripslashes.php';
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
                	<h2>Contact Lists</h2>
                </div><!-- commen-heading -->
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
                            <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
create_contactlist.php" class="cm-create">Create</a>
							<?php if (($_smarty_tpl->tpl_vars['listCnt']->value>0)) {?>
                            <a href="#" class="cm-delete" onClick="javascript:document.contacts.submit();">Delete</a>
							<?php }?>
                        </div><!-- cc-top -->
						<?php if (($_smarty_tpl->tpl_vars['listCnt']->value>0)) {?>
						<form name="contacts" method="post" action="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
contactlists.php">
                      	  <div class="cc-list">
                        	<ul>
							<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contactlsts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
											<li>
												<div class="row">
													<div class="col-lg-5">
														<div class="cc-item-name cc-height">
															<h5><a href="contactlist_contacts.php?list_id=<?php echo base64_encode(base64_encode($_smarty_tpl->tpl_vars['item']->value['list_id']));?>
"><?php echo smarty_modifier_stripslashes($_smarty_tpl->tpl_vars['item']->value['list_name']);?>
</a></h5>
															<p>Owner : <?php echo smarty_modifier_stripslashes($_smarty_tpl->tpl_vars['item']->value['list_owner_name']);?>
</p>
															<div class="commen-check">
																<input name="checkbox[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['list_id'];?>
"  class="cm-checkbox" /> 
															</div><!-- commen-check -->
														</div>
													</div>
													<div class="col-lg-2">
														<div class="cc-item-date  cc-height">
															<h6>CREATED DATE</h6>
															<p><?php echo $_smarty_tpl->tpl_vars['item']->value['contactlsit_created_date'];?>
</p>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="cc-item-date cc-height" style="text-align:center;">
															<h6>Total Subscribers</h6>
															<p><?php echo $_smarty_tpl->tpl_vars['item']->value['total_subscribers'];?>
</p>
														</div>
													</div>
													<div class="col-lg-3">
														<div class="cc-button-div">
															<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
contactlist_contacts.php?list_id=<?php echo base64_encode(base64_encode($_smarty_tpl->tpl_vars['item']->value['list_id']));?>
" class="bt-view"></a>
															<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
add_contact.php?list_id=<?php echo base64_encode(base64_encode($_smarty_tpl->tpl_vars['item']->value['list_id']));?>
" class="bt-send">Add Contact</a>
															<div class="visible-lg"></div>
															<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
edit_contactlist.php?list_id=<?php echo base64_encode(base64_encode($_smarty_tpl->tpl_vars['item']->value['list_id']));?>
" class="bt-edit">Edit List</a>
															<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
contactlists.php?<?php echo $_smarty_tpl->tpl_vars['urlParam']->value;?>
&action=delete&list_id=<?php echo base64_encode(base64_encode($_smarty_tpl->tpl_vars['item']->value['list_id']));?>
" onClick="return confirm('Are you sure, you want to delete this list?')" class="bt-delete"></a>
														  </div>
													</div>
												</div>
											</li>
										<?php } ?>
                            </ul>
                        </div>
						<input type="hidden" name="hidden_submit" value="1" />
						</form>
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
