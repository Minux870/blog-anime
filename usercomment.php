<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'function.php';

function addcomment($usercomment,$userpseudo,$articleid){
    $db=connection();
    $db->query('INSERT INTO commentaires (`contenu`, `pseudo`, `article_id`)
    VALUES ("'.$usercomment.'", "'.$userpseudo.'", '.$articleid.')');
       
};

$articleid=$_GET['id'];
$usercomment=$_POST['usercomment'];
$userpseudo=$_SESSION['pseudo'];
var_dump($articleid);
var_dump($userpseudo);
var_dump($usercomment);


if(!empty($usercomment)){
    addcomment($usercomment,$userpseudo,$articleid);
    header("location:single.php?id=$articleid");
}

