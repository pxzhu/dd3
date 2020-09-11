<?php
require_once('../db/dbConn.php'); 
$sid = $_POST['sid'];

$sql = mq("DELETE
          FROM qna
          WHERE id = $sid
          ");

echo "
  <script>
    alert('삭제되었습니다.');
    window.location = './qna.php';
  </script>
";
?>