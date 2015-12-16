<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Update Website Form - Error Page";
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
		$dbClass->prepareUpdateStatement("form_page", $updateInfo, 'form_id=? AND page_type=?',array($formId,'erropage'));
		pageRedirection($url->urlBase.'show_formcode.php?formId='.base64_encode(base64_encode($formId)));
		exit;

}
else
{
$confirmPageInfo=  $dbClass->getTableRecordSingle("form_page","form_id=? AND page_type=?",array($formId,'erropage'));
$_REQUEST['confirm_html']		= stripslashes($confirmPageInfo['confirm_html']);
$_REQUEST['url']				= stripslashes($confirmPageInfo['url']);
}


$oFCKeditor=new FCKeditor("confirm_html");
$oFCKeditor->BasePath="./FCKeditor/";
$oFCKeditor->Height="300";
$oFCKeditor->Width="650";
$oFCKeditor->ToolbarSet = 'Basic';
$oFCKeditor->Value=$_REQUEST['confirm_html'];
$smarty->assign("fkeditor", $oFCKeditor->CreateHtml()) ;

$smarty->assign('formDet',$formDet);
$smarty->assign('qrapp',$qrapp);

$smarty->display('form_editerror.tpl');

?>