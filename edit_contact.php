<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Edit Subscriber";
$pageName = "edit_contact.php";
$smarty->assign('pageName',$pageName);
$smarty->assign('pageTitle',$pageTitle);

$list_id 							= base64_decode(base64_decode($_REQUEST['list_id']));
include('contactlist_check.php');

$SubscriberId				= $_REQUEST['SubscriberId'];
$subscriberInfo 				= $dbClass->getTableRecordSingle("contact_subscribers","subscriber_id=?",array($SubscriberId));

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Submit')
{
	extract($_POST);
	$errorFlag=0;
	if(preg_replace("/^\s*$/","",$email_id)=="")
	{
		$errorFlag=1;
		$errorList[]="Email Id required.";
	}
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,11})$", $email_id))
		{
			$errorFlag=1;
			$errorList[]="Email address is invalid.";
		}

	if($errorFlag===0)
	{
		$updateInfo['email_id']					= $email_id;
		$updateInfo['email_format']				= $email_format;
		$updateInfo['firstname']			= $firstname;
		$updateInfo['lastname']				= $lastname;
		$updateInfo['confirmation_status']		= $confirmation_status;
		if($confirmation_status==1)
		{
			$updateInfo['unsubscribed'] 	= 0;
		}
		
		$SubscriberId 							=$_REQUEST['SubscriberId'];
		$updateCondition = " subscriber_id=?";	
		$dbClass->prepareUpdateStatement('contact_subscribers',$updateInfo,$updateCondition,array($SubscriberId));
		
		
		$confirmMessage = urlencode('Contact details updated successfully');
		$qryParameters .="&confirmMessage=".$confirmMessage;
		pageRedirection('contactlist_contacts.php'.'?list_id='.$_REQUEST['list_id'].'&'.$qryParameters);	
	}
	
}
else
{
	$_POST = $subscriberInfo;
}


if(count($errorList)>0)
{
 	$errorString.='<div class="errorlists" style="font-weight:bold">Please fix the following errors:-</div>';
	foreach($errorList as $errorKey=>$errorValue)
	{
		$errorString.='<div class="errorlists">'.$errorValue.'</div>';
	}
}

$smarty->assign('list_name',$list_name);
$smarty->assign('errorString',$errorString);
$smarty->display('edit_contact.tpl');



?>