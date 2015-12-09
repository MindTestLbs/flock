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
                            	<input type="text" class="form-control commen-text-feild" name="keyword" value="{$smarty.request.keyword}" placeholder="Keyword">
                            </div>

                            <div class="col-md-12 visible-md"></div>
                            <div class="col-sm-6 col-lg-1">
                            	<input type="submit"  name="search" class="apply-bt" value="Apply">
                            </div>

                        </div>
                    </div>
					</form>
                    <div class="compaine-content">
						{if $errorString!=''} {$errorString} {/if}
					{if $smarty.request.confirmMessage!=''}
							<span style="text-align:center; color:#FF0000; font-size:12px;">
							{$smarty.request.confirmMessage}
						</span>		
						{/if}
						
                    	<div class="cc-top">
                            <a  href="add_contact.php?list_id={$smarty.request.list_id}" class="cm-create">Add New</a>
							{if ( $listCnt > 0 )}
                            <a href="#" class="cm-delete" onClick="javascript:document.contacts.submit();">Delete</a>
							{/if}
                        </div><!-- cc-top -->
						{if ( $listCnt > 0 )}
						<form name="contacts" method="post" action="{$url->urlBase}contactlist_contacts.php">
                      	  <div class="cc-list">
                        	<ul>
							{foreach $contacts as $item}
											<li>
												<div class="row">
													<div class="col-lg-5">
														<div class="commen-check">
															<input name="checkbox[]" type="checkbox" value="{$item.subscriber_id}"  class="cm-checkbox" /> 
														</div><!-- commen-check -->
														<div class="cc-item-date  cc-height">
															<h6>EMAIL</h6>
															<p>{$item.email_id|stripslashes}</p>
															
														</div>
													</div>
													<div class="col-lg-2">
														<div class="cc-item-date  cc-height">
															<h6>ADDED DATE</h6>
															<p>{$item.subscriber_added_date}</p>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="cc-item-date cc-height" style="text-align:center;">
															<h6>EMAIL FORMAT</h6>
															<p>
															{if $item.email_format=='h'}
															HTML
															{else}
															Text
															{/if}
															</p>
														</div>
													</div>
													<div class="col-lg-3">
														<div class="cc-button-div">
															<div class="visible-lg"></div>
															<a href="{$url->urlBase}view_contacts.php?SubscriberId={$item.subscriber_id}&list_id={$smarty.request.list_id}" class="bt-view"></a>
															<a href="{$url->urlBase}edit_contact.php?SubscriberId={$item.subscriber_id}&list_id={$smarty.request.list_id}" class="bt-edit">Edit</a>
															<a href="{$url->urlBase}contactlist_contacts.php?action=delete&delid={$item.subscriber_id|base64_encode|base64_encode}&list_id={$smarty.request.list_id}" onClick="return confirm('Are you sure, you want to delete this list?')" class="bt-delete"></a>
														  </div>
													</div>
												</div>
											</li>
										{/foreach}
                            </ul>
                        </div>
						<input type="hidden" name="hidden_submit" value="1" />
						<input type="hidden" name="list_id" value="{$smarty.request.list_id}">
						</form>
						{else}
							 <div class="cc-list" style=" padding:12px 12px; text-align:center; color:#FF0000; ">
							 No contactlist added yet!!
							 </div>
						{/if}
                    </div><!-- compaine-content -->
					
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