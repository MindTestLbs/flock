<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Create New Website Form - Arrange Custom Fields";
$pageName = "arrange_customfield.php";

$smarty->assign('pageTitle',$pageTitle);
$smarty->assign('pageName',$pageName);

$formId=$_REQUEST['formId'];
$qrapp='<input type="hidden" name="formId" value="'.$_REQUEST['formId'].'">';
$formDet	= $dbClass->getTableRecordSingle("user_forms","form_id=?",array($formId));

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Submit")
{

	
	extract($_POST);
	if($sort_order=='')
	{
	//echo $formDet['form_format'];
	//exit;
		$inserCustomem['form_id']				=	$formId;
		$inserCustomem['custom_field_id']		=	'e';
		$inserCustomem['sort_order']			=	'1';
		$insertID=$dbClass->prepareInsertStatement("form_custom_fields",$inserCustomem);
		$t=1;
		$inserCustomem['form_id']				=	$formId;
		$inserCustomem['custom_field_id']		=	'n';
		$inserCustomem['sort_order']			=	'2';
		$insertID=$dbClass->prepareInsertStatement("form_custom_fields",$inserCustomem);
		$t=2;
		if($formDet['form_format']=='c')
		{
			$inserCustomcon['form_id']				=	$formId;
			$inserCustomcon['custom_field_id']		=	'c';
			$inserCustomcon['sort_order']			=	'3';
			$insertID=$dbClass->prepareInsertStatement("form_custom_fields",$inserCustomcon);
			$t=3;
		}
	}
	else
	{
		$ids = explode('|',$_POST['sort_order']);
		for($m=0;$m<count($ids)-1;$m++)
		{
			$inserCustom['form_id']				=	$formId;
			$inserCustom['custom_field_id']		=	$ids[$m];
			$inserCustom['sort_order']			=	$m+1;
			//print_r($inserCustom);
			//exit;
			$insertID=$dbClass->prepareInsertStatement("form_custom_fields",$inserCustom);
		}
		
	}
	if($formDet['require_confirm']=='1')
	{
		pageRedirection($url->urlBase.'form_makeconfirm.php?formId='.$formId);
		exit;
	}
	else
	{
		if($formDet['send_thankyoumail']=='1')
		{
			pageRedirection($url->urlBase.'form_makethanku.php?formId='.$formId);
			exit;
		}
		else
		{
			pageRedirection($url->urlBase.'form_makeerror.php?formId='.$formId);
			exit;
		}
	}

}
$sort_order = implode($sort_order,'|');

$smarty->assign('formDet',$formDet);
$smarty->assign('qrapp',$qrapp);
$smarty->assign('sort_order',$sort_order);

$smarty->display('arrange_customfield.tpl');

?>