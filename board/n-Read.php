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
    <form action=\"\">
      <div class=\"title\">{$query['ntitle']}</div>
      <div class=\"date\">{$query['ndate']}</div>
      <div class=\"line\"></div>
      <div class=\"descript\">{$query['ndescript']}</div>
      <input type=\"button\" value=\"수정\" onclick=\"location.href = './n-modify.php?id={$query['id']}'\">    
      <input type=\"button\" value=\"목록\" onclick=\"location.href = './notice.php'\">  
    </form>
    <form action=\"./n-delete.php\" method=\"post\">
        <input type=\"hidden\" value=\"{$query['id']}\" name=\"sid\">
        <input type=\"submit\" value=\"삭제\">  
      </form>
  </div>
  ";
  ?>
  
  
  

</body>
</html>