<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'function.php';
require 'header1.php';
require 'header2.php';
session_destroy();
header("location:index.php?message=ok");