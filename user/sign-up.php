<?php 
require_once('../db/dbConn.php'); 
?>
<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <title>VIEW.S - 회원가입</title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/s-menu.css">
  <link rel="stylesheet" type="text/css" href="../css/sign-up.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/menu.js"></script>
</head>
<body>
  <?php 
  require_once('../data/menu.php');
  require_once('../data/icon.php');
  ?>
  <fieldset>
    <form action="./sign-up-check.php" method="post">
      <input type="text" name="name" placeholder="NAME">
      <input type="text" name="uid" placeholder="ID">
      <input type="password" name="pw" placeholder="PW">
      <input type="password" name="pwc" placeholder="PW-CHECK">
      <input type="text" name="mail" placeholder="E-MAIL">
      <input type="submit" value="SIGN-IN">
    </form>
  </fieldset>



</body>
</html>