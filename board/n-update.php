<?php
require_once('../db/dbConn.php'); 
$nid = $_POST['nid'];
$ntitle = $_POST['ntitle'];
$ndescript = $_POST['ndescript'];

$sql = mq("UPDATE notice
          SET ntitle = '$ntitle', ndescript = '$ndescript'
          WHERE id = '$nid'
          ");

echo "
  <script>
    alert('수정되었습니다.');
    window.location = './notice.php';
  </script>
";
?>