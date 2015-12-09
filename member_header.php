<?php
if(!isset($_SESSION['SesUserId']))
{
	pageRedirection('login.php?err=Login Required');

}

$userDet				= $homeObj->getuserDet($_SESSION['SesUserId']);
$fullname 				= $userDet['user_firstname']." ".$userDet['user_lastname'];
$profile_image 		= $userDet['profile_image'];
$user_email			=  $userDet['user_email'];

$smarty->assign('fullname',$fullname);
$smarty->assign('profile_image',$profile_image);
$smarty->assign('user_email',$user_email);

?>