<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Dashboard";

$smarty->assign('pageTitle',$pageTitle);

$smarty->assign('campaignExecute',"");
$smarty->assign('campaignExecCnt',0);
$smarty->display('member_home.tpl');
?>