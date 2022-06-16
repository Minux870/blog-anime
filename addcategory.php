<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'connection.php';



$addcategory=$_POST['addcategory'];
$db=connection();
$db->query('INSERT INTO categories(`category`) VALUES("'.$addcategory.'")');