<?php
require_once('../db/dbConn.php'); 
$uid = $_SESSION['userid'];

if(isset($uid)) {
?>
<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <title>VIEW.S</title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/s-menu.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/menu.js"></script>
</head>
<body>
  <?php 
  require_once('../data/menu.php');
  require_once('../data/icon.php');
  ?>
  <input type="button" value="로그아웃" onclick="location.href='../db/sd.php'">
</body>
</html>
<?php
} else {
  echo "
  <script>
    window.location = '../user/sign-in.php';
  </script>
  ";
}
?>
