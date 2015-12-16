<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Website Forms";
$pageName = "list_forms.php";

$_table_searchField 	= "form_name";

$smarty->assign('pageTitle',$pageTitle);
$smarty->assign('pageName',$pageName);

$conditionValues 	= array($_SESSION['SesUserId']);
$items_per_page 	= 10;

$urlParam="";

if(isset($_REQUEST['hidden_submit']))
{
	$checkbox=$_REQUEST['checkbox'];
	if(empty($checkbox))
	{
		$errorList[] = "Please select any form to delete";
	}
	if(!empty($checkbox))
	{     
		for($i=0;$i<count($checkbox);$i++)
		{
			$cnt = $dbClass->getTableRecordCount('user_forms',"form_id=? and user_id=?",array($checkbox[$i],$_SESSION['SesUserId']));
			if($cnt>0)
			{
				$dbClass->prepareDeleteStatement('user_forms',"form_id=? and user_id=?",array($checkbox[$i],$_SESSION['SesUserId']));
				$dbClass->prepareDeleteStatement('form_lists',"form_id=?",array($checkbox[$i]));
				$dbClass->prepareDeleteStatement('form_page',"form_id=?",array($checkbox[$i]));
				$dbClass->prepareDeleteStatement('form_custom_fields',"form_id=?",array($checkbox[$i]));
			}
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
			$confirmMessage = urlencode('Selected forms removed successfully');
			$qryParameters .="&confirmMessage=".$confirmMessage;
			pageRedirection('list_forms.php'.'?&'.$qryParameters);	
			exit;
		}
	}
}

if(isset($_REQUEST['action']) && $_REQUEST['action']==='delete')
{
	$delId =  base64_decode(base64_decode($_REQUEST['delid']));

	$cnt = $dbClass->getTableRecordCount('user_forms',"form_id=? and user_id=?",array($delId,$_SESSION['SesUserId']));
	if($cnt>0)
	{
		$dbClass->prepareDeleteStatement('user_forms',"form_id=? and user_id=?",array($delId,$_SESSION['SesUserId']));
		$dbClass->prepareDeleteStatement('form_lists',"form_id=?",array($delId));
		$dbClass->prepareDeleteStatement('form_page',"form_id=?",array($delId));
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
	$confirmMessage = urlencode('Selected form removed successfully');
	$qryParameters .="&confirmMessage=".$confirmMessage;
	pageRedirection('list_forms.php'.'?&'.$qryParameters);	
	exit;
		
}

$qryApp="user_id=?";

if($_REQUEST['keyword']!="")
{
	$keyword 			= trim($_REQUEST['keyword']);
	$searchFields 		= "".$_table_searchField."";
	$seachQuery   		= $homeObj->buildQueryForSeach($searchFields); //build query
	$qryApp.=" and ".$seachQuery;
	$conditionValues 	= $homeObj->buildConditionArrayForSearch($searchFields,$keyword,$conditionValues);
	
	$urlParam.= '&keyword='.$_REQUEST['keyword'];
}

$query				="select * from user_forms where ".$qryApp." order by form_id desc";
$rs 				= $dbClass->prepareConditionStatement($query,$conditionValues);
$numRows			= $dbClass->getAffectedRows();

if($numRows >0)
{
	$urlParameters 		= $urlParam;
	$pager 				= new SqlPager($query,$numRows,$conditionValues,$url->urlBase."list_forms.php?$urlParam",$items_per_page,$dbDetails);	
	$pager -> opt_texts['first'] = "<<";
	$pager -> opt_texts['back']  = "<";
	$pager -> opt_texts['next']  = ">";
	$pager -> opt_texts['last']  = ">>";
	$pager -> opt_texts['links_seperator'] = " ";
	$pager -> opt_links_count = 5;
	
	$forms = array();
	
	foreach($pager->getPage($conditionValues) as $ky=>$ns)
	{ 
		$forms[$ky] = $ns;
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

$smarty->assign('forms',$forms);

$smarty->display('list_forms.tpl');
?>