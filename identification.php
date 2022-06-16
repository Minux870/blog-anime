<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'function.php';

$logs=$_POST;

$identification=getUserlogs($logs);
if(!empty($logs['pseudo']) || !empty($logs['password'])){
    if($identification){
        if($identification['password']==$logs['password']&&$identification['pseudo']==$logs['pseudo']){
            $_SESSION['pseudo']=$identification['pseudo'];
            $_SESSION['id']=$identification['id'];
            header("location:index.php?message=ok");
        }if($identification['password']!=$logs['password']||$identification['pseudo']!=$logs['pseudo']){header("location:index.php?message=mdpfalse");}
        
    }else{header("location:index.php?message=pseudofalse");}
}else{header("location:index.php?message=pasok");}