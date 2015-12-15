<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Update Website Form - Make Confirmation";
$pageName = "list_forms.php";
include("./FCKeditor/fckeditor.php");

$smarty->assign('pageTitle',$pageTitle);
$smarty->assign('pageName',$pageName);

$formId=$_REQUEST['formId'];
$qrapp='<input type="hidden" name="formId" value="'.$_REQUEST['formId'].'">';
$formDet	= $dbClass->getTableRecordSingle("user_forms","form_id=?",array($formId));

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Submit")
{
	extract($_REQUEST);
	$errorFlag=0;

		$updateInfo['confirm_html']			= $confirm_html;
		$updateInfo['url']					= $url;
		$updateInfo['send_from_name']		= $send_from_name;
		$updateInfo['send_from_email']		= $send_from_email;
		$updateInfo['reply_to_email']		= $reply_to_email;
		//$insertInfo['reply_from_email']		= $reply_from_email;
		$updateInfo['bounce_email']			= $bounce_email;
		$updateInfo['email_subject']		= $email_subject;
		$updateInfo['email_html']			= $email_html;
		$updateInfo['email_text']			= $email_text;
		$dbClass->prepareUpdateStatement("form_page", $updateInfo, 'form_id=? AND page_type=?',array($formId,'confirmation'));
		
		
		if($formDet['send_thankyoumail']=='1')
		{
			pageRedirection($url->urlBase.'form_editthanku.php?formId='.$formId);
			exit;
		}
		else
		{
			pageRedirection($url->urlBase.'form_editerror.php?formId='.$formId);
			exit;
		}

}
else
{
$confirmPageInfo=  $dbClass->getTableRecordSingle("form_page","form_id=? AND page_type=?",array($formId,'confirmation'));
$_REQUEST['confirm_html']		= stripslashes($confirmPageInfo['confirm_html']);
$_REQUEST['url']				= stripslashes($confirmPageInfo['url']);
$_REQUEST['send_from_name']		= stripslashes($confirmPageInfo['send_from_name']);
$_REQUEST['send_from_email']	= stripslashes($confirmPageInfo['send_from_email']);
$_REQUEST['reply_to_email']		= stripslashes($confirmPageInfo['reply_to_email']);
$_REQUEST['reply_from_email']	= stripslashes($confirmPageInfo['reply_from_email']);
$_REQUEST['bounce_email']		= stripslashes($confirmPageInfo['bounce_email']);
$_REQUEST['email_subject']		= stripslashes($confirmPageInfo['email_subject']);
$_REQUEST['email_html']			= stripslashes($confirmPageInfo['email_html']);
$_REQUEST['email_text']			= stripslashes($confirmPageInfo['email_text']);

}


$oFCKeditor=new FCKeditor("confirm_html");
$oFCKeditor->BasePath="./FCKeditor/";
$oFCKeditor->Height="300";
$oFCKeditor->Width="650";
$oFCKeditor->ToolbarSet = 'Basic';
$oFCKeditor->Value=$_REQUEST['confirm_html'];
$smarty->assign("fkeditor", $oFCKeditor->CreateHtml()) ;

$oFCKeditor1=new FCKeditor("email_html");
$oFCKeditor1->BasePath="./FCKeditor/";
$oFCKeditor1->Height="300";
$oFCKeditor1->Width="650";
$oFCKeditor1->ToolbarSet = 'Basic';
$oFCKeditor1->Value=$_REQUEST['email_html'];
$smarty->assign("fkeditor1", $oFCKeditor1->CreateHtml()) ;


$smarty->assign('formDet',$formDet);
$smarty->assign('qrapp',$qrapp);

$smarty->display('form_editconfirm.tpl');

?>