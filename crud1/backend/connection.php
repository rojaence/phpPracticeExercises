<?php
$server = 'mysql:dbname=personDB;host=localhost';
$password = '';
$username = 'root';
try { 
  $conn = new PDO($server, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch(PDOException $e) {
  echo 'Failed connection' .$e->getMessage();
}