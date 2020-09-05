<?php 
require_once('../db/dbConn.php'); 
require_once('../data/menu.php'); 
$cid = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="kr">

<head>
  <meta charset="UTF-8">
  <title>VIEW.S - 상품</title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/s-menu.css">
  <link rel="stylesheet" type="text/css" href="../css/goods.css">
  <link rel="stylesheet" type="text/css" href="../css/page.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/menu.js"></script>
</head>

<body>
  <?php 
  require_once('../data/menu.php');
  require_once('../data/icon.php');
  ?>
  <div class="hot-goods">
    <?php
    // 인기상품
    $sql = mq("SELECT g.id AS id, g.gname AS gname, g.gexplain AS gexplain, g.gcid AS gcid, g.gpicture AS gpicture, g.gprice AS gprice, c.name AS cname, c.tCid AS tCid, t.name AS tname
            FROM goods g
            LEFT JOIN category c
            ON g.gcid = c.id
            LEFT JOIN tCategory t
            ON c.tCid = t.id
            ORDER BY g.gprice DESC
            LIMIT 4
            ");
    while($hot = mysqli_fetch_array($sql)) {
      echo "<div class=\"hot-list\">";
      echo "<a href=\"\">";
      echo "<img src=\"../asset/img/{$hot['tname']}/{$hot['gpicture']}\" alt=\"\">";
      echo "<div class=\"hot-name\">";
      echo "<mark>HOT!</mark>";
      echo "<small>{$hot['gname']}</small>";
      echo "</div>";
      echo "</a>";
      echo "</div>";
    }
    ?>
  </div>
  
  <div class="category-search">
    <div class="view-category">
      <?php 
      // 카테고리 명 표시
      if(isset($cid)) {
        $sql = mq("SELECT DISTINCT c.name AS cname, t.name AS tname
                  FROM goods g
                  LEFT JOIN category c
                  ON g.gcid = c.id
                  LEFT JOIN tCategory t
                  ON c.tCid = t.id
                  WHERE g.gcid = $cid
                  LIMIT 1
                  ");
        while($normal = mysqli_fetch_array($sql)) {
          echo "<h1>{$normal['tname']}</h1>";
          echo "<h3>{$normal['cname']}</h3>";
        }
      } else {
        echo "<h1>대분류</h1>";
        echo "<h3>소분류</h3>";
      }
      ?>
    </div>
    <div class="vc-list">
      <?php
      $sql = mq("SELECT c.id AS cid, c.name AS cname, t.name AS tname 
                FROM category c 
                LEFT JOIN tCategory t 
                ON c.tCid = t.id
                ");
      echo "<div class=\"vc-p\">";
      while($normal = mysqli_fetch_array($sql)) {
        echo "<h6><a href=\"../pages/goods.php?id={$normal['cid']}\">{$normal['cname']}</a></h6>";
      }
      echo "</div>";
      ?>
    </div>
  </div>
  <?php
  if(isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  if(isset($cid)) {
    $sql = mq("SELECT *
              FROM goods
              WHERE gcid = $cid
              ");
  } else {
    $sql = mq("SELECT * 
            FROM goods
            ");
  }
  $goods_total = mysqli_num_rows($sql); // 상품 총 갯수
  $list = 15; // 한 페이지 당 상품 수
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
  if(isset($cid)) {
    $sql = mq("SELECT g.id AS id, g.gname AS gname, g.gexplain AS gexplain, g.gcid AS gcid, g.gpicture AS gpicture, c.name AS cname, c.tCid AS tCid, t.name AS tname
            FROM goods g
            LEFT JOIN category c
            ON g.gcid = c.id
            LEFT JOIN tCategory t
            ON c.tCid = t.id
            WHERE g.gcid = $cid
            ORDER BY g.id DESC
            LIMIT $start_num, $list
            ");
  } else {
    $sql = mq("SELECT g.id AS id, g.gname AS gname, g.gexplain AS gexplain, g.gcid AS gcid, g.gpicture AS gpicture, c.name AS cname, c.tCid AS tCid, t.name AS tname
            FROM goods g
            LEFT JOIN category c
            ON g.gcid = c.id
            LEFT JOIN tCategory t
            ON c.tCid = t.id
            ORDER BY id DESC
            LIMIT $start_num, $list
            ");
  }


  echo "<div class=\"normal-goods\">";
  $c_sql = mysqli_num_rows($sql); 
  if($c_sql != 0) {
    while($goods = mysqli_fetch_array($sql)) {
      $title = $goods['gname'];
      if(strlen($title) > 18) {
        $title = str_replace($goods['gname'], mb_substr($goods['gname'], 0, 18, "UTF-8")."...", $goods['gname']);
      }
      echo "<div class=\"normal-list\">";
      echo "<a href=\"\">";
      echo "<img src=\"../asset/img/{$goods['tname']}/{$goods['gpicture']}\" alt=\"상품사진\">";
      echo "<div class=\"normal-name\">";
      echo "<small>{$title}</small>";
      echo "</div>";
      echo "</a>";
      echo "</div>";
    } 
  } else {
    echo "<p style=\"text-align: center;\">상품이 없습니다.</p>";
    echo "</div>";
  }

    echo "<div class=\"page-num\">";
      echo "<ul>";
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
      echo "</ul>";
    echo "</div>";
  echo "</div>";
  ?>
  
</body>

</html>