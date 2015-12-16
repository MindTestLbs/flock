<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Create New Website Form - Make Error Page";
$pageName = "form_makeerror.php";
include("./FCKeditor/fckeditor.php");

$smarty->assign('pageTitle',$pageTitle);
$smarty->assign('pageName',$pageName);

$formId=$_REQUEST['formId'];
$qrapp='<input type="hidden" name="formId" value="'.$_REQUEST['formId'].'">';
$formDet	= $dbClass->getTableRecordSingle("user_forms","form_id=?",array($formId));

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=="Submit")
{
	extract($_POST);
	$errorFlag=0;

		$insertInfo['form_id']				= $formId;
		$insertInfo['page_type']			= 'erropage';
		$insertInfo['confirm_html']			= $confirm_html;
		$insertInfo['url']					= $url;
		
		$insertID=$dbClass->prepareInsertStatement("form_page",$insertInfo);
		
		pageRedirection($url->urlBase.'show_formcode.php?formId='.base64_encode(base64_encode($formId)));
		exit;

}

$confirm_html='<style>
body {
margin: 0px;
}
#content {
border: 1px solid #EFECBA;
height: 150px;
background-color: #FBFAE7;
padding:20px;
}
#container {
font: 11px tahoma;
width:100%;
}
</style>
<div id=&#34;container&#34;>
	<div id=&#34;content&#34;>
		<b>An error has occurred.</b><br><br>
		An error(s) has occurred trying to perform some actions :
		%%GLOBAL_Errors%%
		<br><br>
		<a href=&#34;javascript:history.back()&#34;>&laquo; Go Back</a>
	</div>
</div>';
$oFCKeditor=new FCKeditor("confirm_html");
$oFCKeditor->BasePath="./FCKeditor/";
$oFCKeditor->Height="300";
$oFCKeditor->Width="650";
$oFCKeditor->ToolbarSet = 'Basic';
$oFCKeditor->Value=$confirm_html;
$smarty->assign("fkeditor", $oFCKeditor->CreateHtml()) ;

$smarty->assign('confirm_html',$confirm_html);

$smarty->assign('formDet',$formDet);
$smarty->assign('qrapp',$qrapp);

$smarty->display('form_makeerror.tpl');

?>