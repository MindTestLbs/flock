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
 * Purpose:  convert a numeric in number format with 2 decimal place
 * @author   ms048
 * @param string
 * @return string
 */
function smarty_modifier_numberformat2($string)
{
    return number_format(trim($string),2);
}

?>