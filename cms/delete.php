<?php
require_once '../config.php';









?>


    <!DOCTYPE html>
    <html lang="de">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete file or directory!</title>

        <link rel="stylesheet" type="text/css" href="../themes/<?php echo $theme; ?>.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/default.css">


    </head>

    <body>
        <div class="wrapper" style="margin-top: 50px;">

            <?php 
            

            $file = $_GET['del'];
            $file = str_replace('../', '', $file);

            if(isset($_GET["action"]) <> ''){
                $action = $_GET['action'];
                $del = $_GET['del'];
                $del = '../' . $del;

                if ($action == "delete"){
                    // wenn wirklich gelöscht werden soll, dann löschen
                    
                        if(is_dir($del)) {
                            //Löscht das angegebene Verzeichnis
                            rmdir($del);
                        } else {
                            //Löscht die angegebene Datei
                            unlink($del);
                        }
                    
                    echo '<h1>The file/directory was successfully deleted! <blockquote>' . $file . '</blockquote></h1>';
                    echo '<a href="../" target="_parent"><div class="btn" style="background: #f16161;">Back to page</div></a>';
                
                } else {
                    
                    //Vorher nachfragen, ob wirklich gelöscht werden soll
                    echo '<h1>Do you really wanna delete the file/directory? <blockquote>' . $file . '</blockquote></h1>';
                    echo '<a href="../?site=' . $file . '" target="_parent"><div class="btn" style="background: #f16161;">Cancel</div></a>';
                    echo '<a href="delete.php?action=delete&del=' . $file . '"><div class="btn">Delete</div></a>';
                }
               
            } 
          
          ?>

        </div>


    </body>

    </html>