<?php 
require_once('../db/dbConn.php');
require_once('../db/randomString.php'); 
$gcode = RandomString();
$gname = $_POST['gname'];
$gexplain = $_POST['gexplain'];
$gimg = $_POST['gimg'];
$gprice = $_POST['gprice'];
$gcategory = $_POST['gcategory'];

$sql = mq("SELECT c.name AS cname, t.name AS tname
          FROM category c
          LEFT JOIN tCategory t
          ON c.tCid = t.id
          WHERE c.name = '$gcategory'
          ");
$query = mysqli_fetch_array($sql);

$fileDir = '../asset/img/'.$query['tname'];
$name = $_FILES['gimg']['name'];

move_uploaded_file($_FILES['gimg']['tmp_name'], "$fileDir/$name");


$sql = mq("SELECT *
          FROM category
          WHERE name = '$gcategory'
          ");
$query = mysqli_fetch_array($sql);
$gcategory = $query['id'];


$sql = mq("INSERT INTO
          goods(gcode, gname, gexplain, gprice, gpicture, gcid)
          VALUES('$gcode', '$gname', '$gexplain', '$gprice', '$name', '$gcategory')
          ");

echo "<script>
        alert('상품이 등록되었습니다.');
        window.location = './management-page.php';
      </script>
      ";
?>