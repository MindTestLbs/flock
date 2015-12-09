<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Built-In Templates";
$pageName = "builtintemplates.php";
$smarty->assign('pageName',$pageName);
$smarty->assign('pageTitle',$pageTitle);
$items_per_page 	= 12;
$conditionValues = array();
$urlParam="ls=1";

$query				="select * from built_templates order by category_name asc";
$rs 				= $dbClass->prepareConditionStatement($query,$conditionValues);
$numRows			= $dbClass->getAffectedRows();

if($numRows >0)
{
	$urlParameters 		= $urlParam;
	$pager 				= new SqlPager($query,$numRows,$conditionValues,$url->urlBase."builtintemplates.php?$urlParam",$items_per_page,$dbDetails);	
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

$smarty->display('builtintemplates.tpl');
?>