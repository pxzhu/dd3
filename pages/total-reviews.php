<?php 
require_once('../db/dbConn.php'); 
?>
<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <title>VIEW.S - 리뷰</title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/s-menu.css">
  <link rel="stylesheet" type="text/css" href="../css/t-r.css">
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
    <legend>상품평</legend>
    <?php
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
    if(isset($gid)) {
      $sql = mq("SELECT *
                FROM goods g
                LEFT JOIN reviews r
                ON g.gcode = r.rgcode
                WHERE g.id = $gid
                ");
    } else {
      $sql = mq("SELECT * 
              FROM reviews
              ");
    }
    $goods_total = mysqli_num_rows($sql); // 상품 총 갯수
    $list = 8; // 한 페이지 당 상품 수
    $page_list = 10; // 페이지 갯수
    $page_num = ceil($page / $page_list); // 현재 페이지 위치
    $page_start = (($page_num - 1) * $page_list) + 1; // 페이지 시작 번호
    $page_end = $page_start + $page_list - 1; // 페이지 끝 번호
    $page_total = ceil($goods_total / $list); // 페이징 한 페이지 수 구하기
      
    if($page_end > $page_total) {
      $page_end = $page_total;
    } // 만약 블록의 마지막 번호가 페이지 수 보다 많다면 마지막 번호는 페이지 수
    $pl_total = ceil($page_total / $page_list); // 블록 총 갯수
    $start_num = ($page - 1) * $list;
    $sql = mq("SELECT r.id AS rid, g.id AS gid, r.rpicture AS rpicture, r.rdescript AS rdescript, t.name AS tname
              FROM reviews r
              LEFT JOIN goods g
              ON g.gcode = r.rgcode
              LEFT JOIN category c 
              ON g.gcid = c.id
              LEFT JOIN tCategory t
              ON c.tCid = t.id
              ORDER BY rid DESC
              LIMIT $start_num, $list
              ");
    while($query = mysqli_fetch_array($sql)) {
      $descript = $query['rdescript'];
      if(strlen($descript) > 15) {
        $descript = str_replace($query['rdescript'], mb_substr($query['rdescript'], 0, 15, "UTF-8")."...", $query['rdescript']);
      }
      echo "
    <div class=\"review-list\">
      <a href=\"../pages/goods-detail.php?id={$query['gid']}\">
        <img src=\"../asset/img/rimg/{$query['tname']}/{$query['rpicture']}\">
        <p>{$descript}</p>
      </a>
    </div>
    ";
    }
    echo "
      <div class=\"page-num\">
        <ul>
      ";
        if($page <= 1) {
        } else {
          echo "<li><a href='?page=1'>처음</a></li>";
          $pre = $page - 1;
          echo "<li><a href='?page=$pre'>이전</a></li>";
        }
        for($i = $page_start; $i <= $page_end; $i++) {
          if($page == $i) {
            echo "<li class=\"pn-select\">$i</li>";
          } else {
            echo "<li><a href='?page=$i'>$i</a></li>";
          }
        }
        if($page_num < $page_total) {
          $next = $page + 1;
            if($next <= $page_total) {
              echo "<li><a href='?page=$next'>다음</a></li>";
            }
        }
        if($page >= $page_total) {
        } else {
          echo "<li><a href='?page=$page_total'>마지막</a></li>";
        }
        echo "
        </ul>
      </div>
    ";
    ?>
  </fieldset>
</body>
</html>