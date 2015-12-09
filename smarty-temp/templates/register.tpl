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
    	<div class="reg-info">
        	<h3>Start off your journey with Flock Mails!</h3>
            <p>We know that it takes a lot to reach out to people. Be it ads or promotions, reaching out to potential customers can cost a lot. Why not make it easier with the help of Flock Mails, that has everything you need and more? Come, be a part of our 650,000 happy Flock Mail users who have shaved off any marketing challenges with our software. Do enter your details below and the form of payment and you will gain access to one of the most powerful email marketing software ever created - that too without any long term commitments!
            </p>
        </div>
        <div class="row registration">
        	<div class="col-sm-5 col-sm-offset-1">
            	<img src="{$url->urlBase}img/img-reg.jpg" class="img-responsive" alt="">
            </div>
			<form name="registerfrm" method="post" action="">
			
            <div class="col-sm-6">
				{if $errorString!=''} {$errorString} {/if}
					{if $smarty.request.confirmMessage!=''}
							<span style="text-align:center; color:#FF0000; font-size:12px;">
							{$smarty.request.confirmMessage}
						</span>		
						{/if}
            	<ul>
                	<li>
                    	<input type="text" class="form-control" name="user_firstname" value="{$smarty.post.user_firstname}" placeholder="First Name *">
                    </li>
                    <li>
                    	<input type="text" class="form-control" name="user_lastname" value="{$smarty.post.user_lastname}" placeholder="Last Name *">
                    </li>
                    <li>
                    	<input type="text" class="form-control" name="user_email" value="{$smarty.post.user_email}" placeholder="Email">
                    </li>
					
					<li>
                    	<input type="password" class="form-control" name="user_pswd" value="{$smarty.post.user_pswd}" placeholder="Password *">
                    </li>
                    <li>
                    	<input type="password" class="form-control" name="user_conf_pswd" placeholder="Confirm Password *">
                    </li>
                    
                    <li>
                    	<div class="flockmail-terms">
                        	<label><input type="checkbox" name="agree_chk" value="1">I agree to Flock Mails <span>Terms</span> and <span>Conditions</span></label>
                            <p>For no. of subscribers greater than 100000, please contact our  <a href="{$url->urlBase}index.php#foot-sec">customer care</a></p>
                        </div>
                    </li>
                    <li>
                    	<input name="login" type="submit" class="view-all" value="Sign Up">
                    </li>
                </ul>
            </div>
			</form>
        </div>
    </div>
</section> 
    
    

    
    <!-- FOOTER -->
  
    {include file="footer.tpl" title="Footer and compare"}
	<!--footer-block-->
	
  
  {include file="js_index.tpl" title="Quick View"}
  

 {include file="end.tpl" title="End"}