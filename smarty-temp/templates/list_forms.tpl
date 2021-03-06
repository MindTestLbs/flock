<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
{include file="inner_meta.tpl" title="Meta"}
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
                	<h2>Website Forms</h2>
                </div><!-- commen-hading -->
                <div class="cs-base">
					<form action="{$url->urlBase}list_forms.php" method="post" name="searchfrm" id="adminform">
					<div class="cs-filter">
                    	<div class="row">
                        	<div class="col-sm-2 col-md-1">
                            	<p>Filter</p>
                            </div>
                            <div class="col-sm-10 col-md-3">
                            	<input type="text" class="form-control commen-text-feild" name="keyword" value="{$smarty.request.keyword}" placeholder="Keyword">
                            </div>

                            <div class="col-md-12 visible-md"></div>
                            <div class="col-sm-6 col-lg-1">
                            	<input type="submit"  name="search" class="apply-bt" value="Apply">
                            </div>

                        </div>
                    </div>
					</form>
					<form action="{$url->urlBase}list_forms.php" method="post" name="webfrm" id="webfrm">
                    <div class="compaine-content">
						{if $errorString!=''} {$errorString} {/if}
					{if $smarty.request.confirmMessage!=''}
							<span style="text-align:center; color:#FF0000; font-size:12px;">
							{$smarty.request.confirmMessage}
						</span>		
						{/if}
						
                    	<div class="cc-top">
                            <a  href="create_form.php" class="cm-create">Add New</a>
							{if ( $listCnt > 0 )}
                            <a href="#" class="cm-delete" onClick="javascript:document.webfrm.submit();">Delete</a>
							{/if}
                        </div><!-- cc-top -->
						{if ( $listCnt > 0 )}
						
						<div class="cc-tbr-head">
                        	<div class="row">
                            	<div class="col-lg-5">
                                	<h5>Form Name</h5>
                                </div>
                                <div class="col-lg-2">
                                	<h5>Created Date</h5>
                                </div>
                                <div class="col-lg-2">
                                	<h5>Form Type</h5>
                                </div>
                                <div class="col-lg-3">
                                	<h5>Actions</h5>
                                </div>
                            </div>
                        </div>
						
						
						<div class="cc-tbr-div">
                        	<ul>
							{foreach $forms as $item}
                            	<li>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="tbr-first tbr-height">
											<div class="commen-check" style="float:left">
												<input name="checkbox[]" type="checkbox" value="{$item.form_id}"  class="cm-checkbox" /> 
												</div><!-- commen-check -->
                                                <h5>{$item.form_name|stripslashes}</h5>
												
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="tbr-second tbr-height">
                                                <p>{$item.form_created_date}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="tbr-second tbr-height">
                                                <p>{if $item.form_type=='s'}
															Subscription
													{elseif $item.form_type=='u'}
															Unsubscribe
													{elseif $item.form_type=='m'}
															Modify Details
															{else}
															Send to Friend
															{/if}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="tbr-button-div">
											<div class="visible-lg" style="padding-top:16px;"></div>
											<a href="{$url->urlBase}view_form.php?form_id={$item.form_id|base64_encode|base64_encode}" class="bt-view" target="_blank"></a>
											<a href="{$url->urlBase}edit_form.php?formId={$item.form_id}" class="bt-edit">Edit</a>
											<a href="{$url->urlBase}show_formcode.php?formId={$item.form_id|base64_encode|base64_encode}" class="bt-html">Get HTML</a>	
											<a href="{$url->urlBase}list_forms.php?action=delete&delid={$item.form_id|base64_encode|base64_encode}" onClick="return confirm('Are you sure, you want to delete this form?')" class="bt-delete"></a>
													
                                              </div>
                                        </div>
                                    </div>
                                </li>
                            {/foreach}  
							  
                            </ul>
                        </div>
						
						{else}
							 <div class="cc-list" style=" padding:12px 12px; text-align:center; color:#FF0000; ">
							 No form added yet!!
							 </div>
						{/if}
                    </div><!-- compaine-content -->
					<input type="hidden" name="hidden_submit" value="1" />
					</form>
					 {if $listCnt > 0}
					 <div class="pagination">
							{$pager -> showPager(1,1,1)}
					</div>     
					  {/if}	 
					
                </div><!-- cs-base -->
            </div><!-- right-panel -->
        </div>
    </section><!-- commen-base -->
	{include file="inner_js.tpl" title="Inner page js"}
	
{include file="end.tpl" title="End of the page"}