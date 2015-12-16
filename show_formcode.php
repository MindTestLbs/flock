<?php
include_once('./includes.php');
include_once('./member_header.php');
$pageTitle = "Show Form Script";
$pageName = "show_formcode.php";
$smarty->assign('pageName',$pageName);
$smarty->assign('pageTitle',$pageTitle);

$form_id 							= base64_decode(base64_decode($_REQUEST['formId']));
$qrapp='<input type="hidden" name="formId" value="'.$_REQUEST['formId'].'">';
$formDet	= $dbClass->getTableRecordSingle("user_forms","form_id=?",array($form_id));
$numformDet	= $dbClass->getAffectedRows();

$FormcustomFields=$dbClass->getTableRecordDetails("form_custom_fields"," form_id=? order by sort_order asc ",array($form_id));
$contactLists=$dbClass->getTableRecordDetails("form_lists"," form_id=? ",array($form_id));
$numcontactLists	= $dbClass->getAffectedRows();

if($formDet['form_type']!='f')
{
	if($numformDet>0)
	{
		
		$formapp='<!--
		Do not modify the NAME value of any of the INPUT fields
		the FORM action, or any of the hidden fields (eg. input type=hidden).
		These are all required for this form to function correctly.
		-->
		';
		
		if($formDet['use_captcha']=='1')
		{
		
		$formapp.='<script type="text/javascript">
		';
		$formapp.='var a = Math.ceil(Math.random() * 10);
		';
		$formapp.='var b = Math.ceil(Math.random() * 10);
		';       
		$formapp.='var c = a + b;
		';
		$formapp.='function DrawBotBoot()
		';
		$formapp.='{
		';
		
		$formapp.='document.write("<tr><td>What is "+ a + " + " + b +" ? </td>");
		';
		$formapp.='document.write("<td> : </td><td><input id=\'BotBootInput\' type=\'text\' maxlength=\'2\' size=\'2\'/></td></tr>");
		';
		
		$formapp.='}';  
		$formapp.='function ValidBotBoot(){
		';
		$formapp.='var d = document.getElementById(\'BotBootInput\').value;
		';
		$formapp.='if (d == c)
		';
		$formapp.='{return true;}
		';
		$formapp.='else
		';
		$formapp.='{
		';
		$formapp.='alert(\'Wrong secutiry code\');
		';
		$formapp.='return false
		';
		$formapp.='}
		';
		$formapp.='}
		';
		$formapp.='</script>
		';
		
		}
		
		if($formDet['use_captcha']=='1')
		{
			$dtaval='onsubmit="return ValidBotBoot();"';
		}
		else
		{
			$dtaval='';
		}
		$formapp.='<form method="post" action="'.$configDetails['siteUrl'].'formaction.php?form='.$form_id.'" '.$dtaval.'>
		';
		$formapp.='<table border="0" cellpadding="2" class="myForm" bgcolor="'.$formDet['design_color'].'" style="color:'.$formDet['letter_color'].'">
		';
			if(count($FormcustomFields)>0)
			{
			foreach($FormcustomFields as $customKey=>$customVal)
			{
				$custom_id	=$customVal['custom_field_id'];
				if($custom_id=='e')
				{
					$formapp.='<tr>
					';
					$formapp.='<td>Email Address<font color="red">*</font></td>
					';
					$formapp.='<td> : </td>';
					$formapp.='<td><input type="text" name="emailId" size="30"></td>
					';
					$formapp.='</tr>
					';
				}
				else if($custom_id=='n')
				{
					$formapp.='<tr>
					';
					$formapp.='<td>Name<font color="red"></font></td>
					';
					$formapp.='<td> : </td>';
					$formapp.='<td><input type="text" name="fullname" size="30"></td>
					';
					$formapp.='</tr>
					';
				}
				else if($custom_id=='c')
				{
					$formapp.='<tr>
					';
					$formapp.='<td>Select Contact Format<font color="red">*</font></td>
					';
					$formapp.='<td> : </td>
					';
					$formapp.='<td>
					';
					
					
						$formapp.='<select name="form_format">
						';
						$formapp.='<option value="fh">HTML</option>
							';
						$formapp.='<option value="ft">Text</option>
							';
						$formapp.='</select>
						';
					
				
					$formapp.='</td>
					';
					$formapp.='</tr>
					';
				}
				
			}
			
			}
			
			if($numcontactLists>0)
			{
			
				$formapp.='<tr>
				';
				$formapp.='<td>Select Contact List<font color="red">*</font></td>
				';
				$formapp.='<td> : </td>
				';
				$formapp.='<td>
				';
				
					foreach($contactLists as $listKey=>$listValue)
					{
						$listDet=$dbClass->getTableRecordSingle("contact_lists","list_id=?",array($listValue['list_id']));
						$formapp.='<input type="checkbox" name="contactlist[]" value="'.$listValue['list_id'].'">'.$listDet['list_name'].'<br />
						';
					}
				
			
				$formapp.='</td>
				';
				$formapp.='</tr>
				';
			
			}
					
					
			if($formDet['use_captcha']=='1')
			{
				$formapp.='<script type="text/javascript">DrawBotBoot()</script>';
			
			}
			$formapp.='<tr><td colspan="3" align="center"><input type="submit" name="submit"  value="submit"></td></tr>
			';
			$formapp.='</table>
			';
			
			$formapp.='</form>
			';
		
	}
}
else
{
	$formapp='<!--
		Do not modify the NAME value of any of the INPUT fields
		the FORM action, or any of the hidden fields (eg. input type=hidden).
		These are all required for this form to function correctly.
		-->
		';
		
		$formapp.='<form method="post" action="'.$configDetails['siteUrl'].'formaction.php?form='.$form_id.'">

<table border="0" cellpadding="2" bgcolor="'.$formDet['design_color'].'" style="color:'.$formDet['letter_color'].'">
	<tr>
		<td>Your Name : </td>

		<td><input type="text" name="myname" value="" /></td>
	</tr>
	<tr>
		<td>Your Email Address : </td>
		<td><input type="text" name="myemail"  /></td>
	</tr>
	<tr>
		<td>Your Friends Name : </td>

		<td><input type="text" name="friendsname"  /></td>
	</tr>
	<tr>
		<td>Your Friends Email Address : </td>
		<td><input type="text" name="friendsemail"  /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>

		<td><textarea name="introduction" rows="5" cols="30">Hey, I found this really interesting newsletter that I thought you might like to read for yourself.</textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="submit" value="Send to your friend" /></td>
	</tr>
</table>

</form>
';
}

	$updateForm['form_html']	=$formapp;
	$dbClass->prepareUpdateStatement("user_forms", $updateForm, 'form_id=?',array($form_id));
	

$smarty->assign('formapp',$formapp);
$smarty->display('show_formcode.tpl');



?>