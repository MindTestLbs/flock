<?PHP
include_once('./includes.php');

if(isset($_SESSION['SesUserId']))
	{
		
		$_SESSION['SesUserId']='';
		unset($_SESSION['SesUserId']);
		$_SESSION['user_last_login']='';
		unset($_SESSION['user_last_login']);
		
		session_destroy();
	}
	pageRedirection('index.php'); // Redirecting to Downloading page
	exit;
?>