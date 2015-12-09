<?php
include_once('./includes.php');

$metaDetails		= $dbClass->getTableRecordSingle('metatags',"page_name=?",array('Sign Up'));

if(isset($_SESSION['SesUserId']))
{
	pageRedirection('member_home.php');
}


$userId		= base64_decode($_REQUEST['userId']);
$packageId	= $_REQUEST['packageId'];

/*if($userId=="" || $packageId=="")
{
	pageRedirection('register.php');
}*/

if($userId!="" && $packageId!="")
{
	$updateInfo['user_package_id']				= $packageId;
	$dbClass->prepareUpdateStatement("users", $updateInfo, 'user_id=?',array($userId));
}

$userDet=$homeObj->getuserDet($userId);

$userPackDet=$homeObj->getpackageDet($userDet['user_package_id']);

$paypalDet=$homeObj->getPaypaldet();


require_once('paypal.class.php');  // include the class file
$p = new paypal_class;             // initiate an instance of the class

if($paypalDet['payment_settings_paymod']=='1')
{
	$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url
}
else
{
	$p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url
}



$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

// if there is not action variable, set the default action of 'process'
if (empty($_GET['action'])) $_GET['action'] = 'process';  

switch ($_GET['action']) {
    
   case 'process':      // Process and order...

      
      $p->add_field('business', $paypalDet['payment_settings_account']);
      $p->add_field('return', $this_script.'?action=success');
      $p->add_field('cancel_return', $this_script.'?action=cancel');
      $p->add_field('notify_url', $this_script.'?action=ipn');
      $p->add_field('custom', $userId);
	  $p->add_field('item_name', 'Payment to Flock Mails Email Marketing');
      $p->add_field('amount', $userPackDet['package_amount']);

      $p->submit_paypal_post(); // submit the fields to paypal
      //$p->dump_fields();      // for debugging, output a table of all the fields
      break;
      
   case 'success':      // Order was successful...
 
      /*echo "<html><head><title>Success</title></head><body><h3>Thank you for your order.</h3>";
      foreach ($_POST as $key => $value) { echo "$key: $value<br>"; }
      echo "</body></html>";*/
	  
	  pageRedirection('login.php?payment_status='.$_REQUEST['payment_status'].'&txn_id='.$_REQUEST['txn_id']);
      
      
      break;
      
   case 'cancel':       // Order was canceled...

		 pageRedirection('register.php?confirmMessage=The order was cancelled');
      
      break;
      
   case 'ipn':          // Paypal is calling page for IPN validation...
   

      
      if ($p->validate_ipn()) {
	 
		 if(isset($_REQUEST['payment_status']) && $_REQUEST['payment_status']=='Completed')
		 {
		 	$userDet			= $homeObj->getuserDet($_REQUEST['custom']);
			$userPackDet	= $homeObj->getpackageDet($userDet['user_package_id']);

		 	$insertToPayment['user_id'] 						=$_REQUEST['custom'];
			$insertToPayment['transaction_id'] 				=$_REQUEST['txn_id'];
			$insertToPayment['paid_amt'] 					=$userPackDet['package_amount'];
			$insertToPayment['selected_package'] 		=$userDet['user_package_id'];
			$insertToPayment['paid_date'] 					= date('Y-m-d');
			$insertToPayment['payment_status'] 			='1';
			
			$payrecordId=$dbClass->prepareInsertStatement('payment_records',$insertToPayment);
				
		
			$useupto=addcurrTime('', '', '', '', $userPackDet['total_no_of_days'], '');
			
			$insertToCredits['user_id'] 				=$_REQUEST['custom'];
			$insertToCredits['pay_record_id'] 		=$payrecordId;
			$insertToCredits['package_id'] 			=$userDet['user_package_id'];
			$insertToCredits['Total_email'] 			=$userPackDet['no_of_emails'];
			$insertToCredits['no_of_subscribers'] =$userPackDet['max_no_of_subscribers'];
			$insertToCredits['can_use_from'] 		=date('Y-m-d');
			$insertToCredits['can_use_to'] 			=$useupto;
			$insertToCredits['credit_status'] 		='1';
			$dbClass->prepareInsertStatement('user_credits',$insertToCredits);
			
			$updateuser['user_status']				='1';
			$updateuser['user_payment_Status']		='1';

			$dbClass->prepareUpdateStatement("users", $updateuser, 'user_id=?',array($_REQUEST['custom']));
						
			$headers 	 = "From:Flock Mails<no-reply@flockmails.com>\n";
			$headers    .= 'MIME-Version: 1.0' . "\r\n";
			$headers    .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers 	.= 'Cc: info@mind-labs.com' . "\r\n";
			
			$name 		= $userInfo->getFullname($_REQUEST['custom']);
			$userDet 	= $homeObj->getuserDet($_REQUEST['custom']);
			
			$body =  "Flock Mails New registration";
			$body .= "<br />";
			$body .= "<br />";
			$body .=  "Name : ".$name."<br />";
			$body .= "<br />";
			$body .=  "Email : ".$userDet['user_email']."<br />";
			$body .= "<br />";
			$body .=  "Package Name : ".$userPackDet['package_name']."<br />";
			$body .= "<br />";
			$body .=  "Amount Paid : ".$userPackDet['package_amount']."<br />";
			$body .= "<br />";
			$body .=  "Transaction Id : ".$_REQUEST['txn_id']."<br />";
			 $body .= "<br />";
		
			
			@mail("info@flockmails.com","Flock Mails New registration",$body,$headers); 
			@mail("pravin@mind-labs.com","Flock Mails New registration",$body,$headers); 
			
			pageRedirection('login.php?payment_status='.$_REQUEST['payment_status'].'&txn_id='.$_REQUEST['txn_id']);
		 }
		 
      }
	  
	  /*foreach($_REQUEST as $key=>$value) 
		{
		$privatedata.=$key."=".$value."<br />";
		
		}
		$header 	 = "From:shabeena<shabeenakc@mail.com>\n";
		$header    .= 'MIME-Version: 1.0' . "\r\n";
		$header    .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
		@mail("mindbeesteam@gmail.com","Comment From Flock Mails",$privatedata,$header); */
					
	  

	  
      break;
 }     

?>