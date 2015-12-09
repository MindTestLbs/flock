<?php
include_once('./includes.php');


$metaDetails		= $dbClass->getTableRecordSingle('metatags',"page_name=?",array('Sign Up'));

if(isset($_SESSION['SesUserId']))
{
	pageRedirection('member_home.php');
}

if(isset($_REQUEST['login']) && $_REQUEST['login']=='Sign Up')
{
	extract($_POST);
	$errorFlag=0;
	
	$conditionEmail="user_email=?";
	$conditionValues[] = trim(stripslashes($user_email));
	
	if(preg_replace("/^\s*$/","",$user_firstname)=="")
	{
		$errorFlag=1;
		$errorList[]="First Name required.";
	}
	if(preg_replace("/^\s*$/","",$user_lastname)=="")
		{
			$errorFlag=1;
			$errorList[]="Last Name required.";
		}
	if(preg_replace("/^\s*$/","",$user_email)=="")
		{
			$errorFlag=1;
			$errorList[]="Email required.";
		}
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,11})$", $user_email))
		{
			$errorFlag=1;
			$errorList[]="Email address is invalid.";
		}
		
		elseif($dbClass->checkEntryExist('users',$conditionEmail,$conditionValues))
		{
			$errorFlag=1;
			$errorList[]="Email Already Exist.";			
		}
		if(preg_replace("/^\s*$/","",$user_pswd)=="")
		{
			$errorFlag=1;
			$errorList[]="Password required.";
		}
		if(preg_replace("/^\s*$/","",$user_conf_pswd)=="")
		{
			$errorFlag=1;
			$errorList[]="Confirm Password required.";
		}
		if($user_pswd!=$user_conf_pswd)
		{
			$errorFlag=1;
			$errorList[]="Password  and  confirm password are not matching.";
		}
	if(isset($agree_chk) && $agree_chk==1)
	{
	}else
	{
		$errorFlaglog=1;
		$errorList[]="Please agree to the terms and conditions.";
	}
	
	if($errorFlag===0)
	{
		$pswd =getEncpasd($user_pswd);
		 $insertInfo['user_firstname']			= $user_firstname;
		 $insertInfo['user_lastname']			= $user_lastname;
		 $insertInfo['user_pswd']				= $pswd;
		 $insertInfo['user_email']				= $user_email;
		 $insertInfo['user_status']				= 0;
		 $insertInfo['user_payment_Status']		= 0;
		 $insertInfo['user_created_date']		= 'NOW()';
		// $insertInfo['user_package_id']			= $user_package_id;

		 $userId = $dbClass->prepareInsertStatement('users',$insertInfo);
		 
		 
		 $headers 	 = "From:Flock Mails<no-reply@flockmails.com>\n";
		$headers    .= 'MIME-Version: 1.0' . "\r\n";
		$headers    .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers 	.= 'Cc: info@mind-labs.com' . "\r\n";

		
		$body =  "Flock Mails New registration - Before Payment";
		$body .= "<br />";
		$body .= "<br />";
		$body .=  "Name : ".$user_firstname." ".$user_lastname."<br />";
		$body .= "<br />";
		$body .=  "Email : ".$user_email."<br />";
		$body .= "<br />";

	
		
		@mail("info@flockmails.com","Flock Mails New registration - Before Payment",$body,$headers); 
		@mail("pravin@mind-labs.com","Flock Mails New registration - Before Payment",$body,$headers); 
		 
		 if(isset($userId))
		 {
		 	pageRedirection('select_package.php?userId='.base64_encode($userId));
		 }
		 
	
	}

}


if(count($errorList)>0)
{
 	$errorString.='<div class="errorlists" style="font-weight:bold">Please fix the following errors:-</div>';
	foreach($errorList as $errorKey=>$errorValue)
	{
		$errorString.='<div class="errorlists">'.$errorValue.'</div>';
	}
}

$smarty->assign('metaDetails',$metaDetails);
$smarty->assign('errorString',$errorString);

$smarty->display('register.tpl');
?>