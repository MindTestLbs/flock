<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty slash stripping plugin
 *
 * Type:     modifier<br>
 * Name:     numberformat<br>
 * Purpose:  convert a numeric in number format
 * @author   Nathan Grebowiec <njgrebo at gmail dot com>
 * @param string
 * @return string
 */
function smarty_modifier_numberformat($string)
{
    return number_format(trim($string));
}

?>