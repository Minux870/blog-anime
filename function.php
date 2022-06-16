<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'connection.php';
session_start();

function getArticles(){
    $db=connection();
    $articles=$db->query('SELECT * FROM articles');
    $results=$articles->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getAuteur($id){
    $db=connection();
    $auteur=$db->query('SELECT pseudo FROM articles INNER JOIN auteurs ON articles.auteur_id=auteurs.id WHERE articles.id='.$id.'');
    $pseudo=$auteur->fetch(PDO::FETCH_ASSOC);
    return $pseudo;
}

function getArticleById($id){
    $db=connection();
    $article=$db->query('SELECT * FROM articles WHERE articles.id='.$id.'');
    $pseudo=$article->fetch(PDO::FETCH_ASSOC);
    return $pseudo;
}

function getCategories(){
    $db=connection();
    $categories=$db->query('SELECT * FROM categories');
    $results=$categories->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getArticlesByCategory($cat){
    $db=connection();
    $articles=$db->query('SELECT articles.id,`image`,`title`,`petit`,`content`,`date de publication`,`auteur_id`  FROM articles INNER JOIN categories_articles ON id_article=articles.id INNER JOIN categories ON id_categorie=categories.id WHERE categories.category="'.$cat.'"');
    $results=$articles->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}


function getArticlesByCategory2($id){
    $db=connection();
    $articles=$db->query('SELECT *  FROM articles INNER JOIN categories_articles ON id_article=articles.id INNER JOIN categories ON id_categorie=categories.id WHERE articles.id='.$id.'');
    $results=$articles->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
 
function compcat($id, $catid){
    $db=connection();
    $articles=$db->query('SELECT *  FROM categories_articles
    WHERE categories_articles.id_article="'.$id.'"
     AND categories_articles.id_categorie="'.$catid.'"');
    $results=$articles->fetch(PDO::FETCH_ASSOC);
    return $results;
}

function getAllCategories(){
    $db=connection();
    $articles=$db->query('SELECT *  FROM categories');
    $results=$articles->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getUserlogs($logs){
    $db=connection();
    $articles=$db->query('SELECT `id`, `pseudo`, `password` FROM auteurs WHERE pseudo="'.$logs['pseudo'].'"');
    $results=$articles->fetch(PDO::FETCH_ASSOC);
    return $results;
}

function getArticlesByAuteur(){
    $db=connection();
    $articles=$db->query('SELECT * FROM `articles` WHERE auteur_id="'.$_SESSION['id'].'"');
    $results=$articles->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getCommentsById($id){
    $db=connection();
    $article=$db->query('SELECT contenu, commentaires.id, pseudo, commentaires.`date de publication` FROM commentaires INNER JOIN articles ON articles.id=commentaires.article_id WHERE articles.id='.$id.'');
    $pseudo=$article->fetchAll(PDO::FETCH_ASSOC);
    return $pseudo;
}