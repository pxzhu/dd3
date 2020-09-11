<?php
require_once('../db/dbConn.php'); 
$qid = $_POST['qid'];
$qtitle = $_POST['qtitle'];
$qdescript = $_POST['qdescript'];

$sql = mq("UPDATE qna
          SET qtitle = '$qtitle', qdescript = '$qdescript'
          WHERE id = '$qid'
          ");

echo "
  <script>
    alert('수정되었습니다.');
    window.location = './qna.php';
  </script>
";
?>