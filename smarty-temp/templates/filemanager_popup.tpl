    <section class="file-manager-popup">
    	<div class="file-manager-base">
            <div class="file-head">
               <div class="row">
                   <form method="post" id="fileinfo" name="fileinfo" onsubmit="return submitForm();">
                    <div class="col-lg-5 col-sm-6">
                            <div class="cm-file-chooser">
                                <input type="file" name="file" class="cm-file-upload" value="Upload">
                            </div><!-- cm-file-chooser -->
                    </div>
                    <div class="col-lg-2 col-sm-6">
                            <div class="flr-upload-bt">
                                    <input type="submit" class="cm-submit" value="Upload">
                            </div>
                    </div>
                  </form>
            </div>
            </div><!-- file-head -->
            <div class="file-list" id="fileslist">
                {if ( $userfilecnt > 0 )}
                <ul>
                    {foreach $userFiles as $item}
                        <li>
                            <div class="row">
                                <div class="col-md-2 col-sm-3">
                                    <div class="file-img">
                                        <a href="{$url->urlBase}{$filePath}/{$item.file}" target="_blank"> <img src="{$item.img}" class="img-responsive"></a>
                                        
                                    </div><!-- file-img -->
                                </div>
                                <div class="col-lg-7 col-sm-9">
                                    <div class="file-content">
                                        <h5>{$item.filename}</h5>
                                        <p>File Type : {$item.extension|strtoupper} | Size : {$item.file_size}
                                        </p>
                                    </div>
                                </div>
                                <div class="visible-md col-xs-12"></div>
                                <div class="col-lg-3 col-sm-12">
                                    <div class="cpy-url">
                                        <div class="cpy-bt" data-clipboard-text="{$url->urlBase}{$filePath}/{$item.file}">Copy URL</div>
                                        <div class="file-del">
                                            <img src="{$url->urlAssetsBase}img/delete-icon.png" onclick="deleteFile('{$item.file}')">
                                        </div>
                                    </div><!-- cpy-url -->
                                    
                                    
                                        
                                </div>
                            </div>
                        </li>
                    {/foreach}
                </ul>
                {/if}

            </div><!-- file-list -->
            <a href="javascript:void(0)" class="popup-close"></a>
        </div><!-- file-manager-base -->
    </section>
 <script type="text/javascript" src="{$url->urlBase}js/ZeroClipboard.min.js"></script>
 
<script type="text/javascript">
        function submitForm() {
            var fd = new FormData(document.getElementById("fileinfo"));
            fd.append("label", "WEBUPLOAD");
            $.ajax({
              url: "upload.php",
              type: "POST",
              data: fd,
              enctype: 'multipart/form-data',
              processData: false,  // tell jQuery not to process the data
              contentType: false   // tell jQuery not to set contentType
            }).success(function(data) {
               // alert( data );
                $("#fileslist").html(data);
            });
            return false;
        }
        
        function deleteFile(delfile)
        {
            if(delfile!='')
            {

                $.ajax({
                    type:"GET",
                    url : "deleteFile.php",
                    data : "delfile="+delfile,
                    async: false,
                    success : function(response) {
                            $("#fileslist").html(response);
                    },
                    error: function() {
                            alert('Error occured');
                    }
                });
            }
            else
            {
                alert('Please select the course field')
            }
                        
        }
        
    </script>