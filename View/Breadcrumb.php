<?php

    require_once 'Framework/Configuration.php';

    $webRoot = Configuration::get("webRoot", "/");
    //var_dump($webRoot);
    $path =($_SERVER['REQUEST_URI']);
    //var_dump($path);

    $newPath = str_replace($webRoot, "", $path);

    $pattern = '#^[a-zA-Z]+\/[a-zA-Z]+\/[0-9]+$#';
    $pattern2 = '#^[a-zA-Z]+\/[0-9]+$#';

    if(preg_match($pattern, $newPath)){
        $pathNames = explode("/", $newPath);
        //var_dump($pathNames);
        $trimnames = array_slice($pathNames, 0, -2);
        //var_dump($trimnames);
    }
    else {
        $pathNames = explode("/", $newPath);
        //var_dump($pathNames);
        $trimnames = array_slice($pathNames, 0, -1);
        //var_dump($trimnames);
    }


    if($newPath != ''){
        $b = '';
        $links = $trimnames;
        echo '<nav aria-label="breadcrumb"><ol>';
        foreach($links as $l){
            if(preg_match('#post#', $l)){ $l = 'Home'; }
            $b .= $l;
            if($newPath == $b){
                echo $l;
            }
            elseif (preg_match('#admin#', $l) || preg_match('#Home#', $l)){
                    $l = 'Accueil';
                    echo '<li class="breadcrumb-item"><a href="'.$b.'/">'.$l.'</a> <img src="Content/fonts/font-awesome/fonts/angle-right-solid.svg" width="12px" height="12px"> '.$this->title . '</li>';
                }
            else {
                echo '<li class="breadcrumb-item"><a href="'.$b.'/">'.$l.'</a> <img src="Content/fonts/font-awesome/fonts/angle-right-solid.svg" width="12px" height="12px"> '.$this->title . '</li>';    
            }
            $b .= '/';
        }
         echo '</ol></nav>';
     }




