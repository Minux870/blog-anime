<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'connection.php';

$idtosuppress = $_POST['$idtosuppress'];
$db=connection();
$db->query('DELETE FROM categories_articles WHERE id_article="'.$idtosuppress.'";
DELETE FROM articles WHERE id="'.$idtosuppress.'";');

