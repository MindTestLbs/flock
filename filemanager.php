<?php

$filePath = $configDetails['user_files'].$_SESSION['SesUserId'];
if (!file_exists($filePath)) {
    mkdir($filePath, 0777,true);
   chmod($filePath, 0777);
}

$userFiles = array();
$files = scandir($filePath);
$k=0;
foreach($files as $file) {
    if($file == '.' || $file == '..') continue;
    else
    {
       $userFiles[$k]['file'] =  $file;
       $path_details=pathinfo($filePath."/".$file);
       $userFiles[$k]['filename'] =  $path_details['filename'];
       $userFiles[$k]['extension'] =  $path_details['extension'];
       $userFiles[$k]['file_size'] =  filesize_formatted($filePath."/".$file);
       $userFiles[$k]['img'] =  getFilePic($filePath."/".$file,$path_details['extension']);
       $k+=1;
    }
}
$smarty->assign('filePath',$filePath);
$smarty->assign('userfilecnt',count($userFiles));
$smarty->assign('userFiles',$userFiles);

?>