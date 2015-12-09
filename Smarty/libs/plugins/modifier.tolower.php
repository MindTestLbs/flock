<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty convert string to lower case plugin
 *
 * Type:     modifier<br>
 * Name:     tolower<br>
 * Purpose:  convert string to lower case
 * @author   mls048
 * @param string
 * @return string
 */
function smarty_modifier_tolower($string)
{
    return strtolower(trim($string));
}

?>