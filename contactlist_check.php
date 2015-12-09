<?php
$listInfo 							= $dbClass->getTableRecordSingle("contact_lists","list_id=?",array($list_id));
$list_name						= $listInfo['list_name'];
$list_user_id					= $listInfo['list_user_id'];
if($list_user_id!=$_SESSION['SesUserId'])
{
	$confirmMessage = urlencode('You do not have the permission');
	$qryParameters .="&confirmMessage=".$confirmMessage;
	pageRedirection('contactlists.php'.'?'.$qryParameters);
}

?>