<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Create Template";
$pageName = "createtemplates_next.php";
$smarty->assign('pageName',$pageName);
$smarty->assign('pageTitle',$pageTitle);

include_once('filemanager.php');

$extArray = array('html','doc','txt','docx');

if(isset($_REQUEST['uploaddoc']))
{
    extract($_POST);
    $errorFlag=0;
    if(preg_replace("/^\s*$/","",$template_name)=="")
    {
            $errorFlag=1;
            $errorList[]="Template Name required.";
    }
    if(preg_replace("/^\s*$/","",$_FILES['upfilecontent']['name'])=="")
    {
        $errorFlag=1;
        $errorList[]="Upload a file.";
    }
   else
    {
        $filename2=trim($_FILES['upfilecontent']['name']);
        $extension2=getFileDet($filename2,"ext");
        $extension2	=	strtolower($extension2);	
        if(in_array($extension2,$extArray))
        {
            $ext5=strrpos($filename2,".");
            $ext5=substr($filename2,$ext5);
            $uploaddir=$foldername."/";
            $uploadfile2 = "upls/".time().$ext5;
            $file_name2=time().$ext5;
            if(file_exists($uploadfile2))
            {
                    unlink($uploadfile2);
            }
             move_uploaded_file(trim($_FILES['upfilecontent']['tmp_name']),$uploadfile2);
             chmod($uploadfile2,0777);
             
             $page = file_get_contents($uploadfile2);
             $_POST['template_html_content']=$template_html_content = preg_replace('%<script[^>]*>.*?</script>%is', '', $page);
        }
        else
        {
                $errorFlag=1;
                $errorList[]="This type of files not allowed.";
        }
    }
}

if(isset($_POST['importurl']))
{
    extract($_POST);
    $errorFlag=0;
    if(preg_replace("/^\s*$/","",$template_name)=="")
    {
            $errorFlag=1;
            $errorList[]="Template Name required.";
    }
    if(preg_replace("/^\s*$/","",$urlimport)=="")
    {
            $errorFlag=1;
            $errorList[]="Url required.";
    }
    else
    {
            $importurl='http://'.$urlimport;
            $cont=GeturlContents($importurl);
            $_POST['template_html_content'] = $template_html_content=$cont[0];
    }
}
if(isset($_REQUEST['TemplateID']) && $_REQUEST['TemplateID']!="")
{
    $TemplateID = sonDecode($_REQUEST['TemplateID']);
    $filename=$url->urlBase.$TemplateID."/index.html";
    $cont=GeturlContents($filename);
    $_POST['template_html_content'] = $template_html_content=$cont[0];
}

if(isset($_REQUEST['submit']) && $_REQUEST['submit']=='Create')
{
    extract($_POST);
    $errorFlag=0;
    if(preg_replace("/^\s*$/","",$template_name)=="")
    {
            $errorFlag=1;
            $errorList[]="Template Name required.";
    }
    if(preg_replace("/^\s*$/","",$template_html_content)=="")
    {
            $errorFlag=1;
            $errorList[]="Template content required";
    }
    if($errorFlag===0)
    {
        $insertInfo['template_name']             = $template_name;
        $insertInfo['template_html_content']	= $template_html_content;
        $insertInfo['template_text_content']	= template_text_content;
        $insertInfo['template_user_id']		= $_SESSION['SesUserId'];
        $insertInfo['template_created_date']	='NOW()';
        $insertInfo['template_status']		= 1;
        $insertID=$dbClass->prepareInsertStatement("custom_templates ",$insertInfo);

        if(isset($insertID))
        {
            $confirmMessage = urlencode('Template details added successfully');
            $qryParameters .="&confirmMessage=".$confirmMessage;
            pageRedirection('custom_templates.php'.'?'.$qryParameters);	
        } 
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
$smarty->display('createtemplates_next.tpl');
?>