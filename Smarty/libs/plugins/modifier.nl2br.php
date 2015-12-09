<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty new line to break convert plugin
 *
 * Type:     modifier<br>
 * Name:     nl2br<br>
 * Purpose:  convert new line to break
 * @author   mls048
 * @param string
 * @return string
 */
function smarty_modifier_nl2br($string)
{
    return nl2br(trim(stripslashes($string)));
}

?>