<?php
require_once '../config.php';
$path    = '../uploads';

?>


    <!DOCTYPE html>
    <html lang="de">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your media-library</title>

        <link rel="stylesheet" type="text/css" href="../themes/<?php echo $theme; ?>.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/default.css">


    </head>

    <body>
        <div class="wrapper" style="margin-top: 50px;">
        <h1>Your current media-library</h1>
        <ul>

<?php 

if ($handle = opendir($path)) {
    while (false !== ($entry = readdir($handle))) {
        
        if ($entry != "." && $entry != "..") {
            echo '<li><a href="../uploads/' . $entry . '" target="_blank">' . $entry . ' ↗</br><img src="../uploads/' . $entry . '" style="width: 150px;"></a><br><pre>![your-image-description](' . $_SERVER['HTTP_HOST'] . '/uploads/' . $entry . ']</pre></li>';
        }
    }
    closedir($handle);
}
?>
</ul>
</div>


</body>

</html>