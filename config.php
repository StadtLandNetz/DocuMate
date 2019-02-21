<?php
#   File: config.php
#   Author: Lars Lehmann
#   Desc: Here you can find all the basic options for your documentation
#         Please make a backup before editing this file.
#         You have to set all the variables to a value. Don't delete one or leave them empty.

//The name of the folder, where the .md-files are saved 
$documentation_folder = "docs"; 

//The Title of your documentation
$documentation_title = "DocuMate - documentation made easy"; 

//the name of the theme/style you want for the entire app. Check the themes folder. Enter here filename without '.css'. You can create new styles by copying an old one.
$theme = 'theme_dark';

//the name of the theme/style you want for the markup. Check the themes folder. Enter here filename without '.css'. You can create new styles by copying an old one.
$markup_theme = 'markup_dark'; 

//the path to your logo file, which will be placed in the header
//The size of this image is 60x240 px
$topbar_logo = "ressources/main_logo.png"; 

//the path to your small logo file, which will be placed in the header when you view the page on smartphones
//The size of this image is 40x40 px
$small_logo = "ressources/small_logo.png"; 

//The HTML-Code of your footer.
$footer_html = "<p>Here you can insert some <b>own</b> HTML like <a href=\"http://stadtlandnetz.de\">links</a></p>"; 

//The page what will be shown when the root page is loaded, this is the indexpage. WITHOUT THE .md FILE EXTENSION!
$start_page = "01_Home";

//Indicates if the files can be edited using the integrated markup editor
$can_login = true;

//To enter the editmode, type the password
$admin_password = 'lars11';

?>
