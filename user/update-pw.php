<?php
require_once('../db/dbConn.php');

$uid = $_POST['uid'];
$pw = $_POST['upw'];
$pwc = $_POST['upwc'];

if($pw === $pwc) {
  $pw = password_hash($_POST['upw'], PASSWORD_DEFAULT);
  $sql = mq("UPDATE users
            SET upw = '$pw'
            WHERE uid = '$uid'
            ");
  echo "
  <script>
    alert('비밀번호가 변경되었습니다.');
    window.location = '../user/sign-in.php';
  </script>
  ";
} else {
  echo "
  <script>
    alert('입력 정보를 확인해주시기 바랍니다.');
    window.history.back();
  </script>
  ";
}
?>