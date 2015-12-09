<?php
/*
Owner	:: MLS020
This file contains all the files necessary for working of site.
*/
session_start();
ini_set('session.gc_maxlifetime', 3*60*60);
error_reporting(0);
require_once './includes/config.php'; # includes database connection parameters and other necessary configuration values
include_once('./includes/constants.php'); // file containing all the necessary constants
spl_autoload_register('load_classes'); // loads necessary classes
spl_autoload_register('load_smarty'); // includes necessary classes for smarty

function load_classes($class){
    if(!file_exists(dirname(__FILE__).DS."includes".DS."classes".DS.$class.'.class.php') )
        return false;
    include_once(dirname(__FILE__).DS."includes".DS."classes".DS.$class.'.class.php');
    return true;
}
function load_smarty($class){
    if( !file_exists(dirname(__FILE__).DS.'Smarty'.DS.'libs'.DS.'Smarty.class.php') )
        return false;
    include_once(dirname(__FILE__).DS.'Smarty'.DS.'libs'.DS.'Smarty.class.php');
    return true;
}

include_once('./includes/functions.php'); 
$dbClass		= (object) new db(); // create object of database class

$homeObj			= (object) new home(); // create object of product class

$smarty = new Smarty;
$smarty->caching = false;
//$smarty->compile_check = false;
$smarty->force_compile = true;
$smarty->setTemplateDir(dirname(__FILE__).DS.'smarty-temp'.DS.'templates');
$smarty->setCompileDir(dirname(__FILE__).DS.'smarty-temp'.DS.'templates_c');
$smarty->setCacheDir(dirname(__FILE__).DS.'smarty-temp'.DS.'cache');
$smarty->setConfigDir(dirname(__FILE__).DS.'smarty-temp'.DS.'configs');
//$smarty->testInstall();

$url				= (object) new url(); // create object of url class
$smarty->assign('url',$url);
$smarty->assign('configDetails',$configDetails);
?>