<?php

$target_dir = "gs://test-app-124310.appspot.com/";
$target_file = $target_dir .date("YmdHis_"). basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$mysqli = new mysqli(null, 'usertest', 'password', 'testdb', null, '/cloudsql/test-app-124310:testapp');

$sql = "Insert Into t_upload Set filename=?, filedata=?, created_date=now(), updated_date=now()";

if ($stmt = $mysqli->prepare($sql)) {

    /* bind parameters for markers */
    $filename = $target_file; // string = s
    $null = NULL; // dummy blob = b

    $stmt->bind_param("sb", $filename, $null);
    $stmt->send_long_data(1, file_get_contents($target_file));

    /* execute query */
    $stmt->execute();

    /* close statement */
    $stmt->close();
}

/* close connection */
$mysqli->close();

?>