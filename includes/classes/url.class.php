<?php
/* 
Owner	:: MLS020
Description		:: this class handles all urls & image paths.  */
class url extends db
{
	public $urlBase; // decalre variable for url path
	public $urlImageBase; // decalre variable for image folder path
	
	public function __construct()
	{
		parent::__construct(); 
		global $configDetails;
		$themeDetails			= $this->getRequiredFieldsSingle('site_themes',"theme_status=? ORDER BY theme_id ASC LIMIT 0,1",$conditionValue=array('1'),'theme_path');
		if($themeDetails['theme_path']!='') $theme_path = _output($themeDetails['theme_path']);
		else $theme_path = DEFAULT_THEME_PATH;
		$this->urlBase 			= $configDetails['sitePath'];  //  site path from  config file(config.php)
		$this->urlAssetsBase 	= $configDetails['sitePath'].$theme_path; 
		$this->urlImageBase 	= $configDetails['sitePath'].$theme_path.$configDetails['imagesDirectory']; 
		
	}
	
	function get_permalink($url,$content_name,$querystring)
		{
		
			$getmod=false;
			if($getmod==true)
			{
				if($querystring!="")
				{
					$querarr=explode("?",$querystring);
					for($i=0;$i<count($querarr);$i++)
					{
						$withequal=$querarr[$i];
						$withouequalarr=explode("=",$withequal);
						$querrywithslahs=$withouequalarr[1]."/";
						
					}
				}
			
				if($url=='index.php')
				{
				$permalink="Home";
				}
				else if($url=='register.php')
				{
				$permalink="Signup";
				}
				else if($url=='login.php')
				{
				$permalink="Login";
				}
				else if($url=='content.php')
				{
					$permalink="Contents/".$content_name;
				}
				else
				{
				$permalink="Home";
				}
				
			}
			else
			{
				if($url=='index.php')
				{
				$permalink="index.php";
				}
				else if($url=='register.php')
				{
				$permalink="register.php";
				}
				else if($url=='login.php')
				{
				$permalink="login.php";
				}
				else if($url=='content.php')
				{
					$permalink="content.php?".$querystring;
				}
				else
				{
				$permalink="index.php";
				}
			
			}
		
		return $permalink;
		}
}
?>