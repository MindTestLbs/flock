<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Edit Website Form";
$pageName = "edit_form.php";

$smarty->assign('pageTitle',$pageTitle);
$smarty->assign('pageName',$pageName);

$contactListArr	= $dbClass->getTableRecordDetails("contact_lists","list_user_id=?",array($_SESSION['SesUserId']));
$numLists 		= $dbClass->getAffectedRows();

$formId=$_REQUEST['formId'];
$qrapp='<input type="hidden" name="formId" value="'.$_REQUEST['formId'].'">';
$formDet	= $dbClass->getTableRecordSingle("user_forms","form_id=?",array($formId));

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Submit")
{

	extract($_REQUEST);
	$errorFlag=0;
	$condition		=	"form_name =? and form_type=? AND form_id!=?";
	if(preg_replace("/^\s*$/","",trim($form_type))=="")
	{
		$errorFlag=1;
		$errorList[]="Select Form Type.";
	}
	if(preg_replace("/^\s*$/","",trim($form_name))=="")
	{
		$errorFlag=1;
		$errorList[]="Form Name is required.";
	}
	elseif($dbClass->checkEntryExist("user_forms",$condition,array(trim($form_name),trim($form_type),$formId)))
	{
		$errorFlag=1;
		$errorList[]="Form Name already exists.";
	}
		
	if($form_type!='f')
	{
		if(count($contctarr)<=0)
		{
			$errorFlag=1;
			$errorList[]="Please Select Contact List.";
		}
	}
	if($errorFlag===0)
	{
		$updateInfo['form_name']			= $form_name;
		$updateInfo['form_type']			= $form_type;
		$updateInfo['require_confirm']		= $require_confirm;
		$updateInfo['send_thankyoumail']	= $send_thankyoumail;
		$updateInfo['email_new_contacts']	= $email_new_contacts;
		$updateInfo['design_color']			= $design_color;
		$updateInfo['letter_color']			= $letter_color;
		$updateInfo['use_captcha']			= $use_captcha;
		$updateInfo['form_format']			= $form_format;
		
		$dbClass->prepareUpdateStatement("user_forms", $updateInfo, 'form_id=?',array($formId));
		
		
		if(count($contctarr)>0)
		{
			$dbClass->prepareDeleteStatement('form_lists',"form_id=?",array($formId));
			
			for($i=0;$i<count($contctarr);$i++)
			{
				$insertList['list_id']	= $contctarr[$i];
				$insertList['form_id']	= $formId;
				
				$insertID=$dbClass->prepareInsertStatement("form_lists",$insertList);
			}
		}
		$qryapp="formId=".$formId;
		$customur='';
		if(count($customarr)>0)
		{
			for($k=0;$k<count($customarr);$k++)
			{
				$customur.=$customarr[$k]."@123";
			}
			$cusotmencoded=base64_encode(base64_encode($customur));
		}
		if($cusotmencoded!='')
		{
			$qryapp.='&customValues='.$cusotmencoded;
		}
		if($form_type=='s' || $form_type=='m' || $form_type=='u')
		{
			pageRedirection($url->urlBase.'edit_arrange_customfield.php?'.$qryapp);
			exit;
		}
		elseif($form_type=='f')
		{
			pageRedirection($url->urlBase.'form_editthanku.php?'.$qryapp);
			exit;
		}

		
	
	}
	
}
else
{
	$_REQUEST['form_type']				= $formDet['form_type'];
	$_REQUEST['form_name']				= $formDet['form_name'];
	$_REQUEST['require_confirm'] 		= $formDet['require_confirm'];
	$_REQUEST['send_thankyoumail']		= $formDet['send_thankyoumail'];
	$_REQUEST['email_new_contacts']		= $formDet['email_new_contacts'];
	$_REQUEST['design_color']			= $formDet['design_color'];
	$_REQUEST['letter_color']			= $formDet['letter_color'];
	$_REQUEST['form_format']			= $formDet['form_format'];
	$_REQUEST['use_captcha']			= $formDet['use_captcha'];

	$contactLists	= $dbClass->getTableRecordDetails("form_lists","form_id=?",array($formId));
	foreach($contactLists as $selListKey=>$selListVal)
	{
		$contctarr[]	=	$selListVal['list_id'];
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

$smarty->assign('errorString',$errorString);
$smarty->assign('numLists',$numLists);
$smarty->assign('contactListArr',$contactListArr);
$smarty->assign('errorString',$errorString);
$smarty->assign('contctarr',$contctarr);

$smarty->display('edit_form.tpl');
?>