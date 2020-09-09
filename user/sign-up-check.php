<?php
require_once('../db/dbConn.php'); 
$name = $_POST['name'];
$uid = $_POST['uid'];
$pw = $_POST['pw'];
$pwc = $_POST['pwc'];
$mail = $_POST['mail'];

$sql = mq("SELECT uid
        FROM users
        WHERE uid = '$uid'
        ");
$query = mysqli_num_rows($sql);

if($query >= 1) {
  echo "
  <script>
    alert('중복된 아이디가 존재합니다.');
    history.back();
  </script>
  ";
} else {
  if($pw === $pwc) {
    $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $sql = mq("INSERT INTO
              users(uname, uid, upw, umail)
              VALUES('$name', '$uid', '$pw', '$mail')
              ");
    echo "
    <script>
      alert('회원가입이 완료되었습니다.');
      window.location = '../user/sign-in.php';
    </script>
    ";

  } else {
    echo "
    <script>
      alert('비밀번호가 일치하지 않습니다.');
      history.back();
    </script>
    ";
  }

}