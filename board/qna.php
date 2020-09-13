<?php
require_once('../db/dbConn.php');
$uid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <title>VIEW.S - 문의</title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/s-menu.css">
  <link rel="stylesheet" type="text/css" href="../css/board.css">
  <link rel="stylesheet" type="text/css" href="../css/page.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/menu.js"></script>
</head>
<body>
  <?php 
  require_once('../data/menu.php');
  require_once('../data/icon.php');
  ?>
  <fieldset>
    <legend>문의사항</legend>
    <table>
      <tr>
        <th class="tnum">번호</th>
        <th class="ttitle">제목</th>
        <th class="tdate">날짜</th>
      </tr>
      <?php
      if(isset($_GET['page'])) {
        $page = $_GET['page'];
      } else {
        $page = 1;
      }
      $sql = mq("SELECT *
                FROM qna
                ORDER BY id DESC
                ");
      $list = 10; // 한 페이지 당 상품 수
      $page_list = 10; // 페이지 갯수
      require_once('../data/pre-page.php');
      $sql = mq("SELECT *
                FROM qna
                ORDER BY id DESC
                LIMIT $start_num, $list
                ");
      while($query = mysqli_fetch_array($sql)) {
        echo "
      <tr>
        <td>{$query['id']}</td>
        <td><a href=\"./q-Read.php?id={$query['id']}\">{$query['qtitle']}</a></td>
        <td>{$query['qdate']}</td>
      </tr>
        ";
      }      
      ?>
    </table>
    <?php require_once('../data/page.php'); ?>
    <input type="button" value="작성" onclick="location.href='./q-write.php'">
  </fieldset>
</body>
</html>