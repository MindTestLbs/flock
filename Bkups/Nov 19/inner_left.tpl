<div class="flock-sidebar second-sidebar"><!--Add to  this class "second-sidebar" to change the sidebar style -->
        	<div class="flock-logo">
            	<h1 class="logo">
                	<a href="{$url->urlBase}member_home.php"><img src="{$url->urlImageBase}img-logo.png" class="img-responsive"></a>
                </h1><!-- logo -->
            </div><!-- flock-logo -->
            <div class="user-overview">
            	<div class="user-thumb">
                	<a href="#"><img src="{$url->urlImageBase}img-user.png" class="img-responsive"></a>
                </div><!-- user-thumb -->
                <div class="user-information">
                	<h2>John Duke</h2>
                    <span class="user-mail">
                    	<a href="#">johnduke@gmail.com</a>
                    </span>
                    <div class="user-button-group">
                    	<a href="#" class="us-upgrade">Upgrade</a>
                        <a href="#" class="log-out">Logout</a>
                    </div><!-- user-button-group -->
                </div><!-- user-information -->
            </div><!-- user-overview -->
            <div class="sidebar-nav">
            	<ul>
					
                	<li {if ( $pageName == 'contactlists.php' ||  $pageName == 'create_contactlist.php' ||  $pageName == 'edit_contactlist.php' )} class="active" {/if}>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-1.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-1-h.png" class="img-over">
                            </span>
                            <span class="span-text">Contact Lists</span>
                        </a>
                        <ul class="second-menu">
                            <li {if ( $pageName == 'contactlists.php' )} class="active" {/if}><a href="contactlists.php">View Contactlists</a></li>
							 <li {if ( $pageName == 'create_contactlist.php' )} class="active" {/if}><a href="create_contactlist.php">Create Contactlist</a></li>
                        </ul>
                    </li>
					
					{if ( $pageName == 'contactlist_contacts.php' ||  $pageName == 'add_contact.php' ||  $pageName == 'edit_contact.php' )}
					<li class="active" >
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-6.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-6-h.png" class="img-over">
                            </span>
                            <span class="span-text">Contact Subscribers</span>
                        </a>
                        <ul class="second-menu">
                            <li {if ( $pageName == 'add_contact.php' )} class="active" {/if}><a href="add_contact.php?list_id={$smarty.request.list_id}">Add Subscriber</a></li>
							 <li {if ( $pageName == 'import_contacts.php' )} class="active" {/if}><a href="import_contacts.php?list_id={$smarty.request.list_id}">Import Contacts</a></li>
							 <li {if ( $pageName == 'export_contacts.php' )} class="active" {/if}><a href="export_contacts.php?list_id={$smarty.request.list_id}">Export Contacts</a></li>
                        </ul>
                    </li>
					{/if}
                    <li>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-2.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-2-h.png" class="img-over">
                            </span>
                            <span class="span-text">Templates</span>
                        </a>
                        <ul class="second-menu">
                            <li><a href="#">Built in Templates</a></li>
                            <li><a href="#">Create Custome Templates</a></li>
                        </ul>
                    </li>
                    <li>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-3.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-3-h.png" class="img-over">
                            </span>
                            <span class="span-text">Campaigns &amp; Send</span>
                        </a>
                        <ul class="second-menu">
                            <li><a href="#">Custome Templates</a></li>
                            <li><a href="#">Create Custome Templates</a></li>
                        </ul>
                    </li>
                    <li>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-8.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-8-h.png" class="img-over">
                            </span>
                            <span class="span-text">Templates</span>
                        </a>
                        <ul class="second-menu">
                        	<li class="active"><a href="#">Built in Templates</a></li>
                            <li><a href="#">Custome Templates</a></li>
                            <li><a href="#">Create Custome Templates</a></li>
                        </ul>
                    </li>
                    <li>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-4.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-4-h.png" class="img-over">
                            </span>
                            <span class="span-text">Reports</span>
                        </a>
                        <ul class="second-menu">
                            <li class="active"><a href="#">Built in Templates</a></li>
                            <li><a href="#">Create Custome Templates</a></li>
                        </ul>
                    </li>
                    <li>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-5.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-5-h.png" class="img-over">
                            </span>
                            <span class="span-text">Website Forms</span>
                        </a>
                        <ul class="second-menu">
                            <li class="active"><a href="#">Built in Templates</a></li>
                            <li><a href="#">Custome Templates</a></li>
                        </ul>
                    </li>
                    <li>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-6.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-6-h.png" class="img-over">
                            </span>
                            <span class="span-text">Automation</span>
                        </a>
                        <ul class="second-menu">
                            <li><a href="#">Create Custome Templates</a></li>
                        </ul>
                    </li>
                    <li>
                    	<a href="#">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-7.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-7-h.png" class="img-over">
                            </span>
                            <span class="span-text">Advanced</span>
                        </a>
                        <ul class="second-menu">
                            <li class="active"><a href="#">Built in Templates</a></li>
                        </ul>
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