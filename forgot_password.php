<?php
include_once('./includes.php');

$metaDetails		= $dbClass->getTableRecordSingle('metatags',"page_name=?",array('Login'));

include('class.phpmailer.php');
$mail 					= new phpmailer();

$pageTitle = 'Forgot Password';
$user_email=$_REQUEST['user_email'];
if(isset($_REQUEST['Retrieve']))
{
	if(!eregi('^([-!#$%&\'*+./0-9=?A-Z^_`a-z{|}~])+@([-!#$%&\'*+/0-9=?A-Z^_`a-z{|}~]+\\.)+[a-zA-Z]{2,6}$',$user_email))
	{
		$general->pageRedirection("forgot_password.php?err=2");	
		exit;
	}
	else
	{	
		extract($_POST);
		 $CustomerQry="select *  from users where user_email='".$user_email."'";
		$CustomerInfo  	  = $dbClass->selectQry($CustomerQry);
		if(count($CustomerInfo)>0)
		{
			$name=$CustomerInfo[0]['user_firstname']." ".$CustomerInfo[0]['user_lastname'];
			$username=$CustomerInfo[0]['user_name'];
			$password = $general->getDecreptPsd($CustomerInfo[0]['user_pswd']);
		
			
			$send_to_name=$name;
			$send_to_email=$user_email;
			
			$fromEmail  = "no-reply@flockmails.com"; 
			
			$mail->From     			= $fromEmail;
			$mail->FromName 		= "Flock Mails Team";
			$mail->Subject     		= "Flock Mails Login details";
			
			$message  	 ='<table width="100%" border="0">';
			$message  	.='<tr><td colspan="3">Hi '.$name.',</td></tr>';
			$message  	.='<tr><td colspan="3">&nbsp;&nbsp;&nbsp;The login details for flockmails.com is given below.</td></tr>';
			$message  	.='<tr><td colspan="3">&nbsp;</td></tr>';
			$message  	.='<tr><td width="20%">Username</td><td width="2%">:</td><td>'.$user_email.'</td></tr>';
			$message  	.='<tr><td width="20%">Password</td><td width="2%">:</td><td>'.$password.'</td></tr>';
			$message  	.='<tr><td colspan="3"><br />Regards<br /><b>Flock Mails Team</b></td></tr>';
			$message  	.='</table>';
		

			$mail->Mailer   = "mail";
			
			$mail->Body    = $message;
			$mail->AltBody = $message;
			$mail->AddAddress($send_to_email, $send_to_name);
			$mail->Send();
			$mail->ClearAddresses();
			
			$general->pageRedirection("forgot_password.php?success=1");	
			exit;
		}
		else
		{
			$general->pageRedirection("forgot_password.php?err=1");	
			exit;
		}
	}
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $configDetails['SITE_TITLE'];?> <?php echo $page_title;?></title>
        <meta name="keywords" content="<?php echo $metainfo['meta_tags'];?>" />
		<meta name="description" content="<?php echo $metainfo['meta_desc'];?>" />
		
        <link rel="stylesheet" href="<?php echo $configDetails['secure_siteUrl'];?>css/bootstrap.min.css">

        <link rel="stylesheet" href="<?php echo $configDetails['secure_siteUrl'];?>css/bootstrap-theme.min.css">
        
        
        <!-- Owl Carousel Assets -->
        <link href="<?php echo $configDetails['secure_siteUrl'];?>css/owl.carousel.css" rel="stylesheet">
        
        <!-- dont use -->
        <link href="<?php echo $configDetails['secure_siteUrl'];?>css/owl.theme.css" rel="stylesheet">
        <!-- dont use -->
        <link href="<?php echo $configDetails['secure_siteUrl'];?>css/owl.transitions.css" rel="stylesheet">
        
		<!-- fancy box -->
		<link href="<?php echo $configDetails['secure_siteUrl'];?>css/jquery.fancybox.css" rel="stylesheet" >
		
        <link href="<?php echo $configDetails['secure_siteUrl'];?>css/uniform.default.css" rel="stylesheet" >
		<link href="<?php echo $configDetails['secure_siteUrl'];?>css/main.css" rel="stylesheet" >
        <script src="<?php echo $configDetails['secure_siteUrl'];?>js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		
		
		<script language="javascript">

	function validate()
	{
		var mailre=/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	
		function trimString (str)
		{
			while (str.charAt(0) == ' ')
			str = str.substring(1);
			while (str.charAt(str.length - 1) == ' ')
			str = str.substring(0, str.length - 1);
			return str;
		}	
		if(trimString(document.getElementById('user_email').value) == "")
		{
			document.getElementById('user_email').focus();
			alert("Enter your e-mail id");
			return false;
		}
		
		if(!document.getElementById('user_email').value.match(mailre))
		{
			document.getElementById('user_email').focus();
			alert("Please Enter valid e-mail id");
			return false;
		}
		return true;
	}

</script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <?php include('header.php');?>
    
    
    <section class="login-section">
    	<div class="container">
        	<div class="row">
                <div class="col-lg-6 col-md-8 col-sm-10 col-sm-offset-1 col-md-offset-2 col-lg-offset-3">
                    <div id="login-box">
                        <h3>Forgot Password?</h3>
                        <div class="login-form">
						<form action="<?php echo $configDetails['secure_siteUrl'];?>forgot_password.php" method="post"  name="frm" onSubmit="return validate();">

							<?php if(isset($_GET['success']) and ($_GET['success']==1)){ ?>
							<div  style="text-align:center; color:#FF0000;"><strong>Note :</strong> Your retrieved password has been sent to your inbox</div>
							<?php } else if(isset($_GET['err']) and ($_GET['err']==1)) { ?>
							<div  style="text-align:center; color:#FF0000;"><strong>Note :</strong> Sorry Your e-mail id was not found. Please try again</div>
							<?php } elseif(isset($_GET['err']) and ($_GET['err']==2)) { ?>
							<div  style="text-align:center; color:#FF0000;"><strong>Note :</strong> Please Enter Valid e-mail id </div>
							<?php } else{?>
							<div  style="text-align:center; color:#000000;"><strong>Note :</strong> Please enter email address which you have provided at the time of registration</div>
							<?php } ?>
                                <div class="row">
                                    <div class="col-lg-2 col-sm-4 col-md-3 col-xs-2">
                                        <span class="ico">
                                            <img src="<?php echo $configDetails['secure_siteUrl'];?>img/img-username-ico.png" alt="">
                                        </span>
                                    </div>
                                    <div class="col-lg-10 col-sm-8 col-md-9 col-xs-10">
                                    	<div class="lgoin-feild-div">
                                        	<input type="text"  name="user_email" id="user_email" class="form-control login-textfeild" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                	<div class="col-sm-offset-2 col-sm-10">
                                    	<?php /*?><label class="remember">
                                        	<input type="checkbox" class="remember-me">
                                            Remember me
                                        </label><?php */?>
                                        <a href="<?php echo $configDetails['secure_siteUrl'];?>login.php" class="forget-password"  style="cursor:pointer; color:#D05601;">Back to Login</a>
                                        <input type="submit" name="Retrieve" class="login-submit" value="Retrieve">
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                            	<div class="col-sm-6">
                                	<div class="backto-site">
                                        <img src="<?php echo $configDetails['secure_siteUrl'];?>img/img-text.png">
                                        <a href="<?php echo $configDetails['secure_siteUrl'];?>">flockmails.com</a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                	<img class="img-responsive pull-right"  src="<?php echo $configDetails['secure_siteUrl'];?>img/img-sm-logo.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
  <?php include('footer.php');?>
    
    

    </body>
</html>
