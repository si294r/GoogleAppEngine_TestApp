<?php

    // Test Running di lokal XAMPP

    $target_url = file_get_contents("http://test-app-124310.appspot.com/getUrlUpload.php?".date('YmdHis'));
    //This needs to be the full path to the file you want to send.
    
    $file_name = realpath("./images.jpeg");
    
    $post = array('fileToUpload'=>'@'.$file_name);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$target_url);
    curl_setopt($ch, CURLOPT_POST,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $result=curl_exec ($ch);
    curl_close ($ch);
    echo $result;

?>