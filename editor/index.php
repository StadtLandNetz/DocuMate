<?php
//https://michelf.ca/projects/php-markdown/
require_once '../md_lib/Michelf/MarkdownExtra.inc.php';
require_once '../function.php';
require_once '../config.php';


//Get URL Parameter for loading the right document
if(isset($_GET["site"]) <> ''){
    $site =  '../' .  $_GET['site'];
}else{
    $site =  '../' .  $documentation_folder. '/' . $start_page . '.md';
}

    $toback = '../?site=' . str_replace('../' .  $documentation_folder,'' , $_GET['site']) . '&focus=none';

?>



    <!DOCTYPE html>
    <html>

    <head>
        <title>Markdown Editor</title>
        <script src="markdown-it.js"></script>
        <script src="markdown-it-footnote.js"></script>
        <script src="highlight.pack.js"></script>
        <script src="codemirror/lib/codemirror.js"></script>
        <script src="codemirror/overlay.js"></script>
        <script src="codemirror/xml/xml.js"></script>
        <script src="codemirror/markdown/markdown.js"></script>
        <script src="codemirror/gfm/gfm.js"></script>
        <script src="codemirror/javascript/javascript.js"></script>
        <script src="codemirror/css/css.js"></script>
        <script src="codemirror/htmlmixed/htmlmixed.js"></script>
        <script src="codemirror/lib/util/continuelist.js"></script>
        <script src="rawinflate.js"></script>
        <script src="rawdeflate.js"></script>
        <link rel="stylesheet" href="base16-light.css">
        <link rel="stylesheet" href="codemirror/lib/codemirror.css">
        <link rel="stylesheet" href="default.css">
        
        <link rel="stylesheet" type="text/css" href="../themes/<?php echo $markup_theme; ?>.css">

    </head>

    <body>
        <div id="in">
            <a href="<?php echo $toback; ?>"><div class="cancel_btn">Back to page</div></a>
            
            
            <form action="save.php" method="post">
                
                
                <input style="display: none;" name="file" type="text" value="<?php echo $site ?>" />
                <textarea name="code" type="text"  id="code">
<?php
//Load Content of the current page
$file_content = file_get_contents($site, true);
echo $file_content;
?>
</textarea>
                <?php if ($editable == true){
                    echo '<input class="submit_btn" type="submit" name="submit" value="Save file">';
                } ?>
            </form>
        </div>

        <script type="text/javascript">
            var hashto;

            function update(e) {
                //setOutput(e.getValue());

                //clearTimeout(hashto);
                //hashto = setTimeout(updateHash, 1000);
            }



            var editor = CodeMirror.fromTextArea(document.getElementById('code'), {
                mode: 'gfm',
                lineNumbers: false,
                matchBrackets: true,
                lineWrapping: true,
                theme: 'base16-light',
                extraKeys: {
                    "Enter": "newlineAndIndentContinueMarkdownList"
                }
            });

            editor.on('change', update);

            document.addEventListener('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();

                var reader = new FileReader();
                reader.onload = function(e) {
                    editor.setValue(e.target.result);
                };

                reader.readAsText(e.dataTransfer.files[0]);
            }, false);

            document.addEventListener('keydown', function(e) {
                if (e.keyCode == 83 && (e.ctrlKey || e.metaKey)) {
                    e.shiftKey ? showMenu() : saveAsMarkdown();

                    e.preventDefault();
                    return false;
                }

                if (e.keyCode === 27 && menuVisible) {
                    hideMenu();

                    e.preventDefault();
                    return false;
                }
            });


        </script>
    </body>

    </html>
