<?php

function fileUpload ($fileName) {
    $targetDir = "documents/";
    $imageFileType = strtolower(pathinfo($_FILES[$fileName]["name"], PATHINFO_EXTENSION));
    $randImgFile = rand(999, 9999) . '.' . $imageFileType;
    $targetFile = $targetDir . $randImgFile;
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES[$fileName]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES[$fileName]["size"] > 500000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }

    move_uploaded_file($_FILES[$fileName]["tmp_name"], $targetFile);
    return $randImgFile;
}