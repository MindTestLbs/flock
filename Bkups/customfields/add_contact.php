<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Add Subscriber";
$pageName = "add_contact.php";
$smarty->assign('pageName',$pageName);

$smarty->assign('pageTitle',$pageTitle);

$list_id 							= base64_decode(base64_decode($_REQUEST['list_id']));
$listInfo 							= $dbClass->getTableRecordSingle("contact_lists","list_id=?",array($list_id));
$list_name						= $listInfo['list_name'];
$list_user_id					= $listInfo['list_user_id'];
if($list_user_id!=$_SESSION['SesUserId'])
{
	$confirmMessage = urlencode('You do not have the permission to add contact to this list');
	$qryParameters .="&confirmMessage=".$confirmMessage;
	pageRedirection('contactlists.php'.'?'.$qryParameters);
}

$contactCustoms 			= $dbClass->getTableRecordDetails("customfield_contact","list_id=?",array($list_id));

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Submit')
{

	extract($_POST);
	$errorFlag=0;
	if(preg_replace("/^\s*$/","",$email_id)=="")
	{
		$errorFlag=1;
		$errorList[]="Email Id required.";
	}
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,11})$", $email_id))
	{
		$errorFlag=1;
		$errorList[]="Email address is invalid.";
	}
	if($email_id!="")
	{
		$conditionEmail="email_id=?  and list_id=?";
		$conditionValues[] = trim(stripslashes($email_id));
		$conditionValues[] = base64_decode(base64_decode($_REQUEST['list_id']));
	
		$emailExist	=	$dbClass->checkEntryExist("contact_subscribers",$conditionEmail,$conditionValues);
		if($emailExist>=1)
			{
					$errorFlag=1;
					$errorList[]="Email address already exist.";
			
			}
	}
	if($errorFlag===0)
	{
		$listId =  base64_decode(base64_decode($_REQUEST['list_id']));
	
		$insertInfo['email_id']					= $email_id;
		$insertInfo['list_id']			= $listId;
		$insertInfo['email_format']			= $email_format;
		$insertInfo['firstname']					= $firstname;
		$insertInfo['lastname']					= $lastname;
		$insertInfo['nickname']					= $nickname;
		$insertInfo['country']						= $country;
		$insertInfo['address']							= $address;
		$insertInfo['confirmation_status']		= $confirmation_status;
		$insertInfo['subscriber_Added_by']		= $_SESSION['SesUserId'];
		$insertInfo['subscriber_added_date']		='NOW()';
		$insertInfo['contact_added_ip']			=$_SERVER['REMOTE_ADDR'];

		$subscriber_id=$dbClass->prepareInsertStatement("contact_subscribers ",$insertInfo);

		$listid = base64_decode(base64_decode($list_id));

		/*if(count($customFieldDetforList)>0)
		{
			foreach($customFieldDetforList as $customConKey=>$customConVal)
			{
				$customVal='';
				if($customConVal['customfield_type']=='Checkbox')
				{
					for($i=0;$i<count($subscribe_customArr[$customConVal['customfield_id']]);$i++)
					{
						$customVal.=$subscribe_customArr[$customConVal['customfield_id']][$i]."@";
					}
				}
				else if($customConVal['customfield_type']=='Date')
				{
					$customVal=$yr.'-'.$mt.'-'.$dt;
				} 
				else
				{
					
					$customVal.=$subscribe_customArr[$customConVal['customfield_id']];
				}
				if($customVal!='')
				{
					$inserttoCustom['contact_subscriber_id']	= $subscriber_id;
					$inserttoCustom['custom_field_id']			= $customConVal['customfield_id'];
					$inserttoCustom['custom_field_value']		= $customVal;
					$insertID=$dbClass->prepareInsertStatement("subscribe_custom_fields ",$inserttoCustom);
				}
			}
			
		}*/
		$autoresponderQry= "SELECT * FROM `autoresponder` WHERE contact_list_id=? and sending_options=? and autoresponder_status=?";
		$autorespArr	= $dbClass->resultSetAll($autoresponderQry,array($listId,1,1));
		if(count($autorespArr)>0)
		{
			foreach($autorespArr as $autoRepKey=>$autorespVal)
			{
				$insertAuto['autoresponder_id']			= $autorespVal['autoresponder_id'];
				$insertAuto['receipient_id']			= $subscriber_id;
				$insertAuto['autoresponder_senddate']		= 'NOW()';
				$insertAuto['autoresponder_send_status']	= '1';
				$autoresponder_reciepient_id=$dbClass->prepareInsertStatement("autoresponder_reciepient",$insertAuto);
				
				$contactlistDe=$dbClass->getTableRecordSingle("contact_lists","list_id=?",array($listid));
				
				$mail->From     = $autorespVal['autoresponder_sendfromemail'];
				$mail->FromName = $autorespVal['autresponder_sendfrom_name'];
				$mail->Subject    = stripslashes($autorespVal['autoresponder_email_subject']);
				$mail->Mailer   = "mail";
				
				$autoresponder_id = $autorespVal['autoresponder_id'];
		
				$imgatt= '<img src="'.$configDetails['secure_siteUrl'].'autoresponse.php?autoresponder_reciepient_id='.$autoresponder_reciepient_id.'&autoresponder_id='.$autorespVal['autoresponder_id'].'">';

				$campaign_text_body	= stripslashes($autorespVal['autoresponder_text_content']);
				$campaign_html_body	= stripslashes($autorespVal['autoresponder_html_body']);
				$campaign_replyto_mailid =stripslashes($autorespVal['autoresponder_reply_emai_id']);

				$form_format	=$autorespVal['email_format'];
				
				if($form_format=='t')
				{
					$body=stripslashes($campaign_text_body);
				}
				else
				{
					$body=stripslashes($campaign_html_body);
					$text_body=stripslashes($campaign_text_body);
				}
				
				$doc            = new DOMDocument('1.0', 'UTF-8');
				$doc->loadHTML($body);
				$anchors    = $doc->getElementsByTagName('a');
				
				foreach($anchors as $a) {
					$linkurl=$a->getAttribute('href');
					//$linkurl=str_replace('"','',$linkurl);
					if($linkurl!='%%emailaddress%%' && $linkurl!='%%listname%%' && $linkurl!='%%companyname%%' && $linkurl!='%%companyaddress%%' && $linkurl!='%%unsubscribelink%%' && $linkurl!='%%webversion%%')
					{
						$chklkapthQry="SELECT * FROM `autoresponder_links` WHERE autoresponder_id=? and autoresponder_link_path=?";
						$linkpathdet	= $dbClass->resultSetAll($chklkapthQry,array($autoresponder_id,$linkurl));
						if(count($linkpathdet)>0)
						{
							$linkId=$linkpathdet[0]['autoresponder_link_Id'];
							$replaceurl=$configDetails['secure_siteUrl'].'autoresponse.php?linkId='.$linkId.'&autoresponder_reciepient_id='.$autoresponder_reciepient_id.'&autoresponder_id='.$autoresponder_id;
						}
						else
						{
							$inserlinkInfo['autoresponder_id']		= $autoresponder_id;
							$inserlinkInfo['autoresponder_link_path']	= $linkurl;
							
							$linkId=$dbClass->prepareInsertStatement("autoresponder_links",$inserlinkInfo);
							$replaceurl=$configDetails['secure_siteUrl'].'autoresponse.php?linkId='.$linkId.'&autoresponder_reciepient_id='.$autoresponder_reciepient_id.'&autoresponder_id='.$autoresponder_id;
							
						}
						
						$a->setAttribute('href', $replaceurl);
					}
				}
		
				$body6=$doc->saveHTML();
				
				//$body1=str_replace("%%CONFIRMLINK%%",$confirmlink,$body);
				//$text_body1=str_replace("%%CONFIRMLINK%%",$confirmlink,$text_body);
				//echo $body1;
				//echo $subscription_EmailId;
				$body1=str_replace("%%emailaddress%%",$email_id,$body6);
				$body2=str_replace("%%listname%%",$contactlistDe['list_name'],$body1);
				$body3=str_replace("%%companyname%%",$contactlistDe['company_name'],$body2);
				$body4=str_replace("%%companyaddress%%",$contactlistDe['company_address'],$body3);
				
				$unsubscribelink=$configDetails['secure_siteUrl'].'autoresponse.php?autoresponder_reciepient_id='.$autoresponder_reciepient_id.'&autoresponder_id='.$autoresponder_id.'&action=unsubscribe';
			$body5=str_replace("%%unsubscribelink%%",$unsubscribelink,$body4);
				
				$onlinelink=$configDetails['secure_siteUrl']."preview_autoresp.php?autoId=".$autoresponder_id;
				$body6 = str_replace("%%webversion%%",$onlinelink,$body5);
						
				$text_body1 = str_replace("%%unsubscribelink%%",$unsubscribelink,$text_body);
				$text_body2 = str_replace("%%webversion%%",$onlinelink,$text_body1);
				
				$mail->Body    = $body6.$imgatt;
				$mail->AltBody = $text_body2;
				$mail->AddAddress($email_id, 'User');
				$mail->AddReplyTo($campaign_replyto_mailid);
				
				if(!$mail->Send())
				{
				}
				
				$mail->ClearAddresses();

				$autostatQry="SELECT * FROM `autoresponder_stats` WHERE autoresponder_id=?";
				$autostatArr	= $dbClass->resultSetAll($autostatQry,array($autorespVal['autoresponder_id']));
				if(count($autostatArr)>0)
				{
					$totalRecepient=$autostatArr[0]['autoresponder_total_receipient'];
					$uptotOpenrate['autoresponder_total_receipient']=$totalRecepient+1;

					$updateCondition1 = " autoresponder_stats_id=?";	
					$dbClass->prepareUpdateStatement('autoresponder_stats',$uptotOpenrate,$updateCondition1,array($autostatArr[0]['autoresponder_stats_id']));
				
				}

				
			}
		}

		$confirmMessage = urlencode('Contact details added successfully');
		$qryParameters .="&confirmMessage=".$confirmMessage;
		pageRedirection('contactlist_contacts.php'.'?list_id='.$_REQUEST['list_id'].'&'.$qryParameters);	
	
	
	}
	
}
else
{
	$_POST['list_owner_name'] =  $fullname;
	$_POST['list_owner_email_id'] = $userDet['user_email'];
	$_POST['list_bounce_email'] =  $userDet['user_email'];
	$_POST['list_reply_to_mailId'] =  $userDet['user_email'];
}


if(count($errorList)>0)
{
 	$errorString.='<div class="errorlists" style="font-weight:bold">Please fix the following errors:-</div>';
	foreach($errorList as $errorKey=>$errorValue)
	{
		$errorString.='<div class="errorlists">'.$errorValue.'</div>';
	}
}

$smarty->assign('list_name',$list_name);

$customFieldArray		= $homeObj->getCustFieldforauser($_SESSION['SesUserId']);

$smarty->assign('customCnt',$customFieldArray['customCnt']);
$smarty->assign('customFields',$customFieldArray['customFields']);
$smarty->assign('errorString',$errorString);
$smarty->display('add_contact.tpl');
?>