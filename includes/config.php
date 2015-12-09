<?php
global $dbDetails;
global $configDetails;

	$dbDetails['hostName']				= "localhost";  
	$dbDetails['userName']				= "root";
	$dbDetails['userPassword']			= "mindlabs";
	$dbDetails['dbName']				= "flockmails_refined";
	define('HOST_NAME',$dbDetails['hostName']);
	define('DB_USER_NAME',$dbDetails['userName']);
	define('DB_PASSWORD',$dbDetails['userPassword']);
	define('DB_NAME',$dbDetails['dbName']);
	$configDetails['sitePath']					= "http://localhost/flockmails-git/";
	$configDetails['siteUrl']					= "http://localhost/flockmails-git/";
	
	
	$configDetails['sessionSave']					= "";
	//$configDetails['sessionSave']					= "user"; // values can be user,memcached,database. put as null itself for normal session
	
	$configDetails['uploadDirectory']					= "upload/";	
	
	$configDetails['imagesDirectory']			= "img/";
	
	$configDetails['SMTP_USERNAME']				= 'no-reply@flockmails_refined.com';
	$configDetails['SMTP_PASSWORD']				= 'flockmails_refinedpass';
	
	$configDetails['SITE_NUMBER_PREFIX']		= "ELWD";
	
	$configDetails['SITE_NAME']					= "FlockMails";
	$configDetails['SITE_TITLE']				= "Welcome to FlockMails :: ";
	$configDetails['domainName']				= "flockmails_refined.com";
	
?>
