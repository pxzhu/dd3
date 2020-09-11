<?php 
require_once('../db/dbConn.php'); 
$quid = $_SESSION['userid'];
$qtitle = $_POST['qtitle'];
$qdescript = $_POST['qdescript'];

$sql = mq("INSERT INTO
          qna(quid, qtitle, qdescript, qdate)
          VALUES('$quid', '$qtitle', '$qdescript', NOW())
          ");

echo "
  <script>
    alert('작성되었습니다.');
    window.location = './qna.php';
  </script>
";
?>