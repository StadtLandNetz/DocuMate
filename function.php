<?php

// ---------------------------------
// --- UNTERSTÜTZENDE FUNKTIONEN ---
// ---------------------------------
function getDomain() {
    return $_SERVER['SERVER_NAME'];
}




// -----------------------
// --- DOKU FUNKTIONEN ---
// -----------------------

function getfolder($directory){
    
    $ffs = scandir($directory);
    $return = '';
    
    foreach($ffs as $ff){
        
        
        if($ff != '.' && $ff != '..'){
            if(is_dir($directory . '/' . $ff)) {
                
                    //Pfad ist ein Verzeichnis
                    $return .= '<option>' . $directory . '/' . $ff . '/</option>' ;
                
                    $return .= getfolder($directory . '/' . $ff);
            }
        }
    }
    return $return;
}


function listFolderFiles($directory, $editable){
    $C = 0;
    
    $ffs = scandir($directory);
    echo '<div class="menu menu-inner">';
    foreach($ffs as $ff){
        $C = $C + 1;
        if($ff != '.' && $ff != '..'){

            if(is_dir($directory.'/'.$ff)) {
                //Pfad ist ein Verzeichnis
                
                $ff = str_replace (".md", "", $ff);
                $pos = strrpos($ff, "_", 0);
                $edit_bnt = '';
                
                
                if ($editable == 'true') {
                    $edit_bnt = '<a href="cms/delete.php?action=ask&del='.$directory.'/'.$ff . '" class="edit_mnu_btn btn_delete" data-featherlight="iframe"><i class="fa fa-trash-o fa-1"></i></a>';
                    $edit_bnt .= '<a href="cms?site='.$directory.'/'.$ff . '" class="edit_mnu_btn btn_edit"><i class="fa fa-pencil fa-1"></i></a>';
                }
                
                
                echo $edit_bnt .'<div class="menu menu-outer">' ;//.$ff;
                
                if ($pos == 0) {
                    echo $ff ;
                } else {
                    $sn = explode("_", $ff);   
                    echo $sn[1] ; 
                }
                
                
                listFolderFiles($directory.'/'.$ff, $editable);
                echo '</div>';
            } else {
                //Pfad ist eine Datei
            
                $ff1 = str_replace (".md", "", $ff);
                $ff2 = str_replace (" ", "_", $ff1);
                $pos = strrpos($ff, "_", 0);
                $edit_bnt = '';
                
                if ($editable == 'true') {
                    $edit_bnt = '<a href="cms/delete.php?action=ask&del='.$directory.'/'.$ff . '" class="edit_mnu_btn btn_delete" data-featherlight="iframe"><i class="fa fa-trash-o fa-1"></i></a>';
                    $edit_bnt .= '<a href="cms?site='.$directory.'/'.$ff . '" class="edit_mnu_btn btn_edit"><i class="fa fa-pencil fa-1"></i></a>';
                }
                
                if ($pos == 0) {
                    echo $edit_bnt . '<a href="?site='.$directory.'/'.$ff.'&focus=mnu'. $C . $ff2 .'"> <div id="mnu'. $C . $ff2 .'" class="menuitem">' .$ff1 . '</div></a>';
                } else {
                    $sn = explode("_", $ff1);   
                    echo $edit_bnt . '<a href="?site='.$directory.'/'.$ff.'&focus=mnu'. $C . $ff2 .'"> <div id="mnu'. $C . $ff2 .'" class="menuitem">'.$sn[1] . '</div></a>'; 
                }
            }
        }
    }
    echo '</div>';
}

function get_search_results($directory, $search){
    $C = 0;
    
    $ffs = scandir($directory);
    //echo '<div class="menu">';
    foreach($ffs as $ff){
        $C = $C + 1;
        if($ff != '.' && $ff != '..'){

            if(is_dir($directory.'/'.$ff)) {
                //Ordner nicht mit auflisten, aber durchsuchen
                
                get_search_results($directory.'/'.$ff, $search);
            } else {
                //Seiteninhalt ermitteln
                $file_content = file_get_contents($directory.'/'.$ff, true);
                $strp = stripos ($file_content, $search);
                
                if ( $strp <> false){
                    
                    $ff2 = str_replace (".md", "", $ff);
                    $ff2 = str_replace (" ", "_", $ff2);
                    $pfad = str_replace("/", ' 〉', $directory) . ' 〉' . str_replace (".md", "", $ff);
                    $pos = strrpos($ff, "_", 0);
                    
                    $from = $strp - 50;
                    $to = 100;
                    $excerpt = '<p><i>[...]' . substr($file_content, $from, $to) . '[...]</i></p>';
                    $excerpt = str_ireplace($search, '<b><u>' . $search . '</b></u>', $excerpt);
                    
                    
                        echo '<a href="?site='.$directory.'/'.$ff.'&focus=mnu'. $C . $ff2 .'"><div class="search_result">
                        <h4>' . $pfad . '</h4>
                        ' . $excerpt . '
                        </div></a>
                        <hr>';
                    
                }
                
            }
        }
    }
    //echo '</div>';
}

// -------------------------
// --- TICKET FUNKTIONEN ---
// -------------------------

// Login und CMS-Funktionen
function getCustomerLogin($customer, $user, $password){
    $path = "../tickets/" . $customer . "/userdata.txt";
    
    $contents = file_get_contents($path, true);
    echo $contents;
    $erg = false;
    
    $lines = file($path);
    foreach($lines as $line_num => $line)
    {
        $args = explode("=", $line);
        $userNum = 0;
        
        if ($args[0] == 'users'){
            $users = explode(",", $args[1]);
            foreach($users as $user_num => $user_){
                
                echo $user_ . " " . $user . " " . $user_num . " - ";
                if ($user_ = $user){
                    $userNum == $user_num; 
                    echo 'yes';
                } else{
                    echo 'nope';
                }
            }
        }
        
        if ($args[0] == 'passwords'){
            $passw = explode(",", $args[1]);
            if ($password == $passw[$userNum]){
                $erg = true;
            }
        }
        
        
        
    }
    
    echo $erg;
    
    return $erg;
}


function createCustomer($name){
    
}
function addCustomerUser($name, $password){
    
}


function getTickets($customer){
    
}

function getTicketContents($ticketID){
    
}












?>