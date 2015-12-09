<?php
include_once('./includes.php');

$metaDetails		= $dbClass->getTableRecordSingle('metatags',"page_name=?",array('Sign Up'));

if(isset($_SESSION['SesUserId']))
{
	pageRedirection('member_home.php');
}
$PackageArr		= $homeObj->listPackages(); 

$smarty->assign('metaDetails',$metaDetails);
$smarty->assign('errorString',$errorString);
$smarty->assign('packageCnt',$PackageArr['packageCnt']);
$smarty->assign('packages',$PackageArr['packages']);

$smarty->display('select_package.tpl');

?>