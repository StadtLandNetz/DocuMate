# The DocuMate file and directory tree

DocuMate is fully file based. You don't need any database. Each content is saved into files.

## This is structure of DocuMate:

``` PHP
 DocuMate //the root dir
		├─ cms //contains all the magic
		│	├─ codemirror	//contains all markdown-stuff for the backend
		│	│	├─ folder
		│	│	├─ folder
		│	├─ css			//some required stylesheets
		│	├─ font-awesome	//awesome icon library you can use
		│	│	├─ folder
		│	│	├─ folder
		│	├─ js			//some basic sitefunctions
		│	│	├─ folder
		│	│	├─ folder
		│	├─ md_lib		//contains all markdown-stuff for the frontend
		│	│	├─ folder
		│	│	├─ folder
		│	├─ add.php
		│	├─ delete.php	//the functions which delte files and directories
		│	├─ index.php	//the index-page for the editor of the cms (the heart)
		│	├─ login.php	//the login-function
		│	├─ save.php		//the functions to save filecontents
		├─ docs				//contains your documentation and menu structure
		│	├─ folder
		│	│	├─ folder
		│	│	├─ folder
		│	├─ folder
		│	│	├─ folder
		│	├─ folder
		│	│	├─ folder
		│	│	├─ folder
		├─ ressources		//contains images and usable sources
		├─ themes			//contains the custom theme files
		│	├─ file.css
		│	├─ file.css
		│	├─ file.css
		├─ config.php		//delivers important variables for the system-configuration
		├─ functions.php		//delivers basic functions for the cms and the documentation
 		├─ index.php		//is the basic file for the documentation




```