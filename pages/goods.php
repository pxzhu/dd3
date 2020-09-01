<?php 
include "../db/dbConn.php";
?>
<!DOCTYPE html>
<html lang="kr">

<head>
  <meta charset="UTF-8">
  <title>VIEW.S</title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/s-menu.css">
  <link rel="stylesheet" type="text/css" href="../css/goods.css">
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
      </option>
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
  
  <div class="">

  </div>
  <div class="normal-goods">
  <?php
    // 일반상품
    $sql = mq("SELECT * 
                FROM goods 
                ORDER BY id DESC 
                LIMIT 15");
    while($normal = mysqli_fetch_array($sql)) {
      echo "<div class=\"normal-list\">";
      echo "<a href=\"\">";
      echo "<img src=\"../asset/img/top/{$normal['gpicture']}\" alt=\"\">";
      echo "<div class=\"normal-name\">";
      echo "<small>{$normal['gname']}</small>";
      echo "</div>";
      echo "</a>";
      echo "</div>";
    }
    ?>
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