<?php /* Smarty version Smarty-3.1.19, created on 2015-12-15 15:45:52
         compiled from "/var/www/flock/smarty-temp/templates/edit_arrange_customfield.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1751701463566fe858544763-40135314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09f037be126a8bfdfce9e5e6ca19446e1af00855' => 
    array (
      0 => '/var/www/flock/smarty-temp/templates/edit_arrange_customfield.tpl',
      1 => 1450165401,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1751701463566fe858544763-40135314',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'errorString' => 0,
    'formDet' => 0,
    'sort_order' => 0,
    'qrapp' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_566fe8585ca7e7_01967583',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566fe8585ca7e7_01967583')) {function content_566fe8585ca7e7_01967583($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<?php echo $_smarty_tpl->getSubTemplate ("inner_meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Meta"), 0);?>

<style type="text/css">
		#sortable-list				{ padding:0; }
		li.sortme 		 			{ padding:1px 1px; padding-left:10px;  cursor:move; list-style:none; width:250px; margin:10px 0;  }
	</style>
 <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/vendor/jquery-1.11.1.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/moo1.2.js"></script>

<script type="text/javascript">
	/* when the DOM is ready */
	window.addEvent('domready', function() {
		/* create sortables */
		var sb = new Sortables('sortable-list', {
			/* set options */
			clone:true,
			revert: true,
			/* initialization stuff here */
			initialize: function() { 
				
			},
			/* once an item is selected */
			onStart: function(el) { 
				//el.setStyle('background','#add8e6');
			},
			/* when a drag is complete */
			onComplete: function(el) {
				el.setStyle('background','#ddd');
				//build a string of the order
				var sort_order = '';
				$$('#sortable-list li').each(function(li) { sort_order = sort_order +  li.get('alt')  + '|'; });
				$('sort_order').value = sort_order;
				
				//autosubmit if the checkbox says to
				if($('auto_submit').checked) {
					//do an ajax request
					var req = new Request({
						url:'/dw-content/sort-save.php',
						method:'post',
						autoCancel:true,
						data:'sort_order=' + sort_order + '&ajax=' + $('auto_submit').checked + '&do_submit=1&byajax=1',
						onRequest: function() {
							$('message-box').set('text','Updating the sort order in the database.');
						},
						onSuccess: function() {
							$('message-box').set('text','Database has been updated.');
						}
					}).send();
				}
			}
		});
	});

function insCustom()
{
	var nowval=document.getElementById('mycustom').value;
	alert(nowval);
	document.getElementById('dispcustom').value=document.getElementById('dispcustom').value+'<li class="sortme" alt="2">Article 2</li>';
}
	</script>
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
                	<h2>Update a Website Form</h2>
                </div><!-- commen-heading -->
				<form name="createformfrm" id="createformfrm" method="post" action="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
edit_arrange_customfield.php">
                <div class="send-email-base">
					<?php if ($_smarty_tpl->tpl_vars['errorString']->value!='') {?> <?php echo $_smarty_tpl->tpl_vars['errorString']->value;?>
 <?php }?>
                	<p>Arrage fields for email campaign. You can drag a field inside the box and can change position of display of these custom fields in the form.</p>
                    <h3 class="commen-h3">Arrage Campaign Email Fields</h3>
                    <div class="sd-form-1">
                    	<div class="row">
                        	<div class="col-md-6">
                            	<label class="form-label">Email Campaign Format</label>
                                <div class="cm-sl-mode">
								<div style=" width:350px; height:auto; overflow:scroll;border:1px solid #e7e6e6;">
									<ul id="sortable-list">
											<li class="sortme" alt="e" >Email Address</li>
											<li class="sortme" alt="n">Name</li>
											<?php if ($_smarty_tpl->tpl_vars['formDet']->value['form_format']=='c') {?>
												<li class="sortme" alt="c">Contact Format</li>
											<?php }?>
										</ul>
									<br />
									<input type="hidden" name="sort_order" id="sort_order" value="<?php echo $_smarty_tpl->tpl_vars['sort_order']->value;?>
" /><?php echo $_smarty_tpl->tpl_vars['qrapp']->value;?>

								</div>
							  
                                </div><!-- cm-sl-mode -->
                               
                            </div>
                            
                            
                            
                            
							
                        </div>
                    </div><!-- sd-form-1-->
                
					
					
                    <div class="button-panel">
                    	<input type="submit" class="cm-submit" name="submit" value="Submit">
                    </div><!-- button-panel -->
                </div><!-- send-email-base -->
				</form>
            </div><!-- right-panel -->
        </div>
		
    </section><!-- commen-base -->
	

 <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/jquery.matchHeight-min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/chartist.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/easyResponsiveTabs.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/jquery.fs.selecter.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/jquery.uniform.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/jquery.smallipop.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/jquery.mCustomScrollbar.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/jquery.formvalidator.js"></script>
<link href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlAssetsBase;?>
css/validation-style.css?upd=1.5" type="text/css" rel="stylesheet"/>

    <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/jquery.fancybox.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/main.js"></script>
   
<?php echo $_smarty_tpl->getSubTemplate ("end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"End of the page"), 0);?>
<?php }} ?>
