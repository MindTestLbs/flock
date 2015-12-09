<?php
/*
 *     Smarty plugin
 * -------------------------------------------------------------
 * File:        function.agot.php
 * Type:        function
 * Name:        ago
 * Description: This TAG creates a "1 day ago" like timestamp.
 *
 * -------------------------------------------------------------
 * @license GNU Public License (GPL)
 *
 * -------------------------------------------------------------
 * Parameter:
 * - ts         = the timestamp to create the ago time
 * -------------------------------------------------------------
 * Example usage:
 *
 * {ago ts="3434323"}
 */
 
 function smarty_function_ago($params, &$smarty) {
 
    if(!isset($params['ts'])) {
        return;
    }
	$timeArray = explode(':',$params['ts']);
	$agodata="";
	  if($timeArray[0]>0)
		{
		  $day=floor($timeArray[0]/24);
		  $hour=$timeArray[0]%24;
		  $agohr= "";
		  if($day>0)
		   {
		     $months=floor($day/30);
			  if($months>0)
			    {
				 
				     if($months==1)
					  return number_format($months,0)." month ago";
					 else
					  return number_format($months,0)." months ago";
				}
			  else
			    return number_format($day,0)." days  ago";
		   }
		  else
		  {
		   
		   $remaining_min=$timeArray[1]%60;
		    if($remaining_min>0)
			   return number_format($hour,0)." hrs ago";
			else   
		       return   number_format($remaining_min,0)." hrs ago";
		  }
		}
		else
		{
		  if($timeArray[1]>0)
		   {
			 return number_format($timeArray[1],0)." mins ago";
		   }
		  else
		   {
			 return number_format($timeArray[2],0)." secs ago";
		   }
		}
}

?>