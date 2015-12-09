<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty find length of string plugin
 *
 * Type:     modifier<br>
 * Name:     strlen<br>
 * Purpose:  find legth of string
 * @author   mls048
 * @param string
 * @return string
 */
function smarty_modifier_strlen($string)
{
    return strlen(trim(stripslashes($string)));
}

?>