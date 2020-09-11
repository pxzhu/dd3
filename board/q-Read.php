<?php 
require_once('../db/dbConn.php'); 
$gid = $_GET['id'];
$uid = $_SESSION['userid'];

$sql = mq("SELECT quid
          FROM qna
          WHERE id = '$gid'
          ");
$query = mysqli_fetch_array($sql);
if($uid === $query['quid'] || $uid === 'admin') {
  echo "
  <!DOCTYPE html>
  <html lang=\"kr\">
  <head>
    <meta charset=\"UTF-8\">
    <title>VIEW.S - 문의</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"../css/menu.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"../css/s-menu.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"../css/read.css\">
    <script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-3.5.1.min.js\"></script>
    <script type=\"text/javascript\" src=\"../js/menu.js\"></script>
  </head>
  <body>
  ";
    require_once('../data/menu.php');
    require_once('../data/icon.php');
  
    $sql = mq("SELECT *
              FROM qna
              WHERE id = $gid
              ");
    $query = mysqli_fetch_array($sql);
  
    echo "
    <div class=\"read\">
      <form action=\"\">
        <div class=\"title\">{$query['qtitle']}</div>
        <div class=\"date\">{$query['qdate']}</div>
        <div class=\"line\"></div>
        <div class=\"descript\">{$query['qdescript']}</div>
        <input type=\"button\" value=\"수정\" onclick=\"location.href = './q-modify.php?id={$query['id']}'\">    
        <input type=\"button\" value=\"목록\" onclick=\"location.href = './qna.php'\">  
      </form>
      <form action=\"./q-delete.php\" method=\"post\">
          <input type=\"hidden\" value=\"{$query['id']}\" name=\"sid\">
          <input type=\"submit\" value=\"삭제\">  
        </form>
    </div> 
  </body>
  </html>
  ";
} else {
  echo "
  <script>
    alert('권한이 없습니다.');
    window.history.back();
  </script>
  ";
}
?>
