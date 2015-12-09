<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty html entity deocde plugin
 *
 * Type:     modifier<br>
 * Name:     htmlentitydecode<br>
 * Purpose:  convert a numeric in number format
 * @author   Nathan Grebowiec <njgrebo at gmail dot com>
 * @param string
 * @return string
 */
function smarty_modifier_htmlentitydecode($string)
{
    return html_entity_decode(trim(stripslashes($string)));
}

?>