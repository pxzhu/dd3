<?php
require_once('../db/dbConn.php'); 

$gcode = $_POST['gcode'];
$gname = $_POST['gname'];
$gexplain = $_POST['gexplain'];
$gcategory = $_POST['gcategory'];
$gimg = $_POST['gimg'];
$cname = $_POST['cname'];
$tname = $_POST['tname'];
$gprice = $_POST['gprice'];

if($gcategory) {
  $gcategory = $gcategory;
} else {
  $gcategory = $cname;
}

$sql = mq("SELECT c.name AS cname, t.name AS tname
        FROM category c
        LEFT JOIN tCategory t
        ON c.tCid = t.id
        WHERE c.name = '$gcategory'
        ");
$query = mysqli_fetch_array($sql);

$fileDir = '../asset/img/'.$query['tname'];
$name = $_FILES['gimg']['name'];

if($name) {
  $sql = mq("SELECT t.name AS tname, g.gpicture AS gpicture
          FROM goods g
          LEFT JOIN category c
          ON g.gCid = c.id
          LEFT JOIN tCategory t
          ON c.tCid = t.id
          WHERE g.gcode = '$gcode'
          ");
  $query = mysqli_fetch_array($sql);
  unlink("../asset/img/{$query['tname']}/{$query['gpicture']}");
  move_uploaded_file($_FILES['gimg']['tmp_name'], "$fileDir/$name");

  $sql = mq("SELECT *
            FROM category
            WHERE name = '$gcategory'
  ");
  $query = mysqli_fetch_array($sql);
  $gcategory = $query['id'];

  $sql = mq("UPDATE goods
            SET gname = '$gname', gexplain = '$gexplain', gprice = '$gprice', gpicture = '$name', gcid = '$gcategory'
            WHERE gcode = '$gcode'
            ");
} else {
  if($cname === $gcategory) {
    $sql = mq("SELECT *
            FROM category
            WHERE name = '$gcategory'
            ");
    $query = mysqli_fetch_array($sql);
    $gcategory = $query['id'];

    $sql = mq("UPDATE goods
              SET gname = '$gname', gexplain = '$gexplain', gprice = '$gprice', gcid = '$gcategory'
              WHERE gcode = '$gcode'
              ");
  } else {
    // 지금의 경로
    $sql = mq("SELECT t.name AS tname, c.name AS cname, g.gpicture AS gpicture
              FROM goods g
              LEFT JOIN category c
              ON g.gCid = c.id
              LEFT JOIN tCategory t
              ON c.tCid = t.id
              WHERE g.gcode = '$gcode'
              ");
    $query = mysqli_fetch_array($sql);
    $file1 = "../asset/img/{$query['tname']}/{$query['gpicture']}";
    // 바뀔 경로
    $sql = mq("SELECT *
            FROM category
            WHERE name = '$gcategory'
            ");
    $query = mysqli_fetch_array($sql);
    $gcategory = $query['id'];

    $sql = mq("UPDATE goods
              SET gname = '$gname', gexplain = '$gexplain', gprice = '$gprice', gcid = '$gcategory'
              WHERE gcode = '$gcode'
              ");
    $sql = mq("SELECT t.name AS tname, c.name AS cname, g.gpicture AS gpicture
              FROM goods g
              LEFT JOIN category c
              ON g.gCid = c.id
              LEFT JOIN tCategory t
              ON c.tCid = t.id
              WHERE g.gcode = '$gcode'
              ");
    $query = mysqli_fetch_array($sql);
    $file2 = "../asset/img/{$query['tname']}/{$query['gpicture']}";
    
    rename($file1, $file2);
  }
}
echo "<script>
        alert('상품이 수정되었습니다.');
        window.location = './management-page.php';
      </script>
      ";

?>