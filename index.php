<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//https://michelf.ca/projects/php-markdown/
require_once 'cms/md_lib/Michelf/MarkdownExtra.inc.php';
require_once 'function.php';
require_once 'config.php';

//prüfen ob Bearbeitungsmodus an
$editable = 'false';
if (isset($_COOKIE['DM_logged_in'])) {
    $editable = $_COOKIE['DM_logged_in'];
}

//Get URL Parameter for loading the right document
$search = '';
$site = '';
$focus = '';
$action = '';
$del = '';


$section = 'docu';


if(isset($_GET["search"]) <> ''){
    //Suchfunktion wurde verwendet
    $search = $_GET['search'];
    if ($search == ''){
        $search = 'no value entered';
    }

}else{
    // Normaler Seitenaufruf ohne suche
    if(isset($_GET["site"]) <> ''){
        $site = $_GET['site'];
        
        if(isset($_GET["focus"]) <> ''){
            $focus = $_GET['focus'];
         }
    }else{
        $site = $documentation_folder. '/' . $start_page . '.md';
        $focus = $documentation_folder . 'mnu' . $start_page;
    }
}




?>


    <!DOCTYPE html>
    <html lang="de">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php echo $documentation_title; ?>
        </title>
        <link rel="stylesheet" type="text/css" href="cms/css/style.css">
        <link rel="stylesheet" type="text/css" href="cms/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="themes/<?php echo $theme; ?>.css">
        <link rel="stylesheet" type="text/css" href="themes/<?php echo $markup_theme; ?>.css">
        <link rel="stylesheet" href="cms/css/featherlight.css">

        <link rel="stylesheet" href="cms/css/code_highlight.css">

        <script src="cms/js/highlight.pack.js"></script>
        <script src="cms/js/jquery-3.1.1.min.js"></script>
        <script src="cms/js/featherlight.js"></script>


        <script></script>

        <style>
            #<?php echo $focus;
            ?> {
                background: #1764A5;
                color: #fff;
            }
            
            #<?php echo $focus;
            ?>:hover {
                background: #104D7F;
                color: #fff;
            }
        </style>

        <script>
            //Syntax-Highlighting einschalten
            hljs.initHighlightingOnLoad();

            //scrolls to the position where the clicked menu element is
            window.onload = function scrollinto() {

                <?php if ($focus == 'none' or $focus == ''):?>
                // Es wurde kein Fokus übergeben
                var element2 = $('a[href*="<?php echo $site; ?>"]').addClass('selected');
                <?php else: ?>
                // Es wurde ein Fokus übergeben
                var element = document.getElementById('<?php echo $focus;?>');
                element.scrollIntoView(true);
                <?php endif?>

            }

            //toggles the menu on mobile devices
            function toggle_mobile_menu() {
                var left_ = document.getElementById('leftbar');
                var right_ = document.getElementById('rightbar');

                if (left_.className == 'leftbar') {
                    left_.className = 'leftbar open';
                    right_.className = 'rightbar open';
                } else {
                    left_.className = 'leftbar';
                    right_.className = 'rightbar';
                }
            }
        </script>
    </head>

    <body>


        <div class="wrapper">
            
            <!-- -------- MENÜ TOP -------- -->
            <div class="topbar">
                <div class="mobile_menu" onclick="toggle_mobile_menu()">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
                <div class="main_logo" style="background-image:URL(<?php echo $topbar_logo; ?>);"></div>
                <div class="small_logo" style="background-image:URL(<?php echo $small_logo; ?>);"></div>
                <h1 class="title_text">
                <?php echo $documentation_title; ?>
                </h1>




                <?php if ($editable == 'true'){
                    if ($search ==''){
                        echo '<a href="cms/login.php?action=logout" data-featherlight="iframe"><div class="edit_btn" style="display:block;float: right;">Logout</div></a>';
                        echo '<a href="cms?site=' . $site . '" class="selected"><div class="edit_btn" style="display:block;float: right;">Seite bearbeiten</div></a>';
                    }
                }else{
                    if ($can_login == true){
                        echo '<a href="cms/login.php" data-featherlight="iframe"><div class="edit_btn" style="display:block;float: right;">Login</div></a>';
                    }
                }?>
            </div>

            <!-- -------- MENÜ LINKS -------- -->
            <div id="leftbar" class="leftbar">
                <!-- Suchen -->
                <form>
                    <input class="searchbox" type="textfield" placeholder="Search this docs" value="<?php echo $search; ?>" name="search"><input class="btn_search" type="submit" value="Search">
                </form>
                <hr>
    
                <!-- Menü -->
                <?php 
                // Menü für Dokumentation laden
                if ($section == 'docu'){
                    listFolderFiles($documentation_folder, $editable);
                    if ($editable == 'true'){
                        echo '<a href="cms/add.php" class="edit_mnu_btn btn_add" data-featherlight="iframe"><i class="fa fa-plus-square-o fa-1"></i></a>'; 
                    }
                }
                
                
                ?>
                <hr>

            </div>

             
            <!-- -------- CONTENT RECHTS -------- -->
            <div id="rightbar" class="rightbar">
                <?php 
                use \Michelf\MarkdownExtra, \Michelf\SmartyPants;
                
                if ($search == ''){
                    //Keine suche, Seiteninhalt laden
                    $file_content = file_get_contents($site, true);
                    $head1 = explode("/", $site);
                    echo '<h2 style="margin-bottom: 16px;">';
                    foreach($head1 as $elem){
                        if ($elem <> $documentation_folder){
                            $elem = str_replace (".md", "", $elem);
                            echo ' 〉' . $elem;
                        } else{
                            echo 'Home';
                        }
                    }
                    echo '</h2> <hr><div class="markup">';

                    $erg = $file_content . '<hr>';

                    //Translate Markup to HTML
                    $erg = MarkdownExtra::defaultTransform($erg); 

                    echo $erg . "</div>";
                    
                }else{
                    
                    //Suchfunktion benutzt, kein Seiteninhalt laden
                    echo '<h2 style="margin-bottom: 16px;">You\'re searching for <i>"' . $search . '"</i></h2><hr>';
                    get_search_results($documentation_folder, $search);
                }
                
                ?>
            </div>
        </div>




            <!-- -------- FOOTER -------- -->
        <div class="footer">
            <?php echo $footer_html;?>
        </div>

    </body>

    </html>
