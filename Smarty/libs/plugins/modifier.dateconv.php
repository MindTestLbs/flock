<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty date convert plugin
 *
 * Type:     modifier<br>
 * Name:     dateconv<br>
 * Purpose:  convert date to dd-mm-yyyy format
 * @author   mls048
 * @param string
 * @return string
 */
function smarty_modifier_dateconv($string)
{
    return date('F, Y',strtotime($string));
}

?>