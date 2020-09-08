<?php
require_once('../db/dbConn.php'); 
$sid = $_POST['sid'];

$sql = mq("DELETE
          FROM notice
          WHERE id = $sid
          ");

echo "
  <script>
    alert('삭제되었습니다.');
    window.location = './notice.php';
  </script>
";
?>