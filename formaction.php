<?php
session_start();
include_once('./includes.php');
$pageTitle = "Form Action";
$pageName = "formaction.php";

require_once('amazon_ses_class.php');
$ses = new SimpleEmailService($configDetails['amazon_access_key'], $configDetails['amazon_secrey_key']);

$mail = new SimpleEmailServiceMessage();
//echo $_REQUEST['emailId'];
//$general->dump($_REQUEST);

$formId=$_REQUEST['form'];
$formId=(int)($formId);
				
$formselctedLists = $_REQUEST['contactlist'];

$formDet			= $dbClass->getTableRecordSingle("user_forms","form_id=?",array($formId));
$FormcustomFields	= $dbClass->getTableRecordDetails("form_custom_fields","form_id=?",array($formId));
$contactLists		= $dbClass->getTableRecordDetails("form_lists","form_id=?",array($formId));
$formPages		= $dbClass->getTableRecordDetails("form_page","form_id=?",array($formId));

$form_type		= $formDet['form_type'];
$require_confirm	= $formDet['require_confirm'];
$send_thankyoumail	= $formDet['send_thankyoumail'];
$email_new_contacts	= $formDet['email_new_contacts'];
$form_html		= $formDet['form_html'];

if($_REQUEST['form_format']!='')
{
	$form_format=$_REQUEST['form_format'];
}
else
{
	$form_format='ht';
}
//echo $formDet['form_type'];exit;
if($formDet['form_type']!='f')
{
	$insertFrmSubmit['form_submit_email_id']	= $_REQUEST['emailId'];
	$insertFrmSubmit['form_submit_fullname']	= $_REQUEST['fullname'];
	$insertFrmSubmit['form_submit_date']		= 'NOW()';
	$form_submit_id=$dbClass->prepareInsertStatement("form_submits",$insertFrmSubmit);
	unset($insertFrmSubmit);

	
	if(count($FormcustomFields)>0)
	{
		$insertCustom['form_id']			= $formId;

		foreach($FormcustomFields as $customKey=>$customVal)
		{
			$custom_id	=$customVal['custom_field_id'];
			if($custom_id=='e')
			{
				
				$insertCustom['customfield_id']			= 'e';
				$insertCustom['form_custom_field_value']	= $_REQUEST['emailId'];
				$insertCustom['form_submit_id']			= $form_submit_id;
				$insertID=$dbClass->prepareInsertStatement("form_custom_values",$insertCustom);
				unset($insertCustom);
			}
			else if($custom_id=='n')
			{
				
				$insertCustom['customfield_id']			= 'n';
				$insertCustom['form_custom_field_value']	= $_REQUEST['fullname'];
				$insertCustom['form_submit_id']			= $form_submit_id;
				$insertID=$dbClass->prepareInsertStatement("form_custom_values",$insertCustom);
				unset($insertCustom);
			}
			else if($custom_id=='c')
			{
				$insertCustom['customfield_id']			= 'c';
				$insertCustom['form_custom_field_value']	= $_REQUEST['form_format'];
				$insertCustom['form_submit_id']			= $form_submit_id;
				$insertID=$dbClass->prepareInsertStatement("form_custom_values",$insertCustom);
				unset($insertCustom);
				
			}
		}
	}

	if(count($formselctedLists)>0)
	{
		for($i=0;$i<count($formselctedLists);$i++)
		{
			$insertList['form_id']			= $formId;
			$insertList['contact_list_id']		= $formselctedLists[$i];
			$insertList['form_submit_id']		= $form_submit_id;
			$insertID=$dbClass->prepareInsertStatement("form_lists_values",$insertList);
			unset($insertList);
		}
	}
}

