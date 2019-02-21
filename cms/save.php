<?php
require_once '../config.php';


$file = $_POST['file'];
$content = $_POST['code'];
$display_file_or_dir = 'directory';

if (is_dir($file) <> true){
    // Wenn kein Ordner, Dann Dateinhalt schreiben
    // Öffnet die Datei, um den vorhandenen Inhalt zu laden
    $current = file_get_contents($file);
    $current = $content;

    // Schreibt den Inhalt in die Datei zurück
    file_put_contents($file, $current);
    $display_file_or_dir = 'file';
}

//UMBENENNEN
if ($file <> $_POST['file_path'] . $_POST['file_name']){
    $newfile = $_POST['file_path'] .'/'. $_POST['file_name'];
    rename ($file, $newfile);
    if (is_dir($file)){
        $file = '../' . $documentation_folder . $start_page . '.md';
    } else{
        $file = $newfile;
    }
}





$file = str_replace('../', '', $file);


?>


    <!DOCTYPE html>
    <html lang="de">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>File saved!</title>
        
        <link rel="stylesheet" type="text/css" href="../themes/<?php echo $theme; ?>.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/default.css">


    </head>

    <body>
        <div class="wrapper" style="margin-top: 50px;">
            
            <?php 
                echo '<h1>The ' . $display_file_or_dir . ' was saved! <blockquote> ' . $file . ' </blockquote></h1>';
                echo '<a href="../?site=' . $file . '"><div class="btn">Show page</div></a>';
                echo '<a href="../cms/?site=' . $file . '"><div class="btn">Continue editing</div></a>';
          ?>

        </div>


    </body>

    </html>