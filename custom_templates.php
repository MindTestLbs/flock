<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Contact Lists";
$pageName = "custom_templates.php";

$_table_searchField 	= "template_name";

$smarty->assign('pageTitle',$pageTitle);
$smarty->assign('pageName',$pageName);

$conditionValues 	= array($_SESSION['SesUserId']);
$items_per_page 	= 10;

$urlParam="ls=1";

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
			$updateInfo										= array();
			$updateInfo['template_user_id']					= 0;
			$updateInfo['deleted_owner_id']				= $_SESSION['SesUserId'];
			$updateCondition = " custom_template_id=?";	
			$dbClass->prepareUpdateStatement('contact_lists',$updateInfo,$updateCondition,array($checkbox[$i]));

			$fetchctQry = "select count(*) as ct from contact_subscribers where custom_template_id=?";
			$getcontactsArr=$dbClass->resultSetSingle($fetchctQry,array($checkbox[$i]));
			$totalContact = $getcontactsArr['ct'];
			if(count($totalContact)>0)
			{
				$updateContacts['subscriber_Added_by']	= 0;
				$updateContacts['deleted_owner_id']		= $_SESSION['SesUserId'];
				$updateContacts['user_deleted']			= 1;
				$updateCondition1 = " custom_template_id=?";	
				$dbClass->prepareUpdateStatement('contact_subscribers',$updateContacts,$updateCondition1,array($checkbox[$i]));
				
			}
		}
		if(empty($errorList))
		{
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
			pageRedirection('custom_templates.php'.'?'.$qryParameters);	
			exit;
		}
	}
}

if(isset($_REQUEST['action']) && $_REQUEST['action']==='delete')
{
	$delId =  base64_decode(base64_decode($_REQUEST['custom_template_id']));
	$updateInfo										= array();
	$updateInfo['template_user_id']					= 0;
	$updateInfo['deleted_owner_id']		= $_SESSION['SesUserId'];
	$updateCondition = " custom_template_id=?";	
	$dbClass->prepareUpdateStatement('contact_lists',$updateInfo,$updateCondition,array($delId));

	$fetchctQry = "select count(*) as ct from contact_subscribers where custom_template_id=?";
	$getcontactsArr=$dbClass->resultSetSingle($fetchctQry,array($delId));
	$totalContact = $getcontactsArr['ct'];
	if(count($totalContact)>0)
	{
		$updateContacts['subscriber_Added_by']	= 0;
		$updateContacts['deleted_owner_id']		= $_SESSION['SesUserId'];
		$updateContacts['user_deleted']			= 1;
		$updateCondition1 = " custom_template_id=?";	
		$dbClass->prepareUpdateStatement('contact_subscribers',$updateContacts,$updateCondition1,array($delId));
		
	}
	
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
	pageRedirection('custom_templates.php'.'?'.$qryParameters);	
	exit;
		
}

$qryApp="template_user_id=?";
if($_REQUEST['page']!='')
{
	$urlParam = 'page='.$_REQUEST['page'];
}

if($_REQUEST['keyword']!="")
{
	$keyword 			= trim($_REQUEST['keyword']);
	$searchFields 		= "".$_table_searchField."";
	$seachQuery   		= $homeObj->buildQueryForSeach($searchFields); //build query
	$qryApp.=" and ".$seachQuery;
	$conditionValues 	= $homeObj->buildConditionArrayForSearch($searchFields,$keyword,$conditionValues);
	
	$urlParam.= '&keyword='.$_REQUEST['keyword'];
}

$query					="select custom_template_id, template_name,template_format,template_status from custom_templates where ".$qryApp." order by custom_template_id desc";
$rs 						= $dbClass->prepareConditionStatement($query,$conditionValues);
$numRows			= $dbClass->getAffectedRows();

if($numRows >0)
{
	$urlParameters 		= $urlParam;
	$pager 				= new SqlPager($query,$numRows,$conditionValues,$url->urlBase."custom_templates.php?$urlParam",$items_per_page,$dbDetails);	
	$pager -> opt_texts['first'] = "<<";
	$pager -> opt_texts['back']  = "<";
	$pager -> opt_texts['next']  = ">";
	$pager -> opt_texts['last']  = ">>";
	$pager -> opt_texts['links_seperator'] = " ";
	$pager -> opt_links_count = 5;
	
	$templates = array();
	
	foreach($pager->getPage($conditionValues) as $ky=>$ns)
	{ 
		$templates[$ky] = $ns;
	
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

$smarty->assign('templates',$templates);

$smarty->display('custom_templates.tpl');
?>