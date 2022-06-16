<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


require 'function.php';




/*function modiftable($modif, $name, $description, $petit, $src, $auteurid){
    $db=connection();
    $db->query('INSERT INTO articles (`image`, `title`, `petit`, `content`, `auteur_id`)
    VALUES ("'.$src.'", "'.$name.'", "'.$petit.'", "'.$description.'", "'.$auteurid.'")');
    $lastid=$db->lastInsertId();
    foreach($modif as $key => $value){
        if(strpos($key, 'category')!== false){
            $db->query('INSERT INTO categories_articles (`id_article`,`id_categorie`)
            VALUES ('.$lastid.','.$value.')');
        }
    }   
}; */ 

function modiftable($articleid, $modif, $name, $description, $petit, $src, $auteurid){
    $db=connection();
    $db->query('UPDATE articles SET `image`="'.$src.'",`title`="'.$name.'",
    `petit`="'.$petit.'",`content`="'.$description.'" WHERE articles.id='.$articleid.';
    DELETE FROM categories_articles WHERE id_article='.$articleid.'');
    foreach($modif as $key => $value){
        if(strpos($key, 'category')!== false){
            $db->query('INSERT INTO categories_articles (`id_article`,`id_categorie`)
            VALUES ('.$articleid.','.$value.')');
        }
    } 
};  



$id=$_GET;
$modif=$_POST;
$name=$modif["title"];
$description=$modif["content"];
$petit=$modif["petit"];
$src=$modif["image"];
$auteurid=$_SESSION['id'];
$articleid=$modif['id'];


modiftable($articleid, $modif, $name, $description, $petit, $src, $auteurid);

header("location:single.php?id=$articleid");