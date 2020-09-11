<?php 
require_once('../db/dbConn.php'); 
$gid = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <title>VIEW.S - 문의</title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/s-menu.css">
  <link rel="stylesheet" type="text/css" href="../css/read.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/menu.js"></script>
</head>
<body>
  <?php 
  require_once('../data/menu.php');
  require_once('../data/icon.php');

  $sql = mq("SELECT *
            FROM qna
            WHERE id = $gid
            ");
  $query = mysqli_fetch_array($sql);

  echo "
  <div class=\"read\">
    <form action=\"./q-update.php\" method=\"post\">
      <input type=\"hidden\" value=\"{$query['id']}\" name=\"qid\">
      <div class=\"title\"><input type=\"text\" value=\"{$query['qtitle']}\" name=\"qtitle\"></div>
      <div class=\"date\">{$query['qdate']}</div>
      <div class=\"line\"></div>
      <div class=\"descript\"><textarea name=\"qdescript\">{$query['qdescript']}</textarea></div>
      <input type=\"submit\" value=\"완료\">    
      <input type=\"button\" value=\"취소\" onclick=\"location.href = './qna.php'\">  
    </form>
  </div>
  ";
  ?>
  
  
  

</body>
</html>