<?php 
include "../db/dbConn.php";
$cid = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="kr">

<head>
  <meta charset="UTF-8">
  <title>VIEW.S</title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/s-menu.css">
  <link rel="stylesheet" type="text/css" href="../css/goods.css">
  <link rel="stylesheet" type="text/css" href="../css/page.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/menu.js"></script>
</head>

<body>
  <div class="top-menu">
    <a href="../index.php">
      <h2 class="main">VIEW.S</h2>
    </a>
    <a href="../pages/cart.html">
      <img class="cart" src="../asset/icon/shopping-cart.png" alt="Cart">
    </a>
    <a href="../pages/mypage.html">
      <img class="user" src="../asset/icon/user.png" alt="MyPage">
    </a>
  </div>
  <div class="btn"></div>
  <div id="menu">
    <div class="close"></div>
    <form class="search" method="post" action="">
      <select name="category">
        <?php
        $sql = mq("SELECT name FROM tCategory");
        while($tc = mysqli_fetch_array($sql)) {
          echo "<option>{$tc['name']}</option>";
        }
        ?>
      </select>
      <input type="text">
      <input type="image" src="../asset/icon/search.png" class="s-btn">
    </form>
    <ul>
      <li class="menu">
        <a>top</a>
        <ul class="hide">
        <?php
        $sql = mq("SELECT c.id, c.name, t.name AS tname 
                    FROM category c 
                    LEFT JOIN tCategory t 
                    ON c.tCid = t.id
                    WHERE t.name = 'top'");
        while($query = mysqli_fetch_array($sql)) {
          echo "<li><a href=\"../pages/goods.php?id={$query['id']}\">{$query['name']}</a></li>";
        }
        ?>
        </ul>
      </li>

      <li class="menu">
        <a>bottom</a>
        <ul class="hide">
        <?php
        $sql = mq("SELECT c.id, c.name, t.name AS tname 
                    FROM category c 
                    LEFT JOIN tCategory t 
                    ON c.tCid = t.id
                    WHERE t.name = 'bottom'");
        while($query = mysqli_fetch_array($sql)) {
          echo "<li><a href=\"../pages/goods.php?id={$query['id']}\">{$query['name']}</a></li>";
        }
        ?>
        </ul>
      </li>

      <li class="menu">
        <a>shoes</a>
        <ul class="hide">
        <?php
        $sql = mq("SELECT c.id, c.name, t.name AS tname 
                    FROM category c 
                    LEFT JOIN tCategory t 
                    ON c.tCid = t.id
                    WHERE t.name = 'shoes'");
        while($query = mysqli_fetch_array($sql)) {
          echo "<li><a href=\"../pages/goods.php?id={$query['id']}\">{$query['name']}</a></li>";
        }
        ?>
        </ul>
      </li>
    </ul>
  </div>
  
  <div class="hot-goods">
    <?php
    // 인기상품
    $sql = mq("SELECT * 
                FROM goods 
                ORDER BY gprice DESC 
                LIMIT 4");
    while($hot = mysqli_fetch_array($sql)) {
      echo "<div class=\"hot-list\">";
      echo "<a href=\"\">";
      echo "<img src=\"../asset/img/top/{$hot['gpicture']}\" alt=\"\">";
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
  /*
  if(isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }

  $sql = mq("SELECT * 
            FROM goods
            ");
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
  $sql = mq("SELECT *
            FROM goods
            WHERE gcid = $cid
            ORDER BY id DESC
            LIMIT $start_num, $list
            ");
  while($goods = mysqli_fetch_array($sql)) {
    $title = $goods['gname'];

    if(stelen($title) > 20) {
      $title = str_replace($goods['gname'], mb_substr($goods['gname'], 0, 20, "UTF-8")."...", $goods['gname']);
    }
  }
  */
  ?>
  <div class="normal-goods">
    <?php
    // 일반상품
    if(isset($cid)) {
      $sql = mq("SELECT * 
                FROM goods 
                WHERE gcid = $cid
                ORDER BY id DESC 
                LIMIT 15");
    } else {
      $sql = mq("SELECT * 
                FROM goods 
                ORDER BY id DESC 
                LIMIT 15");
    }
    
    $c_sql = mysqli_num_rows($sql);
    if($c_sql != 0) {
      while($normal = mysqli_fetch_array($sql)) {
        echo "<div class=\"normal-list\">";
        echo "<a href=\"\">";
        echo "<img src=\"../asset/img/top/{$normal['gpicture']}\" alt=\"상품사진\">";
        echo "<div class=\"normal-name\">";
        echo "<small>{$normal['gname']}</small>";
        echo "</div>";
        echo "</a>";
        echo "</div>";
      }
    } else {
      echo "<p style=\"text-align: center;\">상품이 없습니다.</p>";
      echo "</div>";
    }
    ?>
    <div class="page-num">
      
      <ul>
        <li>이전</li>
        <li>1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
        <li>5</li>
        <li>6</li>
        <li>7</li>
        <li>8</li>
        <li>9</li>
        <li>10</li>
        <li>다음</li>
      </ul>
    </div>

  </div>
  <?php
  /*
  if(isset($_GET['id'])) {
    echo "hi";
  } else {
    echo "bye";
  }*/
  ?>


  <!-- 아이콘 -->
  <p class="icon">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    Icons made by <a href="https://www.flaticon.com/authors/pixel-perfect" title="Pixel perfect">Pixel perfect</a> from
    <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
  </p>
</body>

</html>