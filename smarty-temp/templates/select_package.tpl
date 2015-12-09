<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        {include file="meta.tpl" title="Meta"}
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		 {include file="header.tpl" title="Header"} 

    

<section class="pageHeader">
	<div class="container">
    	<h1>Sign Up</h1>
    </div>
</section>  

<section class="inner-content">
	<div class="container">
    	<div class="getting-started">
        	<h3>Getting started with Flock Mails is easy!</h3>
            <p>Sign up today and see why over 650,000 users across the globe choose Flock Mails as their email marketing solution. Just complete the form enter the payment details and submit . you'll gain complete access to Flock Mails with - no long term commitment or strings attached.
            </p>
        </div>
        <div class="flockmail-reg">
        	<h2>Flock Mails Registration-Select Package</h2>
            
            <div class="row">
			
			
				{if ( $packageCnt > 0 )}
						{foreach $packages as $item}
                        <div class="col-md-3 col-sm-6">
                            <div class="price">
                                <div class="price-top">
                                    
                                    <div class="range"><sub>$</sub>{$item.package_amount|stripslashes}  <sup>/mo</sup></div><!-- range -->
                                   
                                </div><!-- price-top -->
                                    <h4>{$item.package_name|stripslashes}</h4>
                                    <ul>
                                        <li class="li-first">
                                            up to <span>{$item.max_no_of_subscribers|stripslashes}</span> subscribers<br>
                                            for <span>{$item.total_no_of_days|stripslashes}</span>  days 
											
											{if $item.no_of_emails>=100000}
											Unlimited
											{else}
											{$item.no_of_emails|stripslashes}
											{/if}
											 Mails 
                                        </li>
                                        <li>No Setup fee</li>
                                        <li>Free Newsletter Templates</li>
                                        <li>User Friendly Interface</li>
                                        <li>Tracking and Reporting</li>
                                    </ul>
									<form name="getstform{$item.package_id|stripslashes}" method="post" action="{$url->urlBase}register_payment.php?userId={$smarty.request.userId}&packageId={$item.package_setting_id|stripslashes}">
									
                                    <input type="submit" name="started" value="Select Package" class="started">
									</form>
                            </div><!-- price -->
                        </div><!-- col-sm-3 -->
                    {/foreach}
						{/if}
        
                    </div>
        </div>
    </div>
</section> 
    
    

    
    <!-- FOOTER -->
  
    {include file="footer.tpl" title="Footer and compare"}
	<!--footer-block-->
	
  
  {include file="js_index.tpl" title="Quick View"}
  

 {include file="end.tpl" title="End"}