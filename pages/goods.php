<?php 
require_once('../db/dbConn.php'); 
require_once('../data/menu.php'); 
$cid = $_GET['id'];
$category = $_POST['category'];
$stext = $_POST['stext'];
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
      echo "
      <div class=\"hot-list\">
        <a href=\"\">
          <img src=\"../asset/img/{$hot['tname']}/{$hot['gpicture']}\" alt=\"\">
          <div class=\"hot-name\">
            <mark>HOT!</mark>
            <small>{$hot['gname']}</small>
          </div>
        </a>
      </div>
      ";
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
        $s = 1;
      } else if(isset($category) && isset($stext)) {
        $sql = mq("SELECT DISTINCT c.name AS cname, t.name AS tname
                  FROM goods g
                  LEFT JOIN category c
                  ON g.gcid = c.id
                  LEFT JOIN tCategory t
                  ON c.tCid = t.id
                  WHERE c.name = '$category'
                  AND g.gname LIKE '%$stext%'
                  ");
        while($normal = mysqli_fetch_array($sql)) {
          echo "<h1>{$normal['tname']}</h1>";
          echo "<h3>{$normal['cname']}</h3>";
        }
        $s = 2;
      } else {
        echo "<h1>대분류</h1>";
        echo "<h3>소분류</h3>";
        $s = 3;
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
  if($s === 1) {
    $sql = mq("SELECT *
              FROM goods
              WHERE gcid = $cid
              ");
  } else if($s === 2) {
    $sql = mq("SELECT *
              FROM goods g
              LEFT JOIN category c
              ON g.gcid = c.id
              WHERE c.name = '$category'
              AND g.gname LIKE '%$stext%'
              ");
  } else {
    $sql = mq("SELECT * 
            FROM goods
            ");
  }
  $list = 15; // 한 페이지 당 상품 수
  $page_list = 10; // 페이지 갯수
  require_once('../data/pre-page.php');
  if($s === 1) {
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
  } else if($s === 2) {
    $sql = mq("SELECT g.id AS id, g.gname AS gname, g.gexplain AS gexplain, g.gcid AS gcid, g.gpicture AS gpicture, c.name AS cname, c.tCid AS tCid, t.name AS tname
            FROM goods g
            LEFT JOIN category c
            ON g.gcid = c.id
            LEFT JOIN tCategory t
            ON c.tCid = t.id
            WHERE c.name = '$category'
            AND g.gname LIKE '%$stext%'
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
      echo "
      <div class=\"normal-list\">
        <a href=\"./goods-detail.php?id={$goods['id']}\">
          <img src=\"../asset/img/{$goods['tname']}/{$goods['gpicture']}\" alt=\"상품사진\">
          <div class=\"normal-name\">
            <small>{$title}</small>
          </div>
        </a>
      </div>
      ";
    } 
  } else {
    echo "<p style=\"text-align: center;\">상품이 없습니다.</p>";
    echo "</div>";
  }
  require_once('../data/page.php');
  ?>
  
</body>

</html>