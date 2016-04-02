<?php
//https://michelf.ca/projects/php-markdown/
require_once 'md_lib/Michelf/MarkdownExtra.inc.php';
require_once 'function.php';
require_once 'config.php';


//Get URL Parameter for loading the right document
if(isset($_GET["site"]) <> ''){
    $site = $_GET['site'];
    $focus = $_GET['focus'];
}
else{
    $site = $documentation_folder. '/' . $start_page . '.md';
    $focus = $documentation_folder . 'mnu' . $start_page;
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
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="themes/<?php echo $theme; ?>.css">
        <link rel="stylesheet" type="text/css" href="themes/<?php echo $markup_theme; ?>.css">
        
        <script>
            //scrolls to the position where the clicked menu element is
            window.onload = function scrollinto(){
                var element = document.getElementById('<?php echo $focus;?>');
                element.scrollIntoView(true);
                element.classList.add('selected');
            }
            
            //toggles the menu on mobile devices
            function toggle_mobile_menu() {
                var left_ = document.getElementById('leftbar');
                var right_ = document.getElementById('rightbar');
                
                if (left_.className == 'leftbar'){
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
            <div class="topbar">
                <div class="mobile_menu" onclick="toggle_mobile_menu()">
                      <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                      </div>
                </div>
                <div class="main_logo" style="background-image:URL(<?php echo $topbar_logo; ?>);"></div>
                <div class="small_logo" style="background-image:URL(<?php echo $small_logo; ?>);"></div>
                <h1>
                <?php echo $documentation_title; ?>
                </h1>
                <?php if ($editable == true){
                echo '<a href="editor/?site=' . $site . '"><div class="edit_btn" style="display:block;">Edit this file</div></a>';
                } ?>
            </div>

            <div id="leftbar" class="leftbar">
                <h2 id="start_mnu">Hauptmenü</h2>
                <hr>
                <?php 
                //Load Menu
                listFolderFiles($documentation_folder); ?>
                <hr>
                
            </div>

            <div id="rightbar" class="rightbar">
                <?php 
                    //Load Content of the current page
                    $file_content = file_get_contents($site, true);
                    $head1 = split("/", $site);
                    echo '<h2>';
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
                    use \Michelf\MarkdownExtra, \Michelf\SmartyPants;
                    $erg = MarkdownExtra::defaultTransform($erg); 

                    echo $erg . "</div>";
                
                ?>
            </div>
        </div>
        <div class="footer">
            <?php echo $footer_html;?>
        </div>

    </body>

</html>
