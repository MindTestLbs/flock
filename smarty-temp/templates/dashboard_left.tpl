<div class="flock-sidebar second-sidebar"><!--Add to  this class "second-sidebar" to change the sidebar style -->
        	<div class="flock-logo">
            	<h1 class="logo">
                	<a href="{$url->urlBase}member_home.php"><img src="{$url->urlImageBase}img-logo.png" class="img-responsive"></a>
                </h1><!-- logo -->
            </div><!-- flock-logo -->
            <div class="user-overview">
            	<div class="user-thumb">
                	<a href="#"><img src="{$url->urlBase}profileimages/thumb/{$profile_image}" class="img-responsive"></a>
                </div><!-- user-thumb -->
                <div class="user-information">
                	<h2>{$fullname}</h2>
                    <span class="user-mail">
                    	<a href="{$url->urlBase}myprofile.php">{$user_email}</a>
                    </span>
                    <div class="user-button-group">
                    	<a href="{$url->urlBase}upgrade.php" class="us-upgrade">Upgrade</a>
                        <a href="{$url->urlBase}logout.php" class="log-out">Logout</a>
                    </div><!-- user-button-group -->
                </div><!-- user-information -->
            </div><!-- user-overview -->
            <div class="sidebar-nav">
            	<ul>
                	<li  {if ( $pageName == 'member_home.php'  )} class="active" {/if}>
                    	<a href="{$url->urlBase}member_home.php">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-1.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-1-h.png" class="img-over">
                            </span>
                            <span class="span-text">Dashboard</span>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li  {if ( $pageName == 'contactlists.php' ||  $pageName == 'create_contactlist.php' ||  $pageName == 'edit_contactlist.php' )} class="active" {/if}>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-2.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-2-h.png" class="img-over">
                            </span>
                            <span class="span-text">Subscribers</span>
                            <div class="clearfix"></div>
                        </a>
                        <ul>
                        	<li class="active"><a href="{$url->urlBase}contactlists.php">Contactlists</a></li>
                            <li><a href="{$url->urlBase}create_contactlist.php">Create Contactlist</a></li>
							{if ($pageName == 'contactlist_contacts.php' ||  $pageName == 'add_contact.php' ||  $pageName == 'edit_contact.php' )}
                            <li {if ( $pageName == 'contactlist_contacts.php' )} class="active" {/if}><a href="{$url->urlBase}contactlist_contacts.php?list_id={$smarty.request.list_id}">Contact Subscribers</a></li>
							 <li {if ( $pageName == 'add_contact.php' )} class="active" {/if}><a href="{$url->urlBase}add_contact.php?list_id={$smarty.request.list_id}">Add Subscriber</a></li>
							 <li {if ( $pageName == 'import_contacts.php' )} class="active" {/if}><a href="{$url->urlBase}import_contacts.php?list_id={$smarty.request.list_id}">Import Contacts</a></li>
							 <li {if ( $pageName == 'export_contacts.php' )} class="active" {/if}><a href="{$url->urlBase}export_contacts.php?list_id={$smarty.request.list_id}">Export Contacts</a></li>
							{/if}
                        </ul>
                    </li>
                      <li  {if ( $pageName == 'builtintemplates.php' ||  $pageName == 'custom_templates.php' ||  $pageName == 'createtemplates.php' )} class="active" {/if}>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-3.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-3-h.png" class="img-over">
                            </span>
                            <span class="span-text">Templates</span>
                            <div class="clearfix"></div>
                        </a>
                        <ul>
                        	<li {if ( $pageName == 'builtintemplates.php' )} class="active" {/if}><a href="{$url->urlBase}builtintemplates.php">Built in Templates</a></li>
                            <li {if ( $pageName == 'custom_templates.php' )} class="active" {/if}><a href="{$url->urlBase}custom_templates.php">Custom Templates</a></li>
                            <li {if ( $pageName == 'createtemplates.php' )} class="active" {/if}><a href="{$url->urlBase}createtemplates.php">Create Custome Templates</a></li>
                        </ul>
                    </li>
					
					<li  {if ( $pageName == 'list_campaigns.php' ||  $pageName == 'create_campaign.php' ||  $pageName == 'scheduled_email_queue.php' )} class="active" {/if}>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-3.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-3-h.png" class="img-over">
                            </span>
                            <span class="span-text">Campaigns</span>
                            <div class="clearfix"></div>
                        </a>
                        <ul>
                        	<li {if ( $pageName == 'list_campaigns.php' )} class="active" {/if}><a href="{$url->urlBase}list_campaigns.php">Email Campaigns</a></li>
                            <li {if ( $pageName == 'create_campaign.php' )} class="active" {/if}><a href="{$url->urlBase}create_campaign.php">Create Campaign</a></li>
                            <li {if ( $pageName == 'scheduled_email_queue.php' )} class="active" {/if}><a href="{$url->urlBase}scheduled_email_queue.php">Scheduled Status</a></li>
                        </ul>
                    </li>
					
                    <li>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-4.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-4-h.png" class="img-over">
                            </span>
                            <span class="span-text">Reports</span>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-5.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-5-h.png" class="img-over">
                            </span>
                            <span class="span-text">Website Forms</span>
                            <div class="clearfix"></div>
                        </a>
                        <ul>
                        	<li class="active"><a href="#">Built in Templates</a></li>
                            <li><a href="#">Custome Templates</a></li>
                            <li><a href="#">Create Custome Templates</a></li>
                        </ul>
                    </li>
                    <li>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-6.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-6-h.png" class="img-over">
                            </span>
                            <span class="span-text">Automation</span>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-7.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-7-h.png" class="img-over">
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
        </div>