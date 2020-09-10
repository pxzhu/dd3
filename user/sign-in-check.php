<?php 
require_once('../db/dbConn.php'); 
$uid = $_POST['uid'];
$upw = $_POST['upw'];


$sql = mq("SELECT uid, upw
          FROM users
          WHERE uid = '$uid'
          ");
$query = mysqli_fetch_array($sql);

$hash = $query['upw'];

if(password_verify($upw, $hash)) {
  $_SESSION['userid'] = $query['uid'];
  $_SESSION['userpw'] = $query['upw'];
  echo "
  <script>
    window.location = '../pages/mypage.php';
  </script>
  ";
} else {
  echo "
  <script>
    alert('ID 혹은 PW를 확인해주세요.');
    window.location = '../user/sign-in.php';
  </script>
  ";
}
?>