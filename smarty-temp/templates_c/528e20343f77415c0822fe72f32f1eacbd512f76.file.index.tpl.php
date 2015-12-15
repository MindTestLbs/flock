<?php /* Smarty version Smarty-3.1.19, created on 2015-12-15 10:35:45
         compiled from "/var/www/flock/smarty-temp/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1968742317566f9fa9432826-27143609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '528e20343f77415c0822fe72f32f1eacbd512f76' => 
    array (
      0 => '/var/www/flock/smarty-temp/templates/index.tpl',
      1 => 1449727984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1968742317566f9fa9432826-27143609',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'metaDetails' => 0,
    'url' => 0,
    'packageCnt' => 0,
    'packages' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_566f9fa98487b4_98999617',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566f9fa98487b4_98999617')) {function content_566f9fa98487b4_98999617($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_stripslashes')) include '/var/www/flock/Smarty/libs/plugins/modifier.stripslashes.php';
?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
		<title><?php echo $_smarty_tpl->tpl_vars['metaDetails']->value['page_title'];?>
</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/bootstrap.min.css">

        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/bootstrap-theme.min.css">
        
        
        <!-- Owl Carousel Assets -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/owl.carousel.css" rel="stylesheet">
        
        <!-- dont use -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/owl.theme.css" rel="stylesheet">
        <!-- dont use -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/owl.transitions.css" rel="stylesheet">
        
		<!-- fancy box -->
		<link href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/jquery.fancybox.css" rel="stylesheet" >
		
		<link href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
css/main.css" rel="stylesheet" >
        <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		
		
		
		<script type="text/javascript">
		var a = Math.ceil(Math.random() * 10);
		var b = Math.ceil(Math.random() * 10);
		var c = a + b;
		
		
		
		function DrawBotBoot()
		{
		document.write("<a>What is "+ a + " + " + b +" ? </a>");
		document.write("<input id='BotBootInput'  name='BotBootInput'  type='text' class='form-control space'  />");
		}
		
		
		function ValidBotBoot(){
		var d = document.getElementById('BotBootInput').value;
		if (d == c)
		{
			document.getElementById('botvalue').value=d;
			return true;
		}
		else
		{
		alert('Wrong secutiry code');
		return false
		}
		}
	
	function ValidateForm()
	{
		if(document.contactfrm.fullname.value=="")
		  {
		   alert("Enter yout name");
		   return false;
		  }
		 else  if(document.contactfrm.email.value=="")
		  {
		   alert("Enter the email");
		   return false;
		  }
		  else if (echeck(document.contactfrm.email.value)==false)
		  {
				return false
			} 
		 else  if(document.contactfrm.comments.value=="")
		  {
		   alert("Enter the comment");
		   return false;
		  }
		else if(document.contactfrm.BotBootInput.value=="")
		  {
		   alert("Enter the security code");
		   return false;
		  }
		  else if (ValidBotBoot()==false)
		  {
			return false;
		  }
		  else
		  {
			return true;
		  }
	}
	
	
	
	/// email validation function.
		function echeck(str) {
	
			var at="@"
			var dot="."
			var lat=str.indexOf(at)
			var lstr=str.length
			var ldot=str.indexOf(dot)
			if (str.indexOf(at)==-1){
			   alert("Invalid E-mail ID")
			   return false
			}
	
			if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
			   alert("Invalid E-mail ID")
			   return false
			}
	
			if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
				alert("Invalid E-mail ID")
				return false
			}
	
			 if (str.indexOf(at,(lat+1))!=-1){
				alert("Invalid E-mail ID")
				return false
			 }
	
			 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
				alert("Invalid E-mail ID")
				return false
			 }
	
			 if (str.indexOf(dot,(lat+2))==-1){
				alert("Invalid E-mail ID")
				return false
			 }
			
			 if (str.indexOf(" ")!=-1){
				alert("Invalid E-mail ID")
				return false
			 }
	
			 return true					
		}
		
	</script>	
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="top-line"></div>
  
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand logo" href="#top-section"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/logo.png" class="img-responsive" alt="logo"></a>
        </div>
        <div class="navbar-collapse collapse">
        <div class="nave-main">
          <ul>
		  	<li class="active"><a href=""> HOME </a></li>
          	<li><a href="#Section-1"> FEATURES </a></li>
            <li><a href="#Section-2">GALLERY</a></li>
            <li><a href="#Section-3">PRICING</a></li>
            <li><a href="#Section-4">ABOUT</a></li>
            <li><a href="#foot-sec">Contact</a></li>
          </ul>
          
		  
		  <a href="register.php" class="signup">Sign Up </a>
          <a href="login.php" class="login">Login</a>
		  
           
		  
          </div>
          
        </div><!--/.navbar-collapse -->
      
    </div>
    
    
     <header id="top-section">
			
            <div class="slide-bg">
            	<div class="slide-bg-main">
                	<div class="container">
                    	<div class="row">
                            <div class="col-sm-6 ">
                                <div class="slide-left">
                                    <h2>The <span>Best</span></h2>
                                    <h1> EMAIL MARKETING <span>TOOL</span></h1>
                                    <h3>Marketing made easy, sending mails easier!</h3>
                                    <a>Easily import/export contacts</a>
                                    <a>Build re-usable template</a>
                                    <a>Real time delivery</a>
                                </div><!-- slide-left -->
                            </div><!-- col-sm-6 -->
                    
                            <div class="col-sm-5 pull-right ">
                                <div class="slide-right">
                                    <a>Start off your journey with <span>Flock Mails!</span></a>
									<form name="getstform" method="post" action="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
register.php">
                                    <input type="submit" name="getstarted" value="Get Started Now" class="get-started">
									</form>
                                    <p>Be a part of our <span>650,000</span> happy Flock Mail users</p>
                                </div><!-- slide-right -->
                            </div><!-- col-sm-5 -->
                        </div>
                        <div class="row">
                            <div class="col-sm-8 col-xs-offset-2">
                                <div id="slide">
                                    <div id="owl-slide" class="owl-carousel owl-theme">
                                      <div class="item"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/1.jpg"></div>
                                      <div class="item"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/2.jpg"></div>
                                      <div class="item"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/3.jpg"></div>
                                      <div class="item"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/4.jpg"></div>
                                      <div class="item"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/5.jpg"></div>
                                      <div class="item"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/6.jpg"></div>
                                      <div class="item"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/7.jpg"></div>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                    </div>
                    <div class="clearfix"></div>
                </div><!-- slide-bg-main -->
            </div><!-- slide-bg -->
            
     </header><!-- header -->

        <!--  SECTION-1 -->  
    <section id="Section-1">
		<div class="content-col">
        	<h2>Features</h2>
            <h3>Create newsletters & email campaigns with ease</h3>
            <p>An e-mail marketing software, Flock Mails was designed to help you put your business back on track.</p>
            
            <div class="tab-main">
            	<!-- the tabs -->
                <ul class="tabs responsive">
                    <li><a href="#" class="img-foc1"><span>Create and send great looking emails</span></a></li>
                    <li><a href="#" class="img-foc2"><span>Generate different types of Forms</span></a></li>
                    <li><a href="#" class="img-foc3"><span>Private Label Email Delivery</span></a></li>
                    <li><a href="#" class="img-foc4"><span>Statistics with interactive charts</span></a></li>
                </ul>
                 
                <!-- tab "panes" -->
                <div class="panes">
                    <div>
                    	<div class="item">
							<div class="tb-slide1">
								<div class="col-sm-5 col-xs-offset-7">
									<h3>Create and send great looking emails</h3>
									<p>
										It doesn't take long to send the mail you want! With Flock Mails, be ready to send effective marketing mails within a matter of munitues, thanks to our in-built professional templates that cater to all your business needs. The easy to use FckEditor allows you to check and preview your content while modifying it to look better, other features like autoresponders help you cater to a greater niche of people.
									</p>
								</div><!-- col-sm-5 col-xs-offset-7 -->
							</div><!-- tb-slide1 -->
						  </div>
                    </div>
                    <div>
						<div class="item">
							<div class="tb-slide1">
								<div class="col-sm-5 col-xs-offset-7">
									<h3>Generate different types of Forms</h3>
									<p>
										You would need to generate forms when you run your campaign and Flock Mails come to the rescue here too. Our Forms have all the necessary features including Subscribe and Unsubscribe buttons, so that you could reach across to potential customers without sounding intrusive. More, all email contacts are registered automatically on the Flock Mail contact lists - to help you manage things better!
									</p>
								</div><!-- col-sm-5 col-xs-offset-7 -->
							</div><!-- tb-slide1 -->
						  </div>
							  
						</div>
                    <div>
						<div class="item">
							<div class="tb-slide1">
								<div class="col-sm-5 col-xs-offset-7">
									<h3>Private Label Email Delivery</h3>
									<p>
										Well, as a business you are definitely trying to promote your own brand and no others'! This is why our emails will have your brand logo sent along with it and nothing else. Don't worry, no links, pictures or logos outside your wish will be allowed in the mails you send.
									</p>
								</div><!-- col-sm-5 col-xs-offset-7 -->
							</div><!-- tb-slide1 -->
						  </div>
					</div>
                    <div>
						<div class="item">
							<div class="tb-slide1">
								<div class="col-sm-5 col-xs-offset-7">
									<h3>Statistics with interactive charts</h3>
									<p>
										Understanding the customers' needs is one of the first benchmarks to success. Our analytics include complete analyzing, tracking and reporting which gives you an insight into things like none before. Get to know what worked and what didn't and understand how you could do better! Customer behaviour goes a long way to know how successful a product would be, after all! 
									</p>
								</div><!-- col-sm-5 col-xs-offset-7 -->
							</div><!-- tb-slide1 -->
						  </div>
					</div>
                </div>
                <div class="clearfix"></div>
            </div><!-- tab-main -->
        </div><!-- content-col -->
    </section>
    <!-- Section-1 -->
    
    <!-- / SECTION-1 -->

        
    <!-- SECTION-2 -->
    <section id="Section-2">
    	<div class="content-co2">
    		<h2>Gallery</h2>
    		<h3>Beautiful Email Templates</h3>
    		<p>Professionally Designed Email Templates from Flock Mails Team, great looking email templates!</p>
			<div class="overlaybase">
    			<div class="gallery owl-carousel">
    			<div class="galery-item">
    				<div class="col-xs-2">
    					<div class="gla-thumb">
    						<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t1.png" rel="gallery-1" class="img-th">
                            	<div class="hover">
                                	<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom">
                                </div><!-- hover -->
                                <div class="thumb">
                                	<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t1.png" class="img-responsive" alt="1">
                                </div>
    						</a>   						
						</div><!-- gla-thumb -->
    				</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t2.png" class="img-th" rel="gallery-1">
								<div class="hover">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom">
								</div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t2.png" class="img-responsive" alt="1">
								</div>
							</a>							
						</div><!-- gla-thumb -->
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">					
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t3.png" class="img-th" rel="gallery-1">
								<div class="hover">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom">
								</div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t3.png" class="img-responsive" alt="1">
								</div>
							</a>							
						</div><!-- gla-thumb -->  
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">  
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t4.png" class="img-th" rel="gallery-1">
								<div class="hover">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom">
								</div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t4.png" class="img-responsive" alt="1">
								</div>
							</a>							
						<!-- gla-thumb -->					
						</div><!-- col-xs-2 -->
					</div>
					<div class="col-xs-2">
						<div class="gla-thumb">
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t5.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t5.png" class="img-responsive" alt="1">
								</div>

							</a>							
						</div><!-- gla-thumb -->

					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">				
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t6.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t6.png" class="img-responsive" alt="1">
								</div>
							</a>							
						</div><!-- gla-thumb -->
    
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">					
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t7.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t7.png" class="img-responsive" alt="1">
								</div>
							</a>							
						</div><!-- gla-thumb -->
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">					
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t8.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t8.png" class="img-responsive" alt="1">
								</div>
							</a>							
						</div><!-- gla-thumb -->
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">				
							<a href="#" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t9.png" class="img-responsive" alt="1">
								</div>
							</a>					
						</div><!-- gla-thumb -->
					
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">				
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t10.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t10.png" class="img-responsive" alt="1">
								</div>
							</a>							
						</div><!-- gla-thumb -->
					
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">					
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t11.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t11.png" class="img-responsive" alt="1">
								</div>
							</a>
						</div><!-- gla-thumb -->
					
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">					
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t12.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t12.png" class="img-responsive" alt="1">
								</div>
							</a>
						</div><!-- gla-thumb -->
					</div><!-- col-xs-2 -->
   
    
					<div class="clearfix"></div> 
				</div>
				<div class="galery-item">
    				<div class="col-xs-2">
    					<div class="gla-thumb">
    						<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t1.png" class="img-th" rel="gallery-1">
                            	<div class="hover">
                                	<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom">
                                </div><!-- hover -->
                                <div class="thumb">
                                	<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t1.png" class="img-responsive" alt="1">
                                </div>
    						</a>   						
						</div><!-- gla-thumb -->
    				</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t2.png" class="img-th" rel="gallery-1">
								<div class="hover">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom">
								</div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t2.png" class="img-responsive" alt="1">
								</div>
							</a>
						</div><!-- gla-thumb -->
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">					
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t3.png" class="img-th" rel="gallery-1">
								<div class="hover">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom">
								</div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t3.png" class="img-responsive" alt="1">
								</div>
							</a>
						</div><!-- gla-thumb -->  
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">  
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t4.png" class="img-th" rel="gallery-1">
								<div class="hover">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom">
								</div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t4.png" class="img-responsive" alt="1">
								</div>
							</a>
						<!-- gla-thumb -->					
						</div><!-- col-xs-2 -->
					</div>
					<div class="col-xs-2">
						<div class="gla-thumb">
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t5.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t5.png" class="img-responsive" alt="1">
								</div>
							</a>
						</div><!-- gla-thumb -->

					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">
					
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t6.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t6.png" class="img-responsive" alt="1">
								</div>
							</a>
							
						</div><!-- gla-thumb -->
    
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">
					
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t7.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t7.png" class="img-responsive" alt="1">
								</div>
							</a>
							
						</div><!-- gla-thumb -->
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">
					
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t8.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t8.png" class="img-responsive" alt="1">
								</div>
							</a>
						</div><!-- gla-thumb -->
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">
					
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t9.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t9.png" class="img-responsive" alt="1">
								</div>
							</a>
							
						</div><!-- gla-thumb -->
					
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">
					
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t10.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t10.png" class="img-responsive" alt="1">
								</div>
							</a>
							
						</div><!-- gla-thumb -->
					
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">
					
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t11.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t11.png" class="img-responsive" alt="1">
								</div>
							</a>
						</div><!-- gla-thumb -->
					
					</div><!-- col-xs-2 -->
					<div class="col-xs-2">
						<div class="gla-thumb">
						
							<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t12.png" class="img-th" rel="gallery-1">
								<div class="hover"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/zoom.png" class=" img-responsive" alt="zoom"></div><!-- hover -->
								<div class="thumb">
									<img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/gallery-t12.png" class="img-responsive" alt="1">
								</div>
							</a>
						</div><!-- gla-thumb -->
					</div><!-- col-xs-2 -->
   
    
					<div class="clearfix"></div> 
				</div>
			</div><!-- gallery -->
			<span class="overlay"></span>
    		</div>
    
    <!--<div class="gallery">
    
		<div class="clearfix"></div>
    </div> gallery -->
    <div class="gallery-ft">
    <p>Customize one of our designer email templates or create your own email design from scratch.</p>
    <button class="view-all">View All Templates</button>
    </div><!-- gallery-ft -->
    
    </div><!-- content-co2 -->
    </section> 
    <!-- / SECTION-2 -->
    
        <!-- SECTION-3 -->
<section id="Section-3">
		<div class="pricing-bg">
        	<h2>Pricing</h2>
            <h3>Affordable Email Marketing... for Every One</h3>
            <p>Whether you're a frequent sender or just starting out, we offer a range of options that suit the way you send.</p>
            <div class="pr-table">
            	<div class="container">
                    <div class="row">
                      <?php if (($_smarty_tpl->tpl_vars['packageCnt']->value>0)) {?>
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['packages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                       	 <div class="col-md-3 col-sm-6">
                            <div class="price">
                                <div class="price-top">
                                    
                                    <div class="range"><sub>$</sub><?php echo smarty_modifier_stripslashes($_smarty_tpl->tpl_vars['item']->value['package_amount']);?>
  <sup>/mo</sup></div><!-- range -->
                                   
                                </div><!-- price-top -->
                                    <h4><?php echo smarty_modifier_stripslashes($_smarty_tpl->tpl_vars['item']->value['package_name']);?>
</h4>
                                    <ul>
                                        <li class="li-first">
                                            up to <span><?php echo smarty_modifier_stripslashes($_smarty_tpl->tpl_vars['item']->value['max_no_of_subscribers']);?>
</span> subscribers<br>
                                            for <span><?php echo smarty_modifier_stripslashes($_smarty_tpl->tpl_vars['item']->value['total_no_of_days']);?>
</span>  days 
											
											<?php if ($_smarty_tpl->tpl_vars['item']->value['no_of_emails']>=100000) {?>
											Unlimited
											<?php } else { ?>
											<?php echo smarty_modifier_stripslashes($_smarty_tpl->tpl_vars['item']->value['no_of_emails']);?>

											<?php }?>
											 Mails 
                                        </li>
                                        <li>No Setup fee</li>
                                        <li>Free Newsletter Templates</li>
                                        <li>User Friendly Interface</li>
                                        <li>Tracking and Reporting</li>
                                    </ul>
									<form name="getstform<?php echo smarty_modifier_stripslashes($_smarty_tpl->tpl_vars['item']->value['package_setting_id']);?>
" method="post" action="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
register.php">
                                    <input type="submit" name="started" value="Get Started" class="started">
									</form>
                            </div><!-- price -->
                        </div>
						
						<?php } ?>
						<?php }?>


						
                    </div>
                </div>
            </div><!-- pr-table -->
        </div><!-- pricing-bg -->
    </section>
    <!-- / SECTION-3 -->
    
          <!-- SECTION-4 -->
    <section id="Section-4">
		<div class="content-co2">
        	<h2>About</h2>
            <h3>Flock Mails</h3>
            <p>As a bulk email marketing software, Flock Mails changes exactly this notion</p>
            <div class="container">
            <div class="row">
                    <div class="col-sm-7 col-xs-offset-4">
                        <p>
                            An e-mail marketing software, Flock Mails was designed to help you put your business back on track. Flock Mails doesn't just help you in carrying out email marketing campaigns but also give you the edge you need. It's simple actually. People are fed up receiving unsolicited emails in their inboxes and rarely check emails which they find are not appealing to them.
                        </p>
                        <p>
                        As a bulk email marketing software, Flock Mails changes exactly this notion. Be it the easy to use interface, the amazing tracking features available or the sophisticated nuances required in a comprehensive email marketing program, 
        Flock Mails has it all. Let the Marketing campaign begin!
                        </p>
                    </div><!-- col-sm-8 -->
                </div>
            </div>
        </div><!-- content-co2 -->
        
        <div class="green">
        	<div class="container">
            	<div class="row">
                    <div class="col-sm-12">
                        <div id="slide3">
                            <div id="owl-slide3" class="owl-carousel owl-theme">
                     
                              <div class="item">
                                <div class="col-sm-3 col-xs-offset-1">
                                    <div class="testi-img">
                                        
                                    </div><!-- testi-img -->
                                    <div class="testi-img-in">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/test2.png" class="img-responsive" alt="testi1">
                                    </div><!-- testi-img-in -->
                                </div><!-- col-sm-3 -->
                                
                                <div class="col-sm-8">
                                    <h3>Trusted by over 100,000 happy customers</h3>
                                    <div class="test-bg">
                                        <p>
                                           Flockmails provided a way to reach out to new customers and old ones without tarnishing the prestige of our brand.....
                                        </p>
                                        <h5>Clint Stover</h5>
                                    </div><!-- test-bg -->
                                </div><!-- col-sm-8 -->
                              </div>
                              
                              <div class="item">
                                <div class="col-sm-3 col-xs-offset-1">
                                    <div class="testi-img">
                                        
                                    </div><!-- testi-img -->
                                    <div class="testi-img-in">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/test1.png" class="img-responsive" alt="testi1">
                                    </div><!-- testi-img-in -->
                                </div><!-- col-sm-3 -->
                                
                                <div class="col-sm-8">
                                    <h3>Trusted by over 100,000 happy customers</h3>
                                    <div class="test-bg">
                                        <p>
                                            I have been using Flockmails for a few months now and am completely satisfied with your service! It's very user friendly and my email campaigns have been very successful.....
                                        </p>
                                        <h5>Andrea Marley</h5>
                                    </div><!-- test-bg -->
                                </div><!-- col-sm-8 -->
                              </div>
							  
							  
							  <div class="item">
                                <div class="col-sm-3 col-xs-offset-1">
                                    <div class="testi-img">
                                        
                                    </div><!-- testi-img -->
                                    <div class="testi-img-in">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/test2.png" class="img-responsive" alt="testi1">
                                    </div><!-- testi-img-in -->
                                </div><!-- col-sm-3 -->
                                
                                <div class="col-sm-8">
                                    <h3>Trusted by over 100,000 happy customers</h3>
                                    <div class="test-bg">
                                        <p>
                                          Flockmails have performed beyond our expectations. They held our hands as true partner in our email newsletter business. .......
                                        </p>
                                        <h5>Stephen Amell</h5>
                                    </div><!-- test-bg -->
                                </div><!-- col-sm-8 -->
                              </div>
							  
							  
							  <div class="item">
                                <div class="col-sm-3 col-xs-offset-1">
                                    <div class="testi-img">
                                        
                                    </div><!-- testi-img -->
                                    <div class="testi-img-in">
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/test3.png" class="img-responsive" alt="testi1">
                                    </div><!-- testi-img-in -->
                                </div><!-- col-sm-3 -->
                                
                                <div class="col-sm-8">
                                    <h3>Trusted by over 100,000 happy customers</h3>
                                    <div class="test-bg">
                                        <p>
                                           I have had great success with Flockmails! The email campaigns elicited such a great response in no time. The people at Flockmails are highly responsive and nice to work with.....
                                        </p>
                                        <h5>Thelma Cruse</h5>
                                    </div><!-- test-bg -->
                                </div><!-- col-sm-8 -->
                              </div>
                         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- green -->
    </section> 
    <!-- / SECTION-4 -->
    
    
    

    
    <!-- FOOTER -->
    <footer id="foot-sec">
		<form name="contactfrm" method="post" action="" onSubmit="return ValidateForm();">
		<div class="content-co2">
        	<h2>Contact Us</h2>
            <h3>Want to learn more about Smart Marketing?</h3>
            <p>Fill out the short form below to get in touch with the Flockmails team.</p>
            <div class="container">
            	<div class="row">
                    <div class="col-sm-6">
                        
                          <div class="form-group">
                            <input type="text" class="form-control"  name="fullname" placeholder="Name *">
                          </div>
                          <div class="form-group">
                        
                            <input type="text" class="form-control"  name="email" placeholder="Email Address *">
                          </div>
                          <div class="form-group">
                        
                            <input type="text" class="form-control" name="phone" placeholder="Telephone Number">
                          </div>
                       
                    </div><!-- col-sm-6 -->
                    <div class="col-sm-6">
                        
                          <div class="form-group">
                            <script type="text/javascript">DrawBotBoot()</script> 
							<input type="hidden" name="botvalue" id="botvalue" value="">  
                          </div>
                          
                          <textarea class="form-control" name="comments" rows="5">Message *</textarea>
                        
                    </div><!-- col-sm-6 -->
                </div>
            </div>
            <div class="btn-contact">
					<input type="hidden" name="sendcontact" value="1">
				  <input type="submit"  name="submitcontact" class="view-all"  value="SUBMIT Your Message"/>
            </div>
            
        </div><!-- content-co2 -->
		</form>
        <div class="fot-col">
        	<div class="container">
            	<div class="row">
                    <div class="col-sm-6 con-left">
                        <div class="ft-logo"><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/ft-logo.png" alt="ft-logo"></div>
                            <div class="address">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/address-icon.png" width="71" height="71" alt="address">
                                <h4 class="col-xs-offset-1">Contact Info</h4>
                                <p class="col-xs-offset-1">
                                    Mindlabs Systems Pvt. Ltd. <br>
                                    7/453 Z, III Floor, Trans Square Building ,<br>
                                    Mavelipuram, Kakkanad, Cochin, Kerala, India PIN : 682030
                                </p>
                            </div><!-- address -->
                        
                        <div class="address2">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/call-icon.png" width="71" height="71" alt="call">
                            <h4 class="col-xs-offset-2">Connect Us</h4>
                            <p class="col-xs-offset-2">We like to hear from you</p>
                            <p class="col-xs-offset-5"><strong>+91-484-6532355</strong></p>
                            <p class="col-xs-offset-5"><strong>+91-484-6455799</strong></p>
                        </div><!-- address2 -->
                        <div class="address2">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
img/mail-icon.png" width="71" height="71" alt="call">
                            <h4 class="col-xs-offset-2">E- Mail Us</h4>
                            <p class="col-xs-offset-2">Send us a mail</p>
                            <p class="col-xs-offset-5"><strong>info@mindlabs-systems.com</strong></p>
                        </div><!-- address2 -->
                    </div><!-- col-sm-6 -->
                    <div class="col-sm-6 map">
                        <div class="map-canvas">
                              <div class="conovlay"></div>
                              <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=+&amp;q=mindlabs&amp;ie=UTF8&amp;hq=mindlabs&amp;hnear=Ernakulam,+Kerala&amp;ll=10.021533,76.343509&amp;spn=0.091788,0.169086&amp;t=m&amp;z=13&amp;iwloc=A&amp;cid=1260946913123483233&amp;output=embed"></iframe>
                              </div>
                    </div><!-- col-sm-6 -->
                </div>
            </div>
        </div><!-- fot-col -->
        <div class=" ft-bottom">
        	<div class="container">
                <a>  Copyright 2007-2013 flockmails.com. All Rights Reserved.</a>
                <div class="social">
                    <a href="#" class="fb"></a>
                    <a href="#" class="twe"></a>
                    <a href="#" class="g-p"></a>
                    <a href="#" class="in"></a>
                </div>
            </div>
        </div>
    </footer>
	<a href="javascript:void(0)" class="scroll-top"></a>
	<!-- / FOOTER -->


    	
    

    	
        <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/vendor/jquery-1.11.0.min.js"></script>

        <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/vendor/bootstrap.min.js"></script>

        
       
        
        <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/owl.carousel.min.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/jquery.tools.min.js"></script>
 		<script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/jquery.fancybox.js"></script>
		 <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/jquery.uniform.js"></script>
		
 		<script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/homemain.js"></script>
		<script src="<?php echo $_smarty_tpl->tpl_vars['url']->value->urlBase;?>
js/plugins.js"></script>
       
    </body>
</html><?php }} ?>
