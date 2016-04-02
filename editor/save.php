<?php
require_once '../config.php';


$file = $_POST['file'];
$content = $_POST['code'];

// Öffnet die Datei, um den vorhandenen Inhalt zu laden
$current = file_get_contents($file);

// Fügt eine neue Person zur Datei hinzu
$current = $content;
    
// Schreibt den Inhalt in die Datei zurück
file_put_contents($file, $current);

$file = str_replace('../', '', $file);


?>


    <!DOCTYPE html>
    <html lang="de">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>File saved!</title>
        
        <link rel="stylesheet" type="text/css" href="../themes/<?php echo $theme; ?>.css">
        
        <style>
        .btn{
            border: 0px solid #FFFFFF;
            color: #FFFFFF;
            padding: 10px;
            background: linear-gradient(#5DD09F, #4EA982);
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            outline: none;
            float: left;
            margin: 10px;
        }
        
        .btn:hover{
            box-shadow: 0 0 5px #A5A5A5;
            background: linear-gradient(#6DEFB7, #62D2A2);
        }
        .btn:active{
            box-shadow: 0 0 5px #A5A5A5 inset;
        }


        
        </style>

    </head>

    <body>
        <div style="width: 500px; margin: auto;box-shadow: 0 0 15px #f9f9f9;">
            
            <?php 
                echo '<h1>The File "' . $file . '" was saved!</h1>';
                echo '<a href="../?site=' . $file . '"><div class="btn">Show page</div></a>';
                echo '<a href="../editor/?site=' . $file . '"><div class="btn">Continue editing</div></a>';
          ?>

        </div>


    </body>

    </html>