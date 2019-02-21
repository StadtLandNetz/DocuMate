<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../config.php';
require_once '../function.php';

$page_content = '';


if(isset($_GET["mode"]) <> ''){
    
    if ($_GET['mode'] = 'admin'){
        $pw = $_GET['password'];
    
        if ($pw == $admin_password){

            setcookie("DM_logged_in", 'true', time()+60*60*24, '/');

            $page_content .= '<div class="wrapper" style=""><h1 style="color:green;">You are logged in now! :D</h1>';
            $page_content .= '<a href="../" data-featherlight="iframe" target="_parent"><div class="btn">Close</div></a></div>';

        }else{
            $page_content .= '<div class="wrapper" style=""><h1 style="color:red;">This Password is wrong :/</h1>';
            $page_content .= '<a href="login.php"><div class="btn">Try again</div></a></div>';
            $page_content .= '<a href="../" target="_parent"><div class="btn" style="background: #f16161; ">Cancel</div></a>';
        } 
    }
    

 
}


if(isset($_GET["action"]) <> ''){
    
    $pw = $_GET['action'];
    
    if ($pw == 'logout'){
        setcookie("DM_logged_in", 'false', time(), '/');
        
        $page_content .= '<div class="wrapper" style="margin-top: 200px;"><h1 style="color:red;">You are logged out!</h1>';
        $page_content .= '<a href="../" data-featherlight="iframe" target="_parent"><div class="btn">Close</div></a></div>';
        
    }
}




?>

    <!DOCTYPE html>
    <html lang="de">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login into DocuMateCMS!</title>

        <link rel="stylesheet" type="text/css" href="../themes/<?php echo $theme; ?>.css">
        <link rel="stylesheet" type="text/css" href="css/buttons.css">
        <link rel="stylesheet" type="text/css" href="css/default.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/jquery-3.1.1.min.js"></script>


    </head>

    <body>
        <div class="wrapper dialog" style="">
            
            
            <?php
            echo $page_content;
            
            if ($page_content == ''){
                echo '
                <h1>Login into DocuMate-CMS</h1>
                <br>
                
                 ';

                 echo '<form action="login.php?mode=admin" id="adminform" style="display: block">
                            <input class="add_path_textbox" type="password" name="password">
                            <input class="add_path_textbox" type="textfield" name="mode" value="admin" style="display: none;">
                            <input class="btn" style="float:right;" type="submit" value="Login">
                            <a href="../" target="_parent"><div class="btn" style="background: #f16161; float: right;">Cancel</div></a>
                       </form>';  
                
            }
            
            
            
            
    ?>
            
            
            
            
        </div>
    </body>

    </html>
