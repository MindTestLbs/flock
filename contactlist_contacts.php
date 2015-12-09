<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Contact Lists";
$pageName = "contactlist_contacts.php";

$_table_searchField 	= "email_id";

$smarty->assign('pageTitle',$pageTitle);
$smarty->assign('pageName',$pageName);

$list_id 							= base64_decode(base64_decode($_REQUEST['list_id']));
include('contactlist_check.php');



$conditionValues 	= array($_SESSION['SesUserId'],$list_id,1);
$items_per_page 	= 10;

$urlParam="list_id=".$_REQUEST['list_id'];

if(isset($_REQUEST['hidden_submit']))
{
	$checkbox=$_REQUEST['checkbox'];
	if(empty($checkbox))
	{
		$errorList[] = "Please select any list to delete";
	}
	if(!empty($checkbox))
	{     
		for($i=0;$i<count($checkbox);$i++)
		{
			
			//$deleteCondition = "subscriber_id=".$checkbox[$i];
			//$dbClass->deleteQry('contact_subscribers',$deleteCondition);
			$subscriber_details 											= $dbClass->getTableRecordSingle("contact_subscribers","subscriber_id=?",array($checkbox[$i]));
			$updateContacts['subscriber_Added_by']		= 0;
			$updateContacts['list_id']									= 0;
			$updateContacts['deleted_owner_id']			= $_SESSION['SesUserId'];
			$updateContacts['user_deleted']					= 1;
			$updateContacts['deleted_list_id']					= $list_id;
			$updateCondition1 = " subscriber_id=?";	
			$dbClass->prepareUpdateStatement('contact_subscribers',$updateContacts,$updateCondition1,array($checkbox[$i]));

	
		}
		if(empty($errorList))
		{
			if($_REQUEST['page']!='')
			{
				$qryParameters.= '&page='.$_REQUEST['page'];
			}
			if($_REQUEST['keyword']!='')
			{
				$qryParameters .= '&keyword='.trim($_REQUEST['keyword']);
			}
			$confirmMessage = urlencode('Selected contacts removed successfully');
			$qryParameters .="&confirmMessage=".$confirmMessage;
			pageRedirection('contactlist_contacts.php'.'?list_id='.$_REQUEST['list_id'].'&'.$qryParameters);	
			exit;
		}
	}
}

if(isset($_REQUEST['action']) && $_REQUEST['action']==='delete')
{
	$delId =  base64_decode(base64_decode($_REQUEST['delid']));

	$updateContacts										= array();
	$updateContacts['subscriber_Added_by']		= 0;
	$updateContacts['list_id']									= 0;
	$updateContacts['deleted_owner_id']			= $_SESSION['SesUserId'];
	$updateContacts['user_deleted']					= 1;
	$updateContacts['deleted_list_id']					= $list_id;
	$updateCondition1 = " subscriber_id=?";	
	$dbClass->prepareUpdateStatement('contact_subscribers',$updateContacts,$updateCondition1,array($delId));
			
	
	$qryParameters = 'ls=1';
	if($_REQUEST['page']!='')
	{
		$qryParameters.= '&page='.$_REQUEST['page'];
	}
	if($_REQUEST['keyword']!='')
	{
		$qryParameters .= '&keyword='.trim($_REQUEST['keyword']);
	}
	$confirmMessage = urlencode('Selected contactlist details removed successfully');
	$qryParameters .="&confirmMessage=".$confirmMessage;
	pageRedirection('contactlist_contacts.php'.'?list_id='.$_REQUEST['list_id'].'&'.$qryParameters);	
	exit;
		
}

$qryApp="subscriber_Added_by=? and  list_id=? and confirmation_status=?";

if($_REQUEST['keyword']!="")
{
	$keyword 			= trim($_REQUEST['keyword']);
	$searchFields 		= "".$_table_searchField."";
	$seachQuery   		= $homeObj->buildQueryForSeach($searchFields); //build query
	$qryApp.=" and ".$seachQuery;
	$conditionValues 	= $homeObj->buildConditionArrayForSearch($searchFields,$keyword,$conditionValues);
	
	$urlParam.= '&keyword='.$_REQUEST['keyword'];
}

$query					="select subscriber_id, list_id,email_id,email_format,subscriber_added_date from contact_subscribers where ".$qryApp." order by list_id desc";
$rs 						= $dbClass->prepareConditionStatement($query,$conditionValues);
$numRows			= $dbClass->getAffectedRows();

if($numRows >0)
{
	$urlParameters 		= $urlParam;
	$pager 				= new SqlPager($query,$numRows,$conditionValues,$url->urlBase."contactlist_contacts.php?$urlParam",$items_per_page,$dbDetails);	
	$pager -> opt_texts['first'] = "<<";
	$pager -> opt_texts['back']  = "<";
	$pager -> opt_texts['next']  = ">";
	$pager -> opt_texts['last']  = ">>";
	$pager -> opt_texts['links_seperator'] = " ";
	$pager -> opt_links_count = 5;
	
	$contacts = array();
	
	foreach($pager->getPage($conditionValues) as $ky=>$ns)
	{ 
		//$ns['total_subscribers']= $dbClass->getTableRecordCount('contact_subscribers','list_id=?',array($ns['list_id']));
		$contacts[$ky] = $ns;
	
	}
}

if(count($errorList)>0)
{
 	$errorString.='<div class="errorlists" style="font-weight:bold">Please fix the following errors:-</div>';
	foreach($errorList as $errorKey=>$errorValue)
	{
		$errorString.='<div class="errorlists">'.$errorValue.'</div>';
	}
}

$smarty->assign('errorString',$errorString);


$smarty->assign('listCnt',$numRows);
if($numRows >0)
{
$smarty->assign('pager',$pager);
}
$smarty->assign('urlParam',$urlParam);

$smarty->assign('contacts',$contacts);

$smarty->display('contacts.tpl');
?>