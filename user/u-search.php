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
  <link rel="stylesheet" type="text/css" href="../css/u-search.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/menu.js"></script>
</head>
<body>
  <?php 
  require_once('../data/menu.php');
  require_once('../data/icon.php');
  ?>
  <div class="u-s-form">
    <fieldset class="search-id">
      <legend>ID 찾기</legend>
      <form action="u-id.php" method="post">
        <input type="text" name="uname" id="" placeholder="이름">
        <input type="text" name="umail" id="" placeholder="이메일">
        <input type="submit" class="search-btn" value=" 찾기">
      </form>
    </fieldset>
    <fieldset class="search-pw">
      <legend>PW 찾기</legend>
      <form action="u-pw.php" method="post">
        <input type="text" name="uname" id="" placeholder="이름">
        <input type="text" name="uid" id="" placeholder="아이디">
        <input type="text" name="umail" id="" placeholder="이메일">
        <input type="submit" class="search-btn" value=" 찾기">
      </form>
    </fieldset>
  </div>



</body>
</html>