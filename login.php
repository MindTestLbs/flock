<?php
include_once('./includes.php');

$metaDetails		= $dbClass->getTableRecordSingle('metatags',"page_name=?",array('Login'));

if(isset($_SESSION['SesUserId']))
{
	pageRedirection('member_home.php');
}

$errorFlaglog=0;
unset($errorListlog);
if(isset($_REQUEST['login']))
{
	extract($_POST);
	if(preg_replace("/^\s*$/","",$user_email)=="")
		{
			$errorFlaglog=1;
			$errorListlog[]="Email Id required.";
		}
	if(preg_replace("/^\s*$/","",$login_password)=="")
		{
			$errorFlaglog=1;
			$errorListlog[]="Password required.";
		}

	//print_r($errorListlog);
	if($errorFlaglog===0)
	{
		$paswd = getEncpasd($login_password);
		
		$userCnt 		= $dbClass->getTableRecordCount('users',"user_email=? AND user_pswd=? AND user_status=?",array(trim($user_email),$paswd,'1'));
		if($userCnt<=0)
		 {
		   $errorListlog[] =  'Login Failed. Email or Password is Incorrect';
		   $errorFlaglog = 1;
		 }
		 else
		 {
		 	$result 		= $dbClass->getTableRecordSingle('users',"user_email=? AND user_pswd=? AND user_status=?",array(trim($user_email),$paswd,'1'));
			
			$_SESSION['SesUserId'] 				=	$result['user_id'];
			if($result['user_last_logged_in']!='')
			{
				$_SESSION['user_last_login']		=	date('F d Y H:i:s',strtotime($result['user_last_logged_in']));
			}
			else
			{
			$_SESSION['user_last_login']='Never';
			}
			
			$updateInfo['user_last_logged_in']='NOW()';
			$dbClass->prepareUpdateStatement("users", $updateInfo, 'user_id=?',array($result['user_id']));
				
			
			$qryParameters="success";
			pageRedirection('member_home.php?'.$qryParameters); // Redirecting to Downloading page
			exit;
			
		 }

	}
}

if(count($errorListlog)>0)
{
 	$errorString.='<div class="errorlists" style="font-weight:bold">Please fix the following errors:-</div>';
	foreach($errorListlog as $errorKey=>$errorValue)
	{
		$errorString.='<div class="errorlists">'.$errorValue.'</div>';
	}
}


$smarty->assign('metaDetails',$metaDetails);
$smarty->assign('errorString',$errorString);

$smarty->display('login.tpl');

?>