if($formDet['form_type']=='s')
{
	$emailId=$_REQUEST['emailId'];
	if($require_confirm=='1')
	{
		$confirmpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'confirmation')); 
		$subscription_EmailId=$_REQUEST['emailId'];
		//$general->dump($confirmpageDet);

		if($confirmpageDet['send_from_name']!="")
		{
			$mail->setFrom($confirmpageDet['send_from_name']."<no-reply@flockmails.com>");
		}
		else
		{
			$mail->setFrom("no-reply@flockmails.com");
		}
		$mail->setSubject(stripslashes($confirmpageDet['email_subject']));
		

		$campaign_text_body	= stripslashes($confirmpageDet['email_text']);
		$campaign_html_body	= stripslashes($confirmpageDet['email_html']);
		
		if($form_format=='ft')
		{
			$body=$campaign_text_body;
		}
		else
		{
			$body=$campaign_html_body;
			$text_body=$campaign_text_body;
		}
		$confirmlink=$configDetails['siteUrl']."confirmform.php?form_submit_id=".base64_encode($form_submit_id);
		$body1=str_replace("%%CONFIRMLINK%%",$confirmlink,$body);
		$text_body1=str_replace("%%CONFIRMLINK%%",$confirmlink,$text_body);

		$mail->setMessageFromString($text_body1,$body1);
		
		$mail->addTo($subscription_EmailId);
		
		$mail->addReplyTo("no-reply@flockmails.com");
		$mail->setReturnPath("no-reply@flockmails.com");				
		
		$sendArray ="";
		$sendArray=$ses->sendEmail($mail);
						
		if($sendArray['errorcode']=='400')
		{
			$confirmpageDet1=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'erropage')); 
			if($confirmpageDet1['url']!='')
			{
				$url=$confirmpageDet1['url'];
				$url="http://".$url;
				pageRedirection($url);
				//header('Location:$url');
				//exit;
			}
			else
			{
				echo stripslashes($confirmpageDet1['confirm_html']);
			}
		}
		
		$mail->ClearTo();
		
		$updateFrmSubmit['last_action']	=	'sendConfirm';
		$updateCondition = "form_submit_id=?";	
		$dbClass->prepareUpdateStatement('form_submits',$updateFrmSubmit,$updateCondition,array($form_submit_id));

		if($confirmpageDet['url']!='')
		{
			$url=$confirmpageDet['url'];
			$url="http://".$url;
			pageRedirection($url);
			//header('Location:$url');
			//exit;
		}
		else
		{
			echo stripslashes($confirmpageDet['confirm_html']);
		}
	}
	else
	{
		$confirmlink=$configDetails['siteUrl']."confirmform.php?form_submit_id=".base64_encode($form_submit_id);
		pageRedirection($confirmlink);
	}
}
else if($formDet['form_type']=='u')
{
	$emailId=$_REQUEST['emailId'];
	if($require_confirm=='1')
	{
		$confirmpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'confirmation')); 
		$subscription_EmailId=$_REQUEST['emailId'];
		//$general->dump($confirmpageDet);

		if($confirmpageDet['send_from_email']!="")
		{
			$mail->setFrom($confirmpageDet['send_from_email']."<no-reply@flockmails.com>");
		}
		else
		{
			$mail->setFrom("no-reply@flockmails.com");
		}
						
		$mail->setSubject(stripslashes($confirmpageDet['email_subject']));


		$campaign_text_body	= stripslashes($confirmpageDet['email_text']);
		$campaign_html_body	= stripslashes($confirmpageDet['email_html']);
		
		if($form_format=='ft')
		{
			$body=$campaign_text_body;
		}
		else
		{
			$body=$campaign_html_body;
			$text_body=$campaign_text_body;
		}
		$confirmlink=$configDetails['siteUrl']."confirmform.php?form_submit_id=".base64_encode($form_submit_id);
		$body1=str_replace("%%CONFIRMLINK%%",$confirmlink,$body);
		$text_body1=str_replace("%%CONFIRMLINK%%",$confirmlink,$text_body);
		
		$mail->setMessageFromString($text_body1,$body1);
		$mail->addTo($subscription_EmailId);
		
		$mail->addReplyTo("no-reply@flockmails.com");
		$mail->setReturnPath("no-reply@flockmails.com");
		
		$sendArray ="";
		$sendArray=$ses->sendEmail($mail);
		if($sendArray['errorcode']=='400')
		{
			$confirmpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'erropage')); 
			if($confirmpageDet['url']!='')
			{
				$url=$confirmpageDet['url'];
				$url="http://".$url;
				pageRedirection($url);
				//header('Location:$url');
				//exit;
			}
			else
			{
				echo stripslashes($confirmpageDet['confirm_html']);
			}
		}
		
		$mail->ClearTo();
		
		$updateFrmSubmit['last_action']	=	'sendConfirm';
		$updateCondition = " form_submit_id=? ";	
		$dbClass->prepareUpdateStatement('form_submits',$updateFrmSubmit,$updateCondition,array($form_submit_id));
		if($confirmpageDet['url']!='')
		{
			$url=$confirmpageDet['url'];
			$url="http://".$url;
			pageRedirection($url);
			//header('Location:$url');
			//exit;
		}
		else
		{
		echo stripslashes($confirmpageDet['confirm_html']);
		}
	}
	else
	{
		$confirmlink=$configDetails['siteUrl']."confirmform.php?form_submit_id=".base64_encode($form_submit_id);
		pageRedirection($confirmlink);
	}
}
else if($formDet['form_type']=='m')
{
	$emailId=$_REQUEST['emailId'];
	$subcnt = $dbClass->getTableRecordCount('contact_subscribers',"email_id=?",array(trim($emailId)));
	$subscriberInfo = $dbClass->getTableRecordDetails("contact_subscribers","email_id=?",array($emailId));
	//print_r($subscriberInfo);exit;
	if($subcnt>0)
	{
		$contact_subscriber_id=$subscriberInfo[0]['subscriber_id'];
		if(count($formselctedLists)>0)
		{
			for($i=0;$i<count($formselctedLists);$i++)
			{
				$contactlistId		= $formselctedLists[$i];
				if(count($FormcustomFields)>0)
				{
					foreach($FormcustomFields as $customKey=>$customVal)
					{
						$custom_id	=$customVal['custom_field_id'];
						if($custom_id=='e')
						{
						}
						else if($custom_id=='c')
						{
							
						}
						else if($custom_id=='n')
						{
							
						}
					}
					
					
					$confirmpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'thankyou')); 
					if($confirmpageDet['url']!='')
					{
						$url=$confirmpageDet['url'];
						$url="http://".$url;
						pageRedirection($url);
					}
					else
					{
						echo stripslashes($confirmpageDet['confirm_html']);
					}
					
					
				}
				else
				{
					$confirmpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'erropage')); 
					if($confirmpageDet['url']!='')
					{
						$url=$confirmpageDet['url'];
						$url="http://".$url;
						pageRedirection($url);
					}
					else
					{
						echo stripslashes($confirmpageDet['confirm_html']);
					}
				}
	
			}
		}
		else
		{
			$confirmpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'erropage'));
			if($confirmpageDet['url']!='')
			{
				$url=$confirmpageDet['url'];
				$url="http://".$url;
				pageRedirection($url);
			}
			else
			{
				echo stripslashes($confirmpageDet['confirm_html']);
			}
		}
	}
	else
	{
		$confirmpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'erropage'));
		if($confirmpageDet['url']!='')
		{
			$url=$confirmpageDet['url'];
			$url="http://".$url;
			pageRedirection($url);
		}
		else
		{
			echo stripslashes($confirmpageDet['confirm_html']);
		}
	}
}
else if($formDet['form_type']=='f')
{
	$send_from_name		= $_REQUEST['myname'];
	$send_from_email	= $_REQUEST['myemail'];
	$send_to_name		= $_REQUEST['friendsname'];
	$send_to_email		= $_REQUEST['friendsemail'];
	$introduction		= $_REQUEST['introduction'];
	$thankupageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'thankyou'));
	
	$body=$introduction."<br />";

	if($send_from_name!="")
	{
		$mail->setFrom($send_from_name."<no-reply@flockmails.com>");
	}
	else
	{
		$mail->setFrom("no-reply@flockmails.com");
	}
	$Subject    ="Message from your friend ".$send_from_name;
	$mail->setSubject(stripslashes($Subject));
	
	
	

	$text_body	= $body.stripslashes($thankupageDet['email_text']);
	$body	= $body.stripslashes($thankupageDet['email_html']);
	
	
	$refererrmail=$send_from_email;
	$body1=str_replace("%%REFERRER_EMAIL%%",$refererrmail,$body);
	$text_body1=str_replace("%%REFERRER_EMAIL%%",$refererrmail,$text_body);
	
	//echo $subscription_EmailId;
	$mail->setMessageFromString($text_body1,$body1);
	
	if($send_to_name!="")
	{
		$mail->addTo($send_to_name."<".$send_to_email.">");
	}
	else
	{
		$mail->addTo($send_to_email);
	}

	
	$sendArray ="";
	$sendArray=$ses->sendEmail($mail);
	if($sendArray['errorcode']=='400')
	{
		$confirmpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'erropage'));
		if($confirmpageDet['url']!='')
		{
			$url=$confirmpageDet['url'];
			$url="http://".$url;
			pageRedirection($url);
		}
		else
		{
			echo stripslashes($confirmpageDet['confirm_html']);
		}
	}
	
	$mail->ClearTo();
	

	if($thankupageDet['url']!='')
	{
		$url=$thankupageDet['url'];
		$url="http://".$url;
		pageRedirection($url);
	}
	else
	{
		echo stripslashes($thankupageDet['confirm_html']);
	}
	
}
else
{
	$confirmpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'erropage'));
	if($confirmpageDet['url']!='')
	{
		$url=$confirmpageDet['url'];
		$url="http://".$url;
		pageRedirection($url);
	}
	else
	{
		echo stripslashes($confirmpageDet['confirm_html']);
	}
}
?>