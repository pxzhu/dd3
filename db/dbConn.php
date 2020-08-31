<?php
session_start();
$ip = 'localhost';
$id = 'root';
$pw = 'rootdb';
$dbname = 'view_shopping';

$dbConn = mysqli_connect($ip, $id, $pw, $dbname) or die("SQL server not Connected!");

mysqli_query("SET NAMES UTF8");

function mq($sql){
  global $dbConn;
  return $sql = mysqli_query($dbConn,$sql);
}
?>