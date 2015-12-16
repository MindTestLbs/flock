<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Create New Website Form - Make Thank You Page";
$pageName = "form_makethanku.php";
include("./FCKeditor/fckeditor.php");

$smarty->assign('pageTitle',$pageTitle);
$smarty->assign('pageName',$pageName);

$formId=$_REQUEST['formId'];
$qrapp='<input type="hidden" name="formId" value="'.$_REQUEST['formId'].'">';
$formDet	= $dbClass->getTableRecordSingle("user_forms","form_id=?",array($formId));

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Submit")
{
	extract($_POST);
	$errorFlag=0;

		$insertInfo['form_id']				= $formId;
		$insertInfo['page_type']			= 'thankyou';
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
		
		pageRedirection($url->urlBase.'form_makeerror.php?formId='.$formId);
		exit;

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
	$_REQUEST['email_subject'] ='Subscription Completed';
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
<b>Your subscription is now complete.</b><br/><br/>
Thank you for subscribing to our contact list. Your subscription is now complete.<br/><br/>
</div>
</div>';

$_REQUEST['email_html'] = '<b>Your subscription is complete</b><br/><br/>
Thank you for subscribing to our contact list. Your subscription is now complete. If you have any questions you can contact us by replying to this email.';
	$_REQUEST['email_text'] = 'Thank you for subscribing to our contact list.

Your subscription is now complete. If you have any questions you can contact us by replying to this email.';

}
if($formDet['form_type']=='u')
{
$_REQUEST['email_subject'] = 'Unsubscription Completed';
$_REQUEST['confirm_html'] = '<style>
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
Sorry to see you go!
</div>
</div>';
$_REQUEST['email_html'] = 'Hi,<br/>You have been unsubscribed from our contact list.<br/>Sorry to see you go!';
$_REQUEST['email_text'] = 'Hi,
You have been unsubscribed from our contact list.
Sorry to see you go!';

}
else if($formDet['form_type']=='f')
{
	$_REQUEST['email_subject'] = '';
	$_REQUEST['confirm_html'] = '<style>
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
<div id=&#34;container&#34;>
	<div id=&#34;content&#34;>
		<b>Your email was forwarded successfully.</b><br><br>
		Thank you for forwarding this email. It has been sent to your friend.
	</div>
</div>';
	$_REQUEST['email_html'] = '<div style=&#34;padding: 5px; border: 1px solid #EFECBA; background-color: #FBFAE7; text-align: center; font-family: tahoma; font-size: 11px;&#34;>This email was forwarded to you by %%REFERRER_EMAIL%%.</div>';
	$_REQUEST['email_text'] ='This email was forwarded to you by %%REFERRER_EMAIL%%.';
}
else if($formDet['form_type']=='m')
{
	$_REQUEST['email_subject']='Modification Completed';
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
<div id=&#34;container&#34;>
	<div id=&#34;content&#34;>
		<b>Your modifications have been completed successfully.</b><br><br>
		The changes made to your details stored with us have been completed successfully.
		<br><br>
	</div>';
	//$email_html='';
	//$email_text='';
}

}

$oFCKeditor=new FCKeditor("confirm_html");
$oFCKeditor->BasePath="./FCKeditor/";
$oFCKeditor->Height="300";
$oFCKeditor->Width="650";
$oFCKeditor->ToolbarSet = 'Basic';
$oFCKeditor->Value = $_REQUEST['confirm_html'];
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

$smarty->display('form_makethanku.tpl');

?>