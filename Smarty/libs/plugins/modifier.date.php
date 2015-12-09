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
 * Name:     date<br>
 * Purpose:  convert date to F d, yyyy format
 * @author   mls048
 * @param string
 * @return string
 */
function smarty_modifier_date($string)
{
    return date('F d, Y',strtotime($string));
}

?>