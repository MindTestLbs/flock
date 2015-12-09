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
    	{include file="inner_left.tpl" title="Dashboard Left"}
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
                            <a href="{$url->urlBase}create_contactlist.php" class="cm-create">Create</a>
							{if ( $listCnt > 0 )}
                            <a href="#" class="cm-delete" onClick="javascript:document.contacts.submit();">Delete</a>
							{/if}
                        </div><!-- cc-top -->
						{if ( $listCnt > 0 )}
						<form name="contacts" method="post" action="{$url->urlBase}contactlists.php">
                      	  <div class="cc-list">
                        	<ul>
							{foreach $contactlsts as $item}
											<li>
												<div class="row">
													<div class="col-lg-5">
														<div class="cc-item-name cc-height">
															<h5><a href="contactlist_contacts.php?list_id={$item.list_id|base64_encode|base64_encode}">{$item.list_name|stripslashes}</a></h5>
															<p>Owner : {$item.list_owner_name|stripslashes}</p>
															<div class="commen-check">
																<input name="checkbox[]" type="checkbox" value="{$item.list_id}"  class="cm-checkbox" /> 
															</div><!-- commen-check -->
														</div>
													</div>
													<div class="col-lg-2">
														<div class="cc-item-date  cc-height">
															<h6>CREATED DATE</h6>
															<p>{$item.contactlsit_created_date}</p>
														</div>
													</div>
													<div class="col-lg-2">
														<div class="cc-item-date cc-height" style="text-align:center;">
															<h6>Total Subscribers</h6>
															<p>{$item.total_subscribers}</p>
														</div>
													</div>
													<div class="col-lg-3">
														<div class="cc-button-div">
															<a href="{$url->urlBase}contactlist_contacts.php?list_id={$item.list_id|base64_encode|base64_encode}" class="bt-view"></a>
															<a href="{$url->urlBase}add_contact1.php?list_id={$item.list_id|base64_encode|base64_encode}" class="bt-send">Add Contact</a>
															<div class="visible-lg"></div>
															<a href="{$url->urlBase}edit_contactlist.php?list_id={$item.list_id|base64_encode|base64_encode}" class="bt-edit">Edit List</a>
															<a href="{$url->urlBase}contactlists.php?{$urlParam}&action=delete&list_id={$item.list_id|base64_encode|base64_encode}" onClick="return confirm('Are you sure, you want to delete this list?')" class="bt-delete"></a>
														  </div>
													</div>
												</div>
											</li>
										{/foreach}
                            </ul>
                        </div>
						<input type="hidden" name="hidden_submit" value="1" />
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