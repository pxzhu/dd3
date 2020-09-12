<?php 
require_once('../db/dbConn.php');
$gcode = $_POST['gcode'];
$rstars = $_POST['rstars'];
$rtext = $_POST['rtext'];
$rimg = $_POST['rimg'];
$uid = $_SESSION['userid'];

if(isset($_SESSION['userid'])) {
  $sql = mq("SELECT g.id AS gid, t.name AS tname
            FROM goods g
            LEFT JOIN category c
            ON g.gCid = c.id
            LEFT JOIN tCategory t
            ON c.tCid = t.id
            WHERE gcode = '$gcode'
            ");
  $query = mysqli_fetch_array($sql);

  $fileDir = '../asset/img/rimg/'.$query['tname'];
  $name = $_FILES['rimg']['name'];
  move_uploaded_file($_FILES['rimg']['tmp_name'], "$fileDir/$name");

  $sql = mq("INSERT INTO
            reviews(rgcode, rstars, ruid, rdescript, rpicture)
            VALUES('$gcode', '$rstars', '$uid', '$rtext', '$name')
            ");
  echo "
  <script>
    alert('리뷰가 등록되었습니다.');
    window.location = './goods-detail.php?id={$query['gid']}';
  </script>
  ";
} else {
  echo "
  <script>
    alert('로그인 후 이용가능합니다.');
    window.history.back();
  </script>
  ";
}
?>