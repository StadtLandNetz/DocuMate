<?php
        require_once '../config.php';
        require_once '../function.php';
?>

    <!DOCTYPE html>
    <html lang="de">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add a file or directory!</title>

        <link rel="stylesheet" type="text/css" href="../themes/<?php echo $theme; ?>.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/default.css">


    </head>

    <body>
        <div class="wrapper">
            <?php
            require_once '../config.php';

            if (isset($_GET['file'])){
                $file = $_GET['file'];
                $path = $_GET['path'];
                $newfile = $path .  $file;

                if ($_GET['choose'] == 'FILE'){
                    //DATEI erstellen
                    $openfile = str_replace('../', '', $newfile) . '.md';

                    $myfile = fopen($newfile . '.md', "w" ) or die("Unable to open file!");

                    $txt = '# this is your new file "' . $file . '.md"!';
                    fwrite($myfile, $txt);
                    fclose($myfile);                

                    echo '<h1>The file was created! <blockquote>"' . $file . '"</blockquote></h1>  <a href="../?site=' . $openfile . '" target="_parent"><div class="btn">Show page</div></a> <a href="../cms/?site=' . $openfile . '"><div class="btn">Edit this file</div></a>';
                }else{
                    //ORDNER erstellen
                    mkdir($newfile);
                    
                    echo '<h1>The directory "' . $file . '" was created!</h1>
                            <a href="../"><div class="btn" target="_parent">Show page</div></a>';
                }
            
            
        }else{
                $folder = getfolder('../' . $documentation_folder);
            
                echo '<h1 style="margin-bottom: 10px;">Create a new markdown file or a directory for headlines</h1>';
            
                 echo '<form action="add.php?action=add">
                            <input class="add_path_textbox" style="margin-bottom: 10px;" type="text" name="file">
                            <select class="add_path_selectbox" style="margin-bottom: 10px;" name="path">
                                <option>../' . $documentation_folder . '/</option>' . $folder . '
                            </select>
                            <select class="add_path_selectbox" style="margin-bottom: 10px;" name="choose">
                                <option>FILE</option>
                                <option>DIRECTORY</option>
                            </select>
                            <input class="btn" style="float:right;" type="submit" value="Create">
                            <a href="../" target="_parent"><div class="btn" style="background: #f16161; float: right;">Cancel</div></a>
                        </form>';
        }
    ?>
        </div>
    </body>

    </html> 
