<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Create New Website Form - Make Confirmation";
$pageName = "form_makeconfirm.php";
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

		$insertInfo['form_id']				= $formId;
		$insertInfo['page_type']			= 'confirmation';
		$insertInfo['confirm_html']			= $confirm_html;
		$insertInfo['url']					= $url;
		$insertInfo['send_from_name']		= $send_from_name;
		$insertInfo['send_from_email']		= $send_from_email;
		$insertInfo['reply_to_email']		= $reply_to_email;
		//$insertInfo['reply_from_email']		= $reply_from_email;
		$insertInfo['bounce_email']			= $bounce_email;
		$insertInfo['email_subject']		= $email_subject;
		$insertInfo['email_html']			= $email_html;
		$insertInfo['email_text']			= $email_text;
		
		$insertID=$dbClass->prepareInsertStatement("form_page",$insertInfo);
		
		if($formDet['send_thankyoumail']=='1')
		{
			pageRedirection($url->urlBase.'form_makethanku.php?formId='.$formId);
			exit;
		}
		else
		{
			pageRedirection($url->urlBase.'form_makeerror.php?formId='.$formId);
			exit;
		}

}
else
{

$userDet =  $dbClass->getTableRecordSingle("users","user_id=?",array($_SESSION['SesUserId']));
$_REQUEST['send_from_name']		=	$userDet['user_firstname']." ".$userDet['user_lastname'];
$_REQUEST['send_from_email']	=	$userDet['user_email'];
$_REQUEST['reply_to_email']		=	$userDet['user_email'];
$_REQUEST['reply_from_email']	=	$userDet['user_email'];
$_REQUEST['bounce_email']		=	$userDet['user_email'];



if($formDet['form_type']=='s')
{
	$_REQUEST['email_subject'] ='Confirm your Subscription';
	$_REQUEST['confirm_html']='<style>
body {
margin: 0px;
}
#content {
border: 1px solid #EFECBA;
height: 150px;
background-color: #FBFAE7;
padding:20px;
}
#container {
font: 11px tahoma;
width:100%;
}
</style>
<div id="container">
<div id="content">
<b>Your email subscription is almost complete...</b><br/><br/>
An email has been sent to the email address you entered. In this email is a confirmation link. Please click on this link to confirm your subscription.<br/><br/>
Once you\'ve done this your subscription will be complete.<br/><br/>
<a href="javascript:history.back()">« Go Back</a>
</div>
</div>';

$_REQUEST['email_html']='<b>Please confirm your subscription</b>
<br/><br/>
Thank you for subscribing to our newsletter.<br/><br/>To finalize your subscription, please click on the confirmation link below. Once you\'ve done this, your subscription will be complete.<br/><br/>
<a href="%%CONFIRMLINK%%" target="_blank">Please click here to confirm your subscription</a><br/><br/>or copy and paste the following URL into your browser:<br/>
%%CONFIRMLINK%%';

$_REQUEST['email_text'] ='Thank you for subscribing to our newsletter.

To finalize your subscription, please click on the confirmation link below. Once you\'ve done this, your subscription will be complete.

%%CONFIRMLINK%%';

}
if($formDet['form_type']=='u')
{
$_REQUEST['email_subject'] ='Unsubscribe Request';
$_REQUEST['confirm_html'] ='<style>
body {
margin: 0px;
}
#content {
border: 1px solid #EFECBA;
height: 150px;
background-color: #FBFAE7;
padding:20px;
}
#container {
font: 11px tahoma;
width:100%;
}
</style>
<div id="container">
<div id="content">
<b>Your request to be removed from our contact list is almost complete...</b><br/><br/>
Please confirm your request to unsubscribe from this contact list.<br/><br/>You will receive an email shortly with a link to confirm your request. Please click this link and you will be removed from our contact list.
</div>
</div>';

$_REQUEST['email_html'] ='<html>Please confirm you want to unsubscribe by clicking on the link below.<br/><br/><a href="%%CONFIRMUNSUBLINK%%" target="_blank">Please click here to confirm you want to leave this contact list</a><br/><br/>or copy and paste the following URL into your browser:<br/>%%CONFIRMLINK%%<br/><br/>We need to do this before removing you from the contact list.';
$email_text='Please confirm you want to unsubscribe by clicking on the link below:

%%CONFIRMUNSUBLINK%%

We need to do this before removing you from the contact list.';

}
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

$smarty->display('form_makeconfirm.tpl');

?>