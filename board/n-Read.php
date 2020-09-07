<?php 
require_once('../db/dbConn.php'); 

$gid = $_GET['id'];

$sql = mq("SELECT *
          FROM notice
          WHERE id = $gid
          ");
$query = mysqli_fetch_array($sql);

echo $query['id']."<br>";
echo $query['ntitle']."<br>";
echo $query['ndescript']."<br>";
echo $query['ndate']."<br>";
?>