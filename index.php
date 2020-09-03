<?php 
include "./db/dbConn.php";
?>
<!DOCTYPE html>
<html lang="kr">

<head>
  <meta charset="UTF-8">
  <title>VIEW.S</title>
  <link rel="stylesheet" type="text/css" href="./css/menu.css">
  <link rel="stylesheet" type="text/css" href="./css/s-menu.css">
  <link rel="stylesheet" type="text/css" href="./css/main.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="./js/slide.js"></script>
  <script type="text/javascript" src="./js/menu.js"></script>
</head>

<body>
  <div class="top-menu">
    <a href="./index.php">
      <h2 class="main">VIEW.S</h2>
    </a>
    <a href="./pages/cart.html">
      <img class="cart" src="./asset/icon/shopping-cart.png" alt="Cart">
    </a>
    <a href="./pages/mypage.html">
      <img class="user" src="./asset/icon/user.png" alt="MyPage">
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
      <input type="image" src="./asset/icon/search.png" class="s-btn">
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
          echo "<li><a href=\"./pages/goods.php?id={$query['id']}\">{$query['name']}</a></li>";
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
          echo "<li><a href=\"./pages/goods.php?id={$query['id']}\">{$query['name']}</a></li>";
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
  <div class="slide">
    <ul>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <span class="board">
    <div>
      <h4><a href="">최근 상품평</a></h4>
      <h6><a href="">more</a></h6>
      <nav class="some_review">
        <div>
          <img class="re_pic" src="./asset/icon/hot.png">
          <h5><a href="">상품이름1</a></h5>
          <img class="star" src="./asset/icon/star.png">
          <img class="star" src="./asset/icon/star.png">
          <img class="star" src="./asset/icon/star.png">
          <img class="star" src="./asset/icon/star.png">
          <img class="star" src="./asset/icon/star.png">
          <p class="re_des">
            상품이 아주 좋구만 그래서 또 사고싶지만 거지라 못사지롱ㅋㅋ ㅠㅠ
          </p>
        </div>
        <div>
          <img class="re_pic" src="./asset/icon/new.png">
          <h5><a href="">상품이름2</a></h5>
          <img class="star" src="./asset/icon/star.png">
          <img class="star" src="./asset/icon/star.png">
          <img class="star" src="./asset/icon/star.png">
          <img class="star" src="./asset/icon/favourite.png">
          <img class="star" src="./asset/icon/favourite.png">
          <p class="re_des">
            상품이 아주 별로구만 그래서 추천하지 않는다네 별은 그래도 1개는 너무해서 3개줬다네..
          </p>
        </div>
      </nav>
    </div>
    <div>
      <h4><a href="">공지사항</a></h4>
      <h6><a href="">more</a></h6>
      <ul>
        <li>안</li>
        <li>녕</li>
        <li>하</li>
        <li>세</li>
        <li>요</li>
        <li>?</li>
      </ul>
    </div>
    <div>
      <h4><a href="">문의사항</a></h4>
      <h6><a href="">more</a></h6>
      <ul>
        <li>물</li>
        <li>어</li>
        <li>보</li>
        <li>세</li>
        <li>요</li>
        <li>!</li>
      </ul>
    </div>
  </span>


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