<?php
require_once('../db/dbConn.php'); 

$gcode = $_POST['gcode'];
$gpicture = $_POST['gpicture'];
$cname = $_POST['cname'];
$tname = $_POST['tname'];

$sql = mq("DELETE
          FROM goods
          WHERE gcode = '$gcode'
          ");
unlink('../asset/img/'.$tname.'/'.$gpicture)
?>
<script>
  alert('삭제되었습니다.');
  window.location = './management-page.php';
</script>