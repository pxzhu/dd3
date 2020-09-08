<?php 
require_once('../db/dbConn.php'); 
$gid = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <title>VIEW.S - 공지</title>
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
            FROM notice
            WHERE id = $gid
            ");
  $query = mysqli_fetch_array($sql);

  echo "
  <div class=\"read\">
    <form action=\"./n-update.php\" method=\"post\">
      <input type=\"hidden\" value=\"{$query['id']}\" name=\"nid\">
      <div class=\"title\"><input type=\"text\" value=\"{$query['ntitle']}\" name=\"ntitle\"></div>
      <div class=\"date\">{$query['ndate']}</div>
      <div class=\"line\"></div>
      <div class=\"descript\"><textarea name=\"ndescript\">{$query['ndescript']}</textarea></div>
      <input type=\"submit\" value=\"완료\">    
      <input type=\"button\" value=\"취소\" onclick=\"location.href = './notice.php'\">  
    </form>
  </div>
  ";
  ?>
  
  
  

</body>
</html>