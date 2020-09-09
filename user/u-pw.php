<?php
require_once('../db/dbConn.php');

$uname = $_POST['uname'];
$uid = $_POST['uid'];
$umail = $_POST['umail'];

$sql = mq("SELECT *
          FROM users
          WHERE uname = '$uname'
          AND uid = '$uid'
          AND umail = '$umail'
          ");
$query = mysqli_fetch_array($sql);
?>

  
  <?php
  
  if(isset($query['id'])) {
    echo "
    <!DOCTYPE html>
    <html lang=\"kr\">
    <head>
      <meta charset=\"UTF-8\">
      <title>VIEW.S - 로그인</title>
      <link rel=\"stylesheet\" type=\"text/css\" href=\"../css/menu.css\">
      <link rel=\"stylesheet\" type=\"text/css\" href=\"../css/s-menu.css\">
      <link rel=\"stylesheet\" type=\"text/css\" href=\"../css/u-pw.css\">
      <script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-3.5.1.min.js\"></script>
      <script type=\"text/javascript\" src=\"../js/menu.js\"></script>
    </head>
    <body>
    ";
      require_once('../data/menu.php');
      require_once('../data/icon.php');
    echo "
      <fieldset>
      <legend>새 비밀번호</legend>
        <form action=\"update-pw.php\" method=\"post\">
          <input type=\"hidden\" name=\"uid\" value=\"{$uid}\">
          <input type=\"password\" name=\"upw\" placeholder=\"새 비밀번호\">
          <input type=\"password\" name=\"upwc\" placeholder=\"새 비밀번호 확인\">
          <input type=\"submit\" value=\"변경\">
        </form>
      </fieldset>
    ";
    
  } else {
    echo "
    <script>
      alert('입력 정보를 확인해주시기 바랍니다.');
      window.location = '../user/u-search.php';
    </script>
    ";
  }
  ?>