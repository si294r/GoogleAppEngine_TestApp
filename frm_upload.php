<?php

use google\appengine\api\cloud_storage\CloudStorageTools;

$options = [ 'gs_bucket_name' => 'test-app-124310.appspot.com' ];
$upload_url = CloudStorageTools::createUploadUrl('/upload.php', $options);

?>
<!DOCTYPE html>
<html>
<body>

<form action="<?php echo $upload_url ?>" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>