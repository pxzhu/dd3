<?php 
require_once('../db/dbConn.php'); 

$ntitle = $_POST['ntitle'];
$ndescript = $_POST['ndescript'];

$sql = mq("INSERT INTO
          notice(ntitle, ndescript, ndate)
          VALUES('$ntitle', '$ndescript', NOW())
          ");

echo "
  <script>
    alert('작성되었습니다.');
    window.location = './notice.php';
  </script>
";
?>