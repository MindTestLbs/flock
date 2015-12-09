<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Contact Lists";
$pageName = "create_contactlist.php";
$smarty->assign('pageName',$pageName);

$smarty->assign('pageTitle',$pageTitle);

if(isset($_REQUEST['create']) && $_REQUEST['create']=='Submit')
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
		$visible_fields=array('emailaddress','dateadded','emailformat','activitystat','confirmed');
		$insertInfo['list_name']								= $list_name;
		$insertInfo['list_owner_email_id']			= $list_owner_email_id;
		$insertInfo['list_owner_name']					= $list_owner_name;
		$insertInfo['list_bounce_email']				= $list_bounce_email;
		$insertInfo['list_reply_to_mailId']				= $list_reply_to_mailId;
		$insertInfo['notify_owner']							= $notify_owner;
		$insertInfo['visible_fields']							= addslashes(serialize($visible_fields));
		$insertInfo['company_name']					= $company_name;
		$insertInfo['company_address']				= $company_address;
		$insertInfo['company_phone_number']	= $company_phone_number;
		$insertInfo['list_user_id']							= $_SESSION['SesUserId'];
		$insertInfo['contactlsit_created_date']	='NOW()';
		
		$contalist_id=$dbClass->prepareInsertStatement("contact_lists ",$insertInfo);
		//$contalist_id=$dbClass->db_insert_id();

		
		$confirmMessage = urlencode('Contact list details added successfully');
		$qryParameters .="&confirmMessage=".$confirmMessage;
		pageRedirection('contactlists.php'.'?'.$qryParameters);
	
	}
	
}
else
{
	$_POST['list_owner_name'] =  $fullname;
	$_POST['list_owner_email_id'] = $userDet['user_email'];
	$_POST['list_bounce_email'] =  $userDet['user_email'];
	$_POST['list_reply_to_mailId'] =  $userDet['user_email'];
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
$smarty->display('create_contactlist.tpl');
?>