<?php 
require_once('../db/dbConn.php'); 
?>
<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <title>VIEW.S - 로그인</title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/s-menu.css">
  <link rel="stylesheet" type="text/css" href="../css/sign-in.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/menu.js"></script>
</head>
<body>
  <?php 
  require_once('../data/menu.php');
  require_once('../data/icon.php');
  ?>
  <fieldset>
    <input type="button" value="회원가입" onclick="location.href='../user/sign-up.php'">
    <input type="button" value="ID / PW 찾기" onclick="location.href='../user/u-search.php'">
  </fieldset>
  <fieldset>
    <form action="" method="post">
      <input type="text" class="id-pw" name="" placeholder="ID">
      <input type="password" class="id-pw" name="" placeholder="PW">
      <input type="submit" value="로그인">
    </form>
  </fieldset>



</body>
</html>