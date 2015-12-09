<?php
include_once('./includes.php');

$metaDetails		= $dbClass->getTableRecordSingle('metatags',"page_name=?",array('Home'));

if(isset($_REQUEST['submitcontact']) && $_REQUEST['sendcontact']=='1')
{
	$fullname		= $_REQUEST['fullname'];
	$email			= $_REQUEST['email'];
	$phone			= $_REQUEST['phone'];
	$BotBootInput	= $_REQUEST['BotBootInput'];
	$botvalue		= $_REQUEST['botvalue'];
	$comments		= $_REQUEST['comments'];
	
	if($fullname!="" && $email!="" && $BotBootInput!="")
	{
		if($BotBootInput==$botvalue)
		{
			$headers 	 = "From:".$firstname."<".$email.">\n";
			$headers    .= 'MIME-Version: 1.0' . "\r\n";
			$headers    .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers 	.= 'Cc: info@mind-labs.com' . "\r\n";
			
			$body =  "Query from Flock Mails  contact form";
			$body .= "<br />";
			$body .= "<br />";
			$body .=  "Name : ".$fullname."<br />";
			$body .= "<br />";
			$body .=  "Email : ".$email."<br />";
			$body .= "<br />";
			$body .=  "Phone : ".$phone."<br />";
			$body .= "<br />";
			$body .=  "Comments : ".stripslashes(nl2br($comments))."<br />";
			$body .= "<br />";
		
			
			@mail("info@flockmails.com","Comment From Flock Mails contact form",$body,$headers); 
			pageRedirection('index.php?mailsent=1');	
		}
		else
		{
			?>
			<script type="text/javascript">
			alert("Security code mismatch");
			</script>
			<?php
		}
	}
	else
	{
		?>
		<script type="text/javascript">
		alert("Some inputs are missings");
		</script>
		<?php
	}
}

$PackageArr		= $homeObj->listPackages(); 

$smarty->assign('metaDetails',$metaDetails);
$smarty->assign('packageCnt',$PackageArr['packageCnt']);
$smarty->assign('packages',$PackageArr['packages']);

$smarty->display('index.tpl');
?>