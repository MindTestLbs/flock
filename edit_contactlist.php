<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Contact Lists";
$pageName = "edit_contactlist.php";
$smarty->assign('pageName',$pageName);

$smarty->assign('pageTitle',$pageTitle);

$list_id 							= base64_decode(base64_decode($_REQUEST['list_id']));
include('contactlist_check.php');


if(isset($_REQUEST['update']) && $_REQUEST['update']=='Submit')
{

	extract($_POST);
	$errorFlag=0;
	if(preg_replace("/^\s*$/","",$list_name)=="")
	{
		$errorFlag=1;
		$errorList[]="List Name required.";
	}
	if($errorFlag===0)
	{

		$updateInfo['list_name']								= $list_name;
		$updateInfo['list_owner_email_id']				= $list_owner_email_id;
		$updateInfo['list_owner_name']					= $list_owner_name;
		$updateInfo['list_bounce_email']					= $list_bounce_email;
		$updateInfo['list_reply_to_mailId']				= $list_reply_to_mailId;
		$updateInfo['notify_owner']							= $notify_owner;
		$updateInfo['company_name']						= $company_name;
		$updateInfo['company_address']				= $company_address;
		$updateInfo['company_phone_number']		= $company_phone_number;
				
		$list_id 							= base64_decode(base64_decode($_REQUEST['list_id']));
		$updateCondition = " list_id=?";	
		$dbClass->prepareUpdateStatement('contact_lists',$updateInfo,$updateCondition,array($list_id));
			
		//$contalist_id=$dbClass->db_insert_id();
		
		
		
		$confirmMessage = urlencode('Contact list details updated successfully');
		$qryParameters .="&confirmMessage=".$confirmMessage;
		pageRedirection('contactlists.php'.'?'.$qryParameters);
	
	}
	
}
else
{
	$_POST = $listInfo;
}


if(count($errorList)>0)
{
 	$errorString.='<div class="errorlists" style="font-weight:bold">Please fix the following errors:-</div>';
	foreach($errorList as $errorKey=>$errorValue)
	{
		$errorString.='<div class="errorlists">'.$errorValue.'</div>';
	}
}


$smarty->assign('errorString',$errorString);
$smarty->display('edit_contactlist.tpl');
?>