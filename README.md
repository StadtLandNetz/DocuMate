# DocuMade
DocuMade is a simple to use and leightweight documentation system using markup.

Easily download the files, save them to your webserver and the system is ready to go.

You can upload your own logo files, develop own themes and change some behavior of the app.


## Installation
  1. Download the ZIP file
  2. Upload them to your webserver
  3. Thats it, DocuMade is ready to use

## How to use
### The configuarion

Once you've installed the files on your server, you'll se a file named ```config.php```. Make a backup of this file. Then open this file for editing.

In the file you'll see 7 variables:
  * $documentation_folder = "docs"; 
  * $documentation_title = "DocMade example"; 
  * $theme = 'theme_light'; 
  * $markup_theme = 'markup_light'; 
  * $topbar_logo = "ressources/main_logo.png"; 
  * $small_logo = "ressources/small_logo.png"; 
  * $footer_html = "some HTML";

**$documentation_folder** sets the name of the subdirectory where the markup files are saved. You don't need to change this, if you save the markup files in the existing "docs" folder.

**$documentation_title** is the name or the title of your documentation.

**$theme** is the name of the used theme, located in the themes folder. You can make your own theme or use an existing one. Be sure, that the theme really exists. Use the name of the CSS-file but without the '.css'.

**$markup_theme** is the same like the theme variable but for the markup section. If you want to change the style of the html output of you markup files, create your own CSS file or edit the existing one.

**$topbar_logo** is the logo which appears in the header.

**$small_logo** is the small logo which appears on mobile devices.

**$footer_html** is the custom HTML output, which you might want to place in the footer like imprints.










