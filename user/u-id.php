<?php
require_once('../db/dbConn.php'); 
$uname = $_POST['uname'];
$umail = $_POST['umail'];

$sql = mq("SELECT uid
          FROM users
          WHERE uname = '$uname'
          AND umail = '$umail'
          ");
$query = mysqli_fetch_array($sql);

if(isset($query['id'])) {
  echo "
  <script>
    alert('{$uname}님의 아이디는 {$query['uid']} 입니다.');
    window.location = '../user/u-search.php';
  </script>
  ";
} else {
  echo "
  <script>
    alert('입력 정보를 확인해주시기 바랍니다.');
    window.location = '../user/u-search.php';
  </script>
  ";
}

?>