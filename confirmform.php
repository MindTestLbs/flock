<?php
session_start();
include_once('./includes.php');
$pageTitle = "Form Confirmation";
$pageName = "confirmform.php";

require_once('amazon_ses_class.php');
$ses = new SimpleEmailService($configDetails['amazon_access_key'], $configDetails['amazon_secrey_key']);
$mail = new SimpleEmailServiceMessage();

unset($errorList);

$form_submit_id		= base64_decode($_REQUEST['form_submit_id']);

$formSubmitdet	= $dbClass->getTableRecordDetails("form_submits","form_submit_id=?",array($form_submit_id));
$formCustomValues	= $dbClass->getTableRecordDetails("form_custom_values","form_submit_id=?",array($form_submit_id));
$formListValues	= $dbClass->getTableRecordDetails("form_lists_values","form_submit_id=?",array($form_submit_id));

$formId			= $formCustomValues[0]['form_id'];
$formDet		= $dbClass->getTableRecordSingle("user_forms","form_id=?",array($formId));
$form_format=$formDet['form_format'];
$form_creator_id=$formDet['user_id'];


if($form_format=='fh')
{
	$email_format='h';
}
else
{
	$email_format='t';
}

if($formDet['form_type']=='s')
{$dispthnk='0';

	
	
	

	$emailId =$formSubmitdet['form_submit_email_id'];
	$fullname=$formSubmitdet['form_submit_fullname'];
	if(count($formListValues)>0)
	{
		foreach($formListValues as $listKey=>$listVal)
		{
			$listId = $listVal['contact_list_id'];
			$listDet=$dbClass->getTableRecordSingle("contact_lists","list_id=?",array($listId));
			$conditionEmail="contactlist_id=? and email_id=?";
			if($dbClass->checkEntryExist('contact_subscribers',$conditionEmail,array(trim($listId),trim($emailId))))
			{
				
				$errorList='You are already subscriber to the list '.$listDet['list_name'];

				$errorpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'erropage')); 
				if($errorpageDet['url']!='')
				{
					$url=$errorpageDet['url'];
					$url="http://".$url;
					pageRedirection($url);
				}
				else
				{
					$erropageDethtml=$errorpageDet['confirm_html'];
					$erropageDethtml1=str_replace("%%GLOBAL_Errors%%",$errorList,$erropageDethtml);
					echo stripslashes($erropageDethtml1);
				}
			}
			else
			{
				if(count($formCustomValues)>0)
				{
					foreach($formCustomValues as $cusKey=>$custVal)
					{
						if($custVal['customfield_id']=='c')
						{
							if($custVal['form_custom_field_value']=='fh')
							{
								$email_format='h';
							}
							else {$email_format='t';}
						}
					}
				}
				
				///check whether the user has the credit to add the contact
				$userCredits=$dbClass->getTableRecordSingle("user_credits","user_id=? and credit_status=?",array($form_creator_id,'1')); 
				$no_of_subscribers=$userCredits['no_of_subscribers'];
				$totalsubscribers=$homeObj->getTotalSubscriber($form_creator_id);
				if($totalsubscribers>=$no_of_subscribers)
				{
					$errorpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'erropage')); 
					if($errorpageDet['url']!='')
					{
						$url=$errorpageDet['url'];
						$url="http://".$url;
						pageRedirection($url);
					}
					else
					{
						$erropageDethtml=$errorpageDet['confirm_html'];
						$erropageDethtml1=str_replace("%%GLOBAL_Errors%%",$errorList,$erropageDethtml);
						echo stripslashes($erropageDethtml1);exit;
					}
				}
				
				///checking ends here
				
	
				$insertInfo['email_id']				= $emailId;
				$insertInfo['firstname']				= $fullname;
				$insertInfo['contactlist_id']			= $listId;
				$insertInfo['email_format']			= $email_format;
				$insertInfo['confirmation_status']		= '1';
				$insertInfo['subscriber_Added_by']		= $formDet['user_id'];
				$insertInfo['subscriber_added_date']		='NOW()';
				$insertInfo['contact_added_ip']			=$_SERVER['REMOTE_ADDR'];
				//print_r($insertInfo);
				$subscriber_id=$dbClass->prepareInsertStatement("contact_subscribers",$insertInfo);
				
				//$subscriber_id=$dbClass->db_insert_id();

				if(count($formCustomValues)>0)
				{
					foreach($formCustomValues as $cusKey=>$custVal)
					{
						if($custVal['customfield_id']!='c' && $custVal['customfield_id']!='e' && $custVal['customfield_id']!='n')
						{
							$inserttoCustom['contact_subscriber_id']	= $subscriber_id;
							$inserttoCustom['custom_field_id']		= $custVal['customfield_id'];
							$inserttoCustom['custom_field_value']		= $custVal['form_custom_field_value'];
							$insertID=$dbClass->prepareInsertStatement("subscribe_custom_fields",$inserttoCustom);
						}
					}
				}
				$dispthnk='1';
				$thankupageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'thankyou')); 

				$subscription_EmailId=$emailId;
		
				if($thankupageDet['send_from_name']!="")
				{
					$mail->setFrom($thankupageDet['send_from_name']."<no-reply@flockmails.com>");
				}
				else
				{
					$mail->setFrom("no-reply@flockmails.com");
				}
			
				$mail->setSubject(stripslashes($thankupageDet['email_subject']));
				
		
				$campaign_text_body	= stripslashes($thankupageDet['email_text']);
				$campaign_html_body	= stripslashes($thankupageDet['email_html']);
				
				if($form_format=='ft')
				{
					$body=$campaign_text_body;
				}
				else
				{
					$body=$campaign_html_body;
					$text_body=$campaign_text_body;
				}
	
				//echo $body;exit;
				//echo $subscription_EmailId;
				$mail->setMessageFromString($text_body,$body);
				$mail->addTo($subscription_EmailId);
				
				
				$mail->addReplyTo("no-reply@flockmails.com");
				$mail->setReturnPath("no-reply@flockmails.com");				
				
				$sendArray ="";
				$sendArray=$ses->sendEmail($mail);
								
				if($sendArray['errorcode']=='400')
				{
					$errorList='There is an error come while sending the email';

					$errorpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'erropage')); 
					if($errorpageDet['url']!='')
					{
						$url=$errorpageDet['url'];
						$url="http://".$url;
						pageRedirection($url);
					}
					else
					{
						$erropageDethtml=$errorpageDet['confirm_html'];
						$erropageDethtml1=str_replace("%%GLOBAL_Errors%%",$errorList,$erropageDethtml);
						echo stripslashes($erropageDethtml1);
					}
				}
				
				$mail->ClearTo();
				
				$updateFrmSubmit['last_action']	=	'subscribed';
				$updateCondition = "form_submit_id=?";	
				$dbClass->prepareUpdateStatement('form_submits',$updateFrmSubmit,$updateCondition,array($form_submit_id));
		
				
			}
		}
		if($dispthnk=='1')
		{
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
	}
	
}
else if($formDet['form_type']=='u')
{$disp='0';
	$emailId =$formSubmitdet['form_submit_email_id'];
	if(count($formListValues)>0)
	{
		foreach($formListValues as $listKey=>$listVal)
		{
			$listId = $listVal['contact_list_id'];
			$listDet=$dbClass->getTableRecordSingle("contact_lists","list_id=?",array($listId));
			$subscriberDet = $dbClass->getTableRecordDetails("contact_subscribers","email_id=? and contactlist_id=?",array($emailId,$listId)); 
			$subcnt = $dbClass->getAffectedRows();
			if($subcnt>0)
			{
				if($subscriberDet[0]['confirmation_status']=='1')
				{
					$updateFrmSubscriber['confirmation_status']	=	0;
					$updateCondition = " subscriber_id=? ";	
					$dbClass->prepareUpdateStatement('contact_subscribers',$updateFrmSubscriber,$updateCondition,array($subscriberDet[0]['subscriber_id']));
					
					$disp='1';
					
					$thankupageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'thankyou')); 

					$subscription_EmailId=$emailId;
					
					if($thankupageDet['send_from_name']!="")
					{
						$mail->setFrom($thankupageDet['send_from_name']."<no-reply@flockmails.com>");
					}
					else
					{
						$mail->setFrom("no-reply@flockmails.com");
					}
					$mail->setSubject(stripslashes($thankupageDet['email_subject']));
		
					
			
					$campaign_text_body	= stripslashes($thankupageDet['email_text']);
					$campaign_html_body	= stripslashes($thankupageDet['email_html']);
					
					if($form_format=='ft')
					{
						$body=$campaign_text_body;
					}
					else
					{
						$body=$campaign_html_body;
						$text_body=$campaign_text_body;
					}
					
					$mail->setMessageFromString($text_body,$body);
					$mail->addTo($subscription_EmailId);

					
					$mail->addReplyTo("no-reply@flockmails.com");
					$mail->setReturnPath("no-reply@flockmails.com");				
					
					$sendArray ="";
					$sendArray=$ses->sendEmail($mail);
									
					if($sendArray['errorcode']=='400')
					{
						$errorList='There is an error come while sending the email';
	
						$errorpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'erropage')); 
						if($errorpageDet['url']!='')
						{
							$url=$errorpageDet['url'];
							$url="http://".$url;
							pageRedirection($url);
						}
						else
						{
							$erropageDethtml=$errorpageDet['confirm_html'];
							$erropageDethtml1=str_replace("%%GLOBAL_Errors%%",$errorList,$erropageDethtml);
							echo stripslashes($erropageDethtml1);
						}
					}
					
					$mail->ClearTo();
					
					$updateFrmSubmit['last_action']	=	'unsubscribed';
					$updateCondition = "form_submit_id=?";	
					$dbClass->prepareUpdateStatement('form_submits',$updateFrmSubmit,$updateCondition,array($form_submit_id));
		
				}
				else
				{
					$errorList='You are already inactive in the list '.$listDet['list_name'];

					$errorpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'erropage'));
					if($errorpageDet['url']!='')
					{
						$url=$errorpageDet['url'];
						$url="http://".$url;
						pageRedirection($url);
					}
					else
					{
						$erropageDethtml=$errorpageDet['confirm_html'];
						$erropageDethtml1=str_replace("%%GLOBAL_Errors%%",$errorList,$erropageDethtml);
						echo stripslashes($erropageDethtml1);
					}
				}
			}
			else
			{
				$errorList='You are not subscribed  to the list '.$listDet['list_name'];

				$errorpageDet=$dbClass->getTableRecordSingle("form_page","form_id=? and page_type=?",array($formId,'erropage'));
				if($errorpageDet['url']!='')
				{
					$url=$errorpageDet['url'];
					$url="http://".$url;
					pageRedirection($url);
				}
				else
				{
					$erropageDethtml=$errorpageDet['confirm_html'];
					$erropageDethtml1=str_replace("%%GLOBAL_Errors%%",$errorList,$erropageDethtml);
					echo stripslashes($erropageDethtml1);
				}
			
			}
		}
		if($disp=='1')
		{
			if($thankupageDet['url']!='')
			{
				$url=$thankupageDet['url'];
				$url="http://".$url;
				pageRedirection($url);
				header('Location:$url');
				exit;
			}
			else
			{
				echo stripslashes($thankupageDet['confirm_html']);
			}
		}
	}
}
else
{
}
?>