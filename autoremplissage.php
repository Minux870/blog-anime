<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


require 'function.php';

if($_POST['search']){
    $search=$_POST['search'];
    autoremplissage($search);
}


function autoremplissage($search){
    $db=connection();
    $searcharticles=$db->query('SELECT articles.id, `image`, petit, title 
    FROM articles WHERE title 
    LIKE "%'.$search.'%" OR petit LIKE "%'.$search.'%" OR content LIKE "%'.$search.'%";');
    $results=$searcharticles->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
};





