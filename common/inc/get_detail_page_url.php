<?php
    $current_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(strpos($current_url, '&mode=cat')){
    	echo '<meta name="robots" content="noindex">'; 
    }
?>
