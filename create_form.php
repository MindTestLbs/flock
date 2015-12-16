<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Create New Website Form";
$pageName = "create_form.php";

$smarty->assign('pageTitle',$pageTitle);
$smarty->assign('pageName',$pageName);

$contactListArr	= $dbClass->getTableRecordDetails("contact_lists","list_user_id=?",array($_SESSION['SesUserId']));
$numLists 		= $dbClass->getAffectedRows();

if(isset($_REQUEST['create']) && $_REQUEST['create']=="Submit")
{

	extract($_POST);
	$errorFlag=0;
	$condition		=	"form_name =? and form_type=?";
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
	elseif($dbClass->checkEntryExist("user_forms",$condition,array(trim($form_name),trim($form_type))))
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
		$insertInfo['form_name']			= $form_name;
		$insertInfo['form_type']			= $form_type;
		$insertInfo['require_confirm']		= $require_confirm;
		$insertInfo['send_thankyoumail']	= 1;
		$insertInfo['email_new_contacts']	= $email_new_contacts;
		$insertInfo['design_color']			= $design_color;
		$insertInfo['letter_color']			= $letter_color;
		$insertInfo['use_captcha']			= $use_captcha;
		$insertInfo['user_id']				= $_SESSION['SesUserId'];
		$insertInfo['form_format']			= $form_format;
		$insertInfo['form_created_date']	= 'NOW()';
		
		$formId=$dbClass->prepareInsertStatement("user_forms",$insertInfo);
		//$formId=$dbClass->db_insert_id();
		
		if(count($contctarr)>0)
		{
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
			pageRedirection($url->urlBase.'arrange_customfield.php?'.$qryapp);
			exit;
		}
		elseif($form_type=='f')
		{
			pageRedirection($url->urlBase.'form_makethanku.php?'.$qryapp);
			exit;
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

$smarty->assign('errorString',$errorString);
$smarty->assign('contactListArr',$contactListArr);
$smarty->assign('numLists',$numLists);

$smarty->display('create_form.tpl');
?>