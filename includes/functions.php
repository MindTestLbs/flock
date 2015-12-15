<?php

function getAddressUrl() {
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

function pageRedirection($location)
{
	if(!headers_sent())
	{
		header("Location:$location");
		exit;
	}
	else
	{
	?>
		<script language="javascript">
		window.location.href = "<?PHP echo $location;?>";
		</script>
	<?php
	}		
}

function _output($data)
{
	return stripslashes(stripslashes(stripslashes(trim($data))));
}

function getFileDet($filename,$type='ext')
{
	$filename = strtolower($filename);
	$exts = split("[/\\.]", $filename);
	if($type=='ext')
	{
		$n = count($exts)-1;
		$exts = $exts[$n];
		return $exts;
	}else{
		$extst="";
		for($h=0;$h<=count($exts)-2;$h++)
		{
		$extst.=$exts[$h];
		}
		return $extst;
	}
}

		
	function base64encode($str)
	{
	   //$str = base64_encode($str);
	   return $str;
	}
	function base64decode($str)
	{
	  // $str = base64_decode($str);
	   return $str;
	}
	
	
	function Set_Cookie($cookie_name,$cookie_val)
	{
		setcookie($cookie_name,$cookie_val, time()+60*60*24*7,"/");
	}
		
	/* this function is for deleting cokie values */
	function deleteCookie($cookie_name)
	{
		setcookie($cookie_name,'',time() - 3600,"/");
	}
	
	// Function to generate a randome password
	//=======================================================================================
			function rand_pass()
			{
			
			  $array = array(
					 "ap","dus","tin","rog","sti","rev","pik","sty","lev","qot","rel","vid",
					 "kro","xo","pro","wia","axi","jer","foh","mu","ya","zol","gu","pli","cra",
					 "den","bi","sat","ry","qui","wip","fla","gro","tav","peh","gil","lot",
					 "ben","us","rea","pwd","kls","jit","jan","me","uk","can","be","den","sea",
					 "cel","bak","esc","mic","sam","sun","son","rem","del","ins","cap","tab","she",
					 "men","dre","one","pen","car","sys","mov","avi","bel","feb","ced","gla","bus",
					 "anj","wom","res","man","riy","ann","rad","jen","jub","swp","shi","suj","ros",
					 "121","345","355","975","376","269","478","368","257","987","246","257","987",
					 "kal","zan","noc","bat","tev","lun","pal","hom","cun","wos","bal","moh","jac","phi"
					 );
			
			  $num_letters = 6;
			  $uppercased = 2;
			  mt_srand((double)microtime()*1000000);
			  for($i=0; $i<$num_letters; $i++)
				$pass .= $array[mt_rand(0, (count($array) - 1))];
			
			  for($i=1; $i<strlen($pass); $i++) {
				if(substr($pass, $i, 1) == substr($pass, $i-1, 1))
				 $pass = substr($pass, 0, $i) . substr($pass, $i+1);
			  }
			
			  for($i=0; $i<strlen($pass); $i++) {
				if(mt_rand(0, $uppercased) == 0)
				 $pass = substr($pass,0,$i) . strtoupper(substr($pass, $i,1)) . substr($pass, $i+1);
			  }
			
			  $pass = substr($pass, 0, $num_letters);
			  return $pass;
			}
			

	function _random_generateNumber()
	{  	
		$number=md5(uniqid(rand(),1));
		return $number; 	
	}
	


	
	function getEncryptKey()
	{
		return base64_encode('672345761');
	}
	
	function encryptPaswd($string, $key) 
	{
		$result = '';
		for($i=0; $i<strlen($string); $i++) 
			{
				$char = substr($string, $i, 1);
				$keychar = substr($key, ($i % strlen($key))-1, 1);
				$char = chr(ord($char)+ord($keychar));
				$result.=$char;
			}
			return base64_encode($result);
		}
		
		function decryptPaswd($string, $key) 
		{
			$result = '';
			$string = base64_decode($string);
			
			for($i=0; $i<strlen($string); $i++) 
			{
				$char = substr($string, $i, 1);
				$keychar = substr($key, ($i % strlen($key))-1, 1);
				$char = chr(ord($char)-ord($keychar));
				$result.=$char;
			}
			
			return $result;
		}
		
		///Function to get the encrypted customer password-
		function encrypt_customer_password($paswd)
		{
			$mykey=getEncryptKey();
			$encryptedPassword=encryptPaswd($paswd,$mykey);
			return $encryptedPassword;
		}
		
		///Function to get the decrypted customer password
		function decrypt_customer_password($paswd)
		{
			$mykey=getEncryptKey();
			$decryptedPassword=decryptPaswd($paswd,$mykey);
			return $decryptedPassword;
		}
		
		function getEncpasd($paswd)
		{
			$newpsd='123zys'.base64_encode($paswd).'zys321';
			$encrpted= base64_encode($newpsd);
			return $encrpted;
		}
		
		function addcurrTime($hours=0, $minutes=0, $seconds=0, $months=0, $days=0, $years=0)
		{
			$totalHours = date("H") + $hours;
			$totalMinutes = date("i") + $minutes;
			$totalSeconds = date("s") + $seconds;
			$totalMonths = date("m") + $months;
			$totalDays = date("d") + $days;
			$totalYears = date("Y") + $years;
			$timeStamp = mktime($totalHours, $totalMinutes, $totalSeconds, $totalMonths,
			$totalDays, $totalYears);
			$myTime = date("Y-m-d H:i:s A", $timeStamp);
			return $myTime;
		}
                
                function GeturlContents($url='')
		{
			if (!$url) {
				return array(false, 'No URL');
			}
		
			if (function_exists('curl_init')) {
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_FAILONERROR, true);
				if (!ini_get('safe_mode') && !ini_get('open_basedir')) {
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				}
				curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		
				$pageData = curl_exec($ch);
		
				if (!$pageData) {
					$error = curl_error($ch);
				}
				curl_close($ch);
		
				if (!$pageData) {
					return array(false, $error);
				}
				return array($pageData, true);
			}
		
			if (!ini_get('allow_url_fopen')) {
				return array(false, 'no curl or fopen support');
			}
		
			if (!@$fp = fopen($url, "rb")) {
				return array(false, 'cant read url');
			}
		
			// Grab the files content
			$pageData = "";
		
			while (!feof($fp)) {
				$pageData .= fgets($fp, 4096);
			}
		
			fclose($fp);
		
			return array($pageData, true);
		}
                
                
                function sonKey()
                {
                    return "flockEnct";
                }
                function sonEncode($str)
                {
                    $key = sonKey();
                    return strtr(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $str, MCRYPT_MODE_CBC, md5(md5($key)))), '+/=', '-_~');

                }
                function sonDecode($encoded)
                {
                    $key = sonKey();
                    return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode(strtr($encoded, '-_~', '+/=')), MCRYPT_MODE_CBC, md5(md5($key))), "");
                }
                
                
                function filesize_formatted($path)
                {
                    $size = filesize($path);
                    $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
                    $power = $size > 0 ? floor(log($size, 1024)) : 0;
                    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
                }
	
	?>