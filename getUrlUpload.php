<?php

use google\appengine\api\cloud_storage\CloudStorageTools;

$options = [ 'gs_bucket_name' => 'test-app-124310.appspot.com' ];
$upload_url = CloudStorageTools::createUploadUrl('/upload.php', $options);

echo $upload_url;
