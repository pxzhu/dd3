<?php
require_once('../db/dbConn.php');
$uid = $_SESSION['userid'];
$gcode = $_POST['gcode'];

if(isset($_SESSION['userid'])) {
  $sql = mq("INSERT INTO
            carts(cuid, cgcode)
            VALUES('$uid', '$gcode')
            ");
  echo "
  <script>
    alert('장바구니로 이동합니다.');
    window.location = '../pages/cart.php';
  </script>
  ";
} else {
  echo "
  <script>
    alert('로그인 후 이용바랍니다.');
    window.history.back();
  </script>
  ";
}
?>