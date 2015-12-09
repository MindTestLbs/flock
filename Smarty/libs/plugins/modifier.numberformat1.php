<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty number format plugin
 *
 * Type:     modifier<br>
 * Name:     numberformat<br>
 * Purpose:  convert a numeric in number format with one decimal place
 * @author   Nathan Grebowiec <njgrebo at gmail dot com>
 * @param string
 * @return string
 */
function smarty_modifier_numberformat1($string)
{
    return number_format(trim($string),1);
}

?>