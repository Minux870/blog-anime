<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


require 'function.php';




function addtotable($we, $name, $description, $petit, $src, $auteurid){
    $db=connection();
    $db->query('INSERT INTO articles (`image`, `title`, `petit`, `content`, `auteur_id`)
    VALUES ("'.$src.'", "'.$name.'", "'.$petit.'", "'.$description.'", "'.$auteurid.'")');
    $lastid=$db->lastInsertId();
    foreach($we as $key => $value){
        if(strpos($key, 'category')!== false){
            $db->query('INSERT INTO categories_articles (`id_article`,`id_categorie`)
            VALUES ('.$lastid.','.$value.')');
        }
    }   
};



$we=$_POST;
$name=$we["title"];
$description=$we["content"];
$petit=$we["petit"];
$src=$we["image"];
$auteurid=$_SESSION['id'];


//if(!empty($name) and !empty($auteur) and !empty($description) and !empty($petit) and !empty($src)){
    addtotable($we, $name, $description, $petit, $src, $auteurid);
//}
header("location:index.php?message=ok");
