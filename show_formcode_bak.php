<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Show Form Script";
$pageName = "show_formcode.php";
$smarty->assign('pageName',$pageName);
$smarty->assign('pageTitle',$pageTitle);

$form_id 							= base64_decode(base64_decode($_REQUEST['formId']));

$cnt = $dbClass->getTableRecordCount('user_forms',"form_id=? and user_id=?",array($form_id,$_SESSION['SesUserId']));
if($cnt>0)
{
	$form_html 				= $dbClass->getTableRecordField("user_forms","form_id=?",array($form_id),"form_html");
}

$smarty->assign('form_html',$form_html);
$smarty->display('show_formcode.tpl');



?>