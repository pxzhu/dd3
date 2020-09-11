<?php 
require_once('../db/dbConn.php'); 
?>
<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <title>VIEW.S - 문의</title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/s-menu.css">
  <link rel="stylesheet" type="text/css" href="../css/create.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/menu.js"></script>
</head>
<body>
  <?php 
  require_once('../data/menu.php');
  require_once('../data/icon.php');

  echo "
  <div class=\"read\">
    <form action=\"./q-create.php\" method=\"post\">
      <div class=\"title\"><input type=\"text\" name=\"qtitle\" placeholder=\"제목\"></div>
      <div class=\"date\"></div>
      <div class=\"line\"></div>
      <div class=\"descript\"><textarea name=\"qdescript\" placeholder=\"내용\"></textarea></div>
      <input type=\"submit\" value=\"완료\">    
      <input type=\"button\" value=\"취소\" onclick=\"location.href = './qna.php'\">  
    </form>
  </div>
  ";
  ?>
  
  
  

</body>
</html>