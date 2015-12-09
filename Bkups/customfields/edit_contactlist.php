<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Contact Lists";
$pageName = "edit_contactlist.php";
$smarty->assign('pageName',$pageName);

$smarty->assign('pageTitle',$pageTitle);

$list_id 							= base64_decode(base64_decode($_REQUEST['list_id']));
$listInfo 							= $dbClass->getTableRecordSingle("contact_lists","list_id=?",array($list_id));
$contactCustoms 			= $dbClass->getTableRecordDetails("customfield_contact","list_id=?",array($list_id));
$list_user_id					= $listInfo['list_user_id'];
if($list_user_id!=$_SESSION['SesUserId'])
{
	$confirmMessage = urlencode('You do not have the permission to edit the selected list');
	$qryParameters .="&confirmMessage=".$confirmMessage;
	pageRedirection('contactlists.php'.'?'.$qryParameters);
}


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
		
		$deleteCondition = "list_id=?";
		$dbClass->prepareDeleteStatement('customfield_contact',$deleteCondition,array($list_id));
		
		for($h=0;$h<count($custom_fields);$h++)
		{
			$inserInfo['custom_field_id']	=	$custom_fields[$h];
			$inserInfo['list_id']	=	$list_id;
			$inserInfo['user_id']			=	$_SESSION['SesUserId'];
			$insertID=$dbClass->prepareInsertStatement("customfield_contact ",$inserInfo);
		}
		
		
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

$contactCustomArr = array();
if(count($contactCustoms)>0)
{
	foreach($contactCustoms as $value)
	{
		$contactCustomArr[] = $value['custom_field_id'];
	}
}

$customFieldArray		= $homeObj->getCustFieldforauser($_SESSION['SesUserId']);

$smarty->assign('customCnt',$customFieldArray['customCnt']);
$smarty->assign('customFields',$customFieldArray['customFields']);
$smarty->assign('contactCustomArr',$contactCustomArr);
$smarty->assign('errorString',$errorString);
$smarty->display('edit_contactlist.tpl');
?>