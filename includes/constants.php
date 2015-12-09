<?php
//define('DOC_ROOT','/var/www/mobileportal/');
define('REQUIRED','<span class="required errmsg">*</span>');
define('REQUIRED_MSG',' (<font color=#990000>*</font>) Mandatory Fields');

define('DOC_ROOT',getenv("DOCUMENT_ROOT").'/electroworld/');
define('CLASS_PATH','./includes/classes/'); 
define('DS',DIRECTORY_SEPARATOR);
define('DEFAULT_THEME_PATH','themes/basic/'); 
define('template_text_content','Your email client cannot read this email.
To view it online, please go here: %%webversion%%


To stop receiving these emails:%%unsubscribelink%%');
?>