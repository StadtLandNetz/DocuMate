<?php





function listFolderFiles($directory){
    $C = 0;
    
    $ffs = scandir($directory);
    echo '<div class="menu">';
    foreach($ffs as $ff){
        $C = $C + 1;
        if($ff != '.' && $ff != '..'){

            if(is_dir($directory.'/'.$ff)) {
                echo '<div class="menu">' ;//.$ff;
                $ff = str_replace (".md", "", $ff);
                $pos = strrpos($ff, "_", 0);

                
                if ($pos == 0) {
                    echo $ff ;
                } else {
                    $sn = split("_", $ff);   
                    echo $sn[1] ; 
                }
                
                
                listFolderFiles($directory.'/'.$ff);
                echo '</div>';
            } else {
            
                $ff2 = str_replace (".md", "", $ff);
                $pos = strrpos($ff, "_", 0);

                
                if ($pos == 0) {
                    echo '<a href="?site='.$directory.'/'.$ff.'&focus=mnu'. $C . $ff2 .'"><div id="mnu'. $C . $ff2 .'" class="menuitem">' .$ff2 . '</div></a>';
                } else {
                    $sn = split("_", $ff2);   
                    echo '<a href="?site='.$directory.'/'.$ff.'&focus=mnu'. $C . $ff2 .'"><div id="mnu'. $C . $ff2 .'" class="menuitem">'.$sn[1] . '</div></a>'; 
                }
            }
        }
    }
    echo '</div>';
}







function current_url() {  
    $isHTTPS = ( isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on" );  
    $isPort = ( isset($_SERVER["SERVER_PORT"]) && ((!$isHTTPS && $_SERVER["SERVER_PORT"] != "80")  
                 || ($isHTTPS && $_SERVER["SERVER_PORT"] != "443")));  
                   
    $port = ( $isPort ) ? ( ':'.$_SERVER["SERVER_PORT"] ) : '';  
  
    //On some setups like nginx and php-fastcgi, REQUEST_URI include the query string  
    if ( ($pos = strpos($_SERVER['REQUEST_URI'], '?')) === false )  
    {  
        // REQUEST_URI include the query string, it should be appended:  
  
        $isQuery = ( isset($_SERVER["QUERY_STRING"]) && $_SERVER["QUERY_STRING"] != '');  
        $query = ( $isQuery ) ? ( '?'.$_SERVER["QUERY_STRING"] ) : '';  
  
        $url = ( $isHTTPS ? 'https://' : 'http://')  
                    .$_SERVER["SERVER_NAME"].$port.$_SERVER["REQUEST_URI"].$query;  
    }  
    else  
    {  
        // the query string is already included in $_SERVER["REQUEST_URI"], no need to append it  
        $url = ( $isHTTPS ? 'https://' : 'http://')  
                    .$_SERVER["SERVER_NAME"].$port.$_SERVER["REQUEST_URI"];          
    }  
           
    return $url;  
}  







?>