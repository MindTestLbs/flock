<div class="flock-sidebar"><!--Add to  this class "second-sidebar" to change the sidebar style -->
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
                	<!--<li>
                    	<a href="member_home.php">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-1.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-1-h.png" class="img-over">                            </span>
                            <span class="span-text">Dashboard</span>                        </a>                    </li>-->
                    <li>
                    	<a href="contactlists.php">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-2.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-2-h.png" class="img-over">                            </span>
                            <span class="span-text">Subscribers</span>                        </a>                    </li>
                    <li>
					
					<li>
                    	<a href="custom_templates.php">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-6.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-6-h.png" class="img-over">                            </span>
                            <span class="span-text">Templates</span>                        </a>                    </li>
					<li>		
                    	<a href="list_campaigns.php">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-3.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-3-h.png" class="img-over">                            </span>
                            <span class="span-text">Campaigns</span>                        </a>                    </li>
                    <li>
                    	<a href="list_campaign_stat.php">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-4.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-4-h.png" class="img-over">                            </span>
                            <span class="span-text">Reports</span>                        </a>                    </li>
                    <li>
                    	<a href="list_forms.php">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-5.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-5-h.png" class="img-over">                            </span>
                            <span class="span-text">Website Forms</span>                        </a>                    </li>
                    
                    <li>
                    	<a href="inactive_contacts.php">
                        	<span class="span-icon">
                            	<img src="{$url->urlImageBase}img-menu-7.png" class="img-default">
                                <img src="{$url->urlImageBase}img-menu-7-h.png" class="img-over">                            </span>
                            <span class="span-text">Automation</span>                        </a>                    </li>
                </ul>
            </div><!--- sidebar-nav -->
        </div>