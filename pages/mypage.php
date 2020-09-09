<?php
$uid = $_SESSION['uid'];

if(isset($uid)) {

} else {
  echo "
  <script>
    window.location = '../user/sign-in.php';
  </script>
  ";
}
?>