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
                	<h2>Dashboard</h2>
                </div><!-- commen-heading -->
				{if ( $campaignExecCnt > 0 )}
					<div class="dahboard-overview">
						<div class="row">
							<div class="col-sm-4">
								<div class="chart-outer">
									<div class="ct-chart opend-chart">
										<img src="{$url->urlImageBase}img-chart-1.png" class="img-responsive">
									</div>
									<h4>Opened</h4>
									<div class="chart-count">
										<div class="row">
											<div class="col-xs-6">
												<h5>Opened</h5>
												<h3>25</h3>
											</div>
											<div class="col-xs-6">
												<h5>Bounced</h5>
												<h3>04</h3>
											</div>
										</div>
									</div><!-- chart-count -->
								</div>
							</div>
							<div class="col-sm-4">
								<div class="chart-outer">
									<div class="ct-chart unopend-chart">
										<img src="{$url->urlImageBase}img-chart-2.png" class="img-responsive">
									</div>
									<h4>UnOpened</h4>
									<div class="chart-count">
										<div class="row">
											<div class="col-xs-6">
												<h5>Opened</h5>
												<h3>25</h3>
											</div>
											<div class="col-xs-6">
												<h5>Bounced</h5>
												<h3>04</h3>
											</div>
										</div>
									</div><!-- chart-count -->
								</div>
							</div>
							<div class="col-sm-4">
								<div class="chart-outer">
									<div class="ct-chart bounced-chart">
										<img src="{$url->urlImageBase}img-chart-3.png" class="img-responsive">
									</div>
									<h4>Bounced</h4>
									<div class="chart-count">
										<div class="row">
											<div class="col-xs-6">
												<h5>Opened</h5>
												<h3>25</h3>
											</div>
											<div class="col-xs-6 highlates">
												<h5>Bounced</h5>
												<h3>04</h3>
											</div>
										</div>
									</div><!-- chart-count -->
								</div>
							</div>
						</div>
					</div><!-- dahboard-overview -->
					 <div class="dashboard-tables">
						<div class="overview-table">
							<div class="table-responsive">
								<table cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<th>Sent From</th>
										<th>Email Subject</th>
										<th>Sent date</th>
										<th>Email Campaign</th>
									</tr>
									<tr>
										<td>Email Campaign</td>
										<td>Welcome to Kochi<br> Parppidam</td>
										<td>04 August 2014 <br>01:23:10</td>
										<td>Kochiparppidam</td>
									</tr>
								</table>
							</div>
						</div><!-- overview-table -->
						<div class="cm-tables recents-div">
							<h3 class="commen-h3">Recently Created Email Campaigns</h3>
							<div class="table-responsive">
								<table width="100%" class="commen-table" cellpadding="0" cellspacing="0"> <!-- The class="commen-table" is commen, if any changes needed. pls use its unique parent div -->
									<tr>
										<th width="20%">CAMPAIGN NAME</th>
										<th width="20%">SUBJECT</th>
										<th width="20%">CREATED DATE</th>
										<th width="17%">LAST SEND</th>
										<th width="23%">ACTION</th>
									</tr>
									<tr>
										<td>Kochiparppidam</td>
										<td>Welcome to KochiParppidam</td>
										<td>02 July 2014</td>
										<td>02 July 2014</td>
										<td>
											<a href="#" class="bt-view"></a>
											<a href="#" class="bt-send">Send</a>
											<a href="#" class="bt-edit">Edit</a>
											<a href="#" class="bt-delete"></a>
										</td>
									</tr>
									<tr>
										<td>Kochiparppidam</td>
										<td>Welcome to KochiParppidam</td>
										<td>02 July 2014</td>
										<td>02 July 2014</td>
										<td>
											<a href="#" class="bt-view"></a>
											<a href="#" class="bt-send">Send</a>
											<a href="#" class="bt-edit">Edit</a>
											<a href="#" class="bt-delete"></a>
										</td>
									</tr>
									<tr>
										<td>Kochiparppidam</td>
										<td>Welcome to KochiParppidam</td>
										<td>02 July 2014</td>
										<td>02 July 2014</td>
										<td>
											<a href="#" class="bt-view"></a>
											<a href="#" class="bt-send">Send</a>
											<a href="#" class="bt-edit">Edit</a>
											<a href="#" class="bt-delete"></a>
										</td>
									</tr>
									<tr>
										<td>Kochiparppidam</td>
										<td>Welcome to KochiParppidam</td>
										<td>02 July 2014</td>
										<td>02 July 2014</td>
										<td>
											<a href="#" class="bt-view"></a>
											<a href="#" class="bt-send">Send</a>
											<a href="#" class="bt-edit">Edit</a>
											<a href="#" class="bt-delete"></a>
										</td>
									</tr>
								</table>
							</div>
							<div class="table-bt-group">
								<a href="#" class="bt-viewall">View all</a>
								<a href="#" class="bt-campaign">Create New Campaign</a>
							</div><!-- table-bt-group -->
						</div><!-- recents-div -->
						<div class="cm-tables recents-created">
							<h3 class="commen-h3">Recently Created Contact Lists</h3>
							<div class="table-responsive">
								<table width="100%" class="commen-table" cellpadding="0" cellspacing="0"> <!-- The class="commen-table" is commen, if any changes needed. pls use its unique parent div -->
									<tr>
										<th width="20%">CAMPAIGN NAME</th>
										<th width="20%">SUBJECT</th>
										<th width="20%">CREATED DATE</th>
										<th width="17%">LAST SEND</th>
										<th width="23%">ACTION</th>
									</tr>
									<tr>
										<td>Kochiparppidam</td>
										<td>Welcome to KochiParppidam</td>
										<td>02 July 2014</td>
										<td>02 July 2014</td>
										<td>
											<a href="#" class="bt-view"></a>
											<a href="#" class="bt-send">Send</a>
											<a href="#" class="bt-edit">Edit</a>
											<a href="#" class="bt-delete"></a>
										</td>
									</tr>
									<tr>
										<td>Kochiparppidam</td>
										<td>Welcome to KochiParppidam</td>
										<td>02 July 2014</td>
										<td>02 July 2014</td>
										<td>
											<a href="#" class="bt-view"></a>
											<a href="#" class="bt-send">Send</a>
											<a href="#" class="bt-edit">Edit</a>
											<a href="#" class="bt-delete"></a>
										</td>
									</tr>
									<tr>
										<td>Kochiparppidam</td>
										<td>Welcome to KochiParppidam</td>
										<td>02 July 2014</td>
										<td>02 July 2014</td>
										<td>
											<a href="#" class="bt-view"></a>
											<a href="#" class="bt-send">Send</a>
											<a href="#" class="bt-edit">Edit</a>
											<a href="#" class="bt-delete"></a>
										</td>
									</tr>
									<tr>
										<td>Kochiparppidam</td>
										<td>Welcome to KochiParppidam</td>
										<td>02 July 2014</td>
										<td>02 July 2014</td>
										<td>
											<a href="#" class="bt-view"></a>
											<a href="#" class="bt-send">Send</a>
											<a href="#" class="bt-edit">Edit</a>
											<a href="#" class="bt-delete"></a>
										</td>
									</tr>
								</table>
							</div>
							<div class="table-bt-group">
								<a href="#" class="bt-viewall">View all</a>
								<a href="#" class="bt-campaign">Create New Campaign</a>
							</div><!-- table-bt-group -->
						</div><!-- recents-created -->
					</div><!-- dashboard-tables -->
				{else}
					<div class="dsh-step-base">
                    <div class="dsh-steps">
                        <h3>Get Started in <span>3 Easy Steps.</span></h3>
                        <div class="row">
                        	<div class="col-md-4">
                            	<div class="step-block step-1">
                                	<div class="step-icon">
                                    	<span>01</span>
                                    	<img src="{$url->urlImageBase}img-step-1.png" class="img-responsive">
                                    </div>
                                    <p>Create Contact List</p>
                                </div><!-- step-block -->
                            </div>
                            <div class="col-md-4">
                            	<div class="step-block step-2">
                                	<div class="step-icon">
                                    	<span>02</span>
                                    	<img src="{$url->urlImageBase}img-step-2.png" class="img-responsive">
                                    </div>
                                    <p>Add Contacts</p>
                                </div><!-- step-block -->
                            </div>
                            <div class="col-md-4">
                            	<div class="step-block step-3">
                                	<div class="step-icon">
                                    	<span>02</span>
                                    	<img src="{$url->urlImageBase}img-step-3.png" class="img-responsive">
                                    </div>
                                    <p>Create and Send Campaign</p>
                                </div><!-- step-block -->
                            </div>
                        </div>
                        <a href="{$url->urlBase}create_contactlist.php" class="get-start">Get Start Now</a>
                    </div><!-- dsh-steps -->
                </div>
				{/if}
            </div><!-- right-panel -->
        </div>
    </section><!-- commen-base -->
	{include file="inner_js.tpl" title="Inner page js"}
	
{include file="end.tpl" title="End of the page"}