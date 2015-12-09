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


<section class="login-section">
    	<div class="container">
        	<div class="row">
                <div class="col-lg-6 col-md-8 col-sm-10 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
                    <div id="login-box">
                        <h3>Login</h3>
                        <div class="login-form">
                            <form name="loginform" action="{$url->urlBase}login.php" method="post">
						
								
								{if $errorString!=''} {$errorString} {/if}
							{if $smarty.request.confirmMessage!=''}
									<span style="text-align:center; color:#FF0000; font-size:12px;">
									{$smarty.request.errmsg}
								</span>		
								{/if}
                                <div class="row">
                                    <div class="col-lg-2 col-sm-4 col-md-3 col-xs-2">
                                        <span class="ico">
                                            <img src="{$url->urlBase}img/img-username-ico.png" alt="">
                                        </span>
                                    </div>
                                    <div class="col-lg-10 col-sm-8 col-md-9 col-xs-10">
                                    	<div class="lgoin-feild-div">
                                        	<input type="text"  name="user_email" id="user_email" class="form-control login-textfeild" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-sm-4 col-md-3 col-xs-2">
                                        <span class="ico">
                                            <img src="{$url->urlBase}img/img-password-ico.png" alt="">
                                        </span>
                                    </div>
                                    <div class="col-lg-10 col-sm-8 col-md-9 col-xs-10">
                                    	<div class="lgoin-feild-div">
                                        	<input name="login_password" id="login_password" type="password" class="form-control login-textfeild" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-offset-2 col-sm-10">
                                    	<?php /*?><label class="remember">
                                        	<input type="checkbox" class="remember-me">
                                            Remember me
                                        </label><?php */?>
                                        <a href="forgot_password.php" class="forget-password"  style="cursor:pointer; color:#D05601;">Forgot Password ?</a>
                                        <input type="submit" name="login" class="login-submit" value="Login">
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                            	<div class="col-sm-6">
                                	<div class="backto-site">
                                        <img src="{$url->urlBase}img/img-text.png">
                                        <a href="{$url->urlBase}">flockmails.com</a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                	<img class="img-responsive pull-right"  src="{$url->urlBase}img/img-sm-logo.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    
    

    
    <!-- FOOTER -->
  
    {include file="footer.tpl" title="Footer and compare"}
	<!--footer-block-->
	
  
  {include file="js_index.tpl" title="Quick View"}
  

 {include file="end.tpl" title="End"}