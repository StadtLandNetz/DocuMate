# DocuMate
DocuMate is a simple to use and leightweight documentation system using markdown.

Easily download the files, save them to your webserver and the system is ready to go.

You can upload your own logo files, **develop own themes** and change some behavior of the app.

Checkout the demo: http://documate.lehmann.link/

**NEW since V2:**
* Online markdowneditor: easily edit your markdown files online using the stunning editor.
* New dark theme added (looks amazing)


![BILD](http://doku.s-via.de/ressources/dokumate%20screen.png)

## Installation
  1. Download the ZIP file
  2. Upload them to your webserver
  3. Thats it, DocuMade is ready to use

## How to use
### The configuration

Once you've installed the files on your server, you'll se a file named ```config.php```. Make a backup of this file. Then open this file for editing.

In the file you'll see 7 variables:
  * $documentation_folder = "docs"; 
  * $documentation_title = "DocMade example"; 
  * $theme = 'theme_light'; 
  * $markup_theme = 'markup_light'; 
  * $topbar_logo = "ressources/main_logo.png"; 
  * $small_logo = "ressources/small_logo.png"; 
  * $footer_html = "some HTML";
  * $editable = true;

**$documentation_folder** sets the name of the subdirectory where the markdown files are saved. You don't need to change this, if you save the markdown files in the existing "docs" folder.

**$documentation_title** is the name or the title of your documentation.

**$theme** is the name of the used theme, located in the themes folder. You can make your own theme or use an existing one. Be sure, that the theme really exists. Use the name of the CSS-file but without the '.css'.

**$markup_theme** is the same like the theme variable but for the markdown section. If you want to change the style of the html output of you markdown files, create your own CSS file or edit the existing one.

**$topbar_logo** is the logo which appears in the header.

**$small_logo** is the small logo which appears on mobile devices.

**$footer_html** is the custom HTML output, which you might want to place in the footer like imprints.

**$editable = true;** indicates if the files can be edited using the integrated markdown editor

### How to write the documentation
If you look in the ```docs``` folder you'll see some ```.md``` files and some directories. DocuMate will use folders as headlines and place all the files below.

If you want to add a new page to your docu, simply add a file with ```.md``` file extension.

Order files while using number prefixes. Use Following syntax:

```TXT
[Number]_[Name of the file].md
01_This is a file.md
```

DocuMate will order the files and directories. Also it will remove all letters and numbers before the first ```_``` when displaying it.

## Make your own Themes
### Basic theme of your DocuMate
Adding own themes is quite simple if you know CSS. Simply insert a new or copy one existing CSS file. If you copy an existing file, you'll get all classes you can edit.

After this, you have to change the ```$theme``` variable in the ```config.php```. Use the name of your new theme file without the ```.css```

### Markup theme
You can also change the design of the markdown content. Copy the file ```markup_light.css``` in the themes folder and change the CSS properties inside. Be sure, that you don't manipulate the classnames! After this, add the name of your new markdown file to ```config.php```.



# Todo:
  * Online file adding
  * Online file removing

#Credits:
For the markdown translation I use the awesome php library of Michelf: https://michelf.ca/projects/php-markdown/
The editor is made by this awesome guy: https://github.com/jbt/markdown-editor


# Thanks for using!
Don't hesitate to send me some lines: lars@lehmann.link
























