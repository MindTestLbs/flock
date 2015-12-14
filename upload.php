<?php
include_once('./includes.php');

if ($_POST["label"]) {
    $label = $_POST["label"];
}

$returnVal = "";

$filePath = $configDetails['user_files'].$_SESSION['SesUserId'];

$allowedExts = array("gif", "jpeg", "jpg", "png","html","doc","pdf","docx");
$filename           = trim($_FILES['file']['name']);
$extension          = getFileDet($filename,"ext");
$extension          = strtolower($extension);	
        
if (($_FILES["file"]["size"] < 200000) && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo '<div class="error">Return Code: ' . $_FILES["file"]["error"] . "</div>";
    } else {
        if (file_exists($filePath."/". $filename)) {
           echo '<div class="error">'.$filename . ' already exists. </div>';
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],$filePath."/".$filename);
            chmod($filePath."/".$filename,0777);
        }
    }
} else {
    echo '<div class="error">Invalid file</div>';
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
if(count($userFiles)>0)
{
    echo '<ul>';
        foreach($userFiles as $item)
        {
            ?>
              <li>
                <div class="row">
                    <div class="col-md-2 col-sm-3">
                        <div class="file-img">
                            <a href="<?php echo $url->urlBase.$filePath.'/'.$item['file'];?>" target="_blank"> <img src="<?php echo $item['img'];?>" class="img-responsive"></a>
       
                        </div><!-- file-img -->
                    </div>
                    <div class="col-lg-7 col-sm-9">
                        <div class="file-content">
                            <h5><?php echo $item['filename'];?></h5>
                            <p>File Type : <?php echo $item['extension'];?> | Size : <?php echo $item['file_size'];?>
                            </p>
                        </div>
                    </div>
                    <div class="visible-md col-xs-12"></div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="cpy-url">
                            <div class="cpy-bt" data-clipboard-text="<?php echo $url->urlBase.$filePath.'/'.$item['file'];?>">Copy URL</div>
                            
                            <div class="file-del">
                                <img src="<?php echo $url->urlAssetsBase;?>img/delete-icon.png" onclick="deleteFile('<?php echo $item['file'];?>')">
                            </div>

                        </div><!-- cpy-url -->
                    </div>
                </div>
            </li>
            <?php
        }
    
    echo '</ul>';
}

?>
<script type="text/javascript">
      var client = new ZeroClipboard( $('.cpy-bt') );

      client.on( 'ready', function(event) {
        //alert( 'movie is loaded' );

        client.on( 'copy', function(event) {
          event.clipboardData.setData('text/plain', event.target.id.value);
        } );

        client.on( 'aftercopy', function(event) {
         //alert('Copied text to clipboard: ' + event.data['text/plain']);
         alert('URL copied');
        } );
      } );

      client.on( 'error', function(event) {
        // console.log( 'ZeroClipboard error of type "' + event.name + '": ' + event.message );
        ZeroClipboard.destroy();
      } );
    </script>
  