<?php
//https://michelf.ca/projects/php-markdown/
require_once 'md_lib/Michelf/MarkdownExtra.inc.php';
require_once '../function.php';
require_once '../config.php';

//prüfen ob Bearbeitungsmodus an
$editable = 'false';
if (isset($_COOKIE['DM_logged_in'])) {
    $editable = $_COOKIE['DM_logged_in'];
}



$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 2;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uploadMessage = '';


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadMessage = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $uploadMessage =  "File is not an image.";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadMessage =  "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $uploadMessage =  "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    //if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    //&& $imageFileType != "gif" ) {
    //    $uploadMessage =  "Sorry, only JPG., JPEG, PNG & GIF files are allowed.";
    //    $uploadOk = 0;
    //}
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //$uploadMessage =  "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $uploadMessage =  "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            $uploadMessage =  "Sorry, there was an error uploading your file.";
        }
    }

}
?>

    <!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php echo $documentation_title; ?>
        </title>
        
        <title>DocuMate: MediaLibrary</title>

        <link rel="stylesheet" type="text/css" href="../themes/<?php echo $theme; ?>.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/default.css">
        
    </head>

    <body>
        
        
        <div class="wrapper" style="margin: 25px;">
            <h1>Upload a new file:</h1>
            
            
            <?php if ($uploadOk == 1):?>
                <div class="uploadMessage success">
                    <?php echo $uploadMessage; ?>
                </div>
            <?php elseif ($uploadOk == 0):?>
                <div class="uploadMessage error">
                    <?php echo $uploadMessage; ?>
                </div>
            <?php endif?>
            
            
            
            <form action="media-upload.php" method="post" enctype="multipart/form-data">
                <p>
                    Select image to upload:
                </p>
                <input type="file" name="fileToUpload" id="fileToUpload" class="edit_btn" style="width: 95%;">
                <input type="submit" value="Upload Image" name="submit" class="btn" style="float: none;">
            </form>
            
            
            
            

        </div>
        
        
        
    </body>

</html>









