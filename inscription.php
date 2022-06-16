<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'connection.php';

$newlogs=$_POST;



function createNewUser($pseudo, $email, $password){
    $db=connection();
    $db->query('INSERT INTO auteurs (`pseudo`, `email`, `password`)
    VALUES ("'.$pseudo.'", "'.$email.'", "'.$password.'")');   
};




$pseudo=$newlogs["pseudo"];
$email=$newlogs["email"];
$password=$newlogs["password"];

//if(!empty($name) and !empty($auteur) and !empty($description) and !empty($petit) and !empty($src)){
    createNewUser($pseudo, $email, $password);
//}
header("location:index.php?message=ok");