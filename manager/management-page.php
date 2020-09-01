<?php 
include "../db/dbConn.php";
?>
<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <title>VIEW.S - 관리자페이지</title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/s-menu.css">
  <link rel="stylesheet" type="text/css" href="../css/manage.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/menu.js"></script>
  <script type="text/javascript" src="../js/upload.js"></script>
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
    <?php 
    $sql = mq("SELECT * FROM category");
    ?>
      <select name="category">
        <option value="top">상의</option>
        <option value="bottom">하의</option>
        <option value="shoes">신발</option>
      </select>
      </option>
      <input type="text">
      <input type="image" src="../asset/icon/search.png" class="s-btn">
    </form>
    <ul>
      <li class="menu">
        <a>상의</a>
        <ul class="hide">
        <?php
        while($query = mysqli_fetch_array($sql)) {
          echo "<li>".$query['name']."</li>";
          if($query['id'] == 4) {
            break;
          }
        }
        ?>
        </ul>
      </li>

      <li class="menu">
        <a>하의</a>
        <ul class="hide">
        <?php
        while($query = mysqli_fetch_array($sql)) {
          echo "<li>".$query['name']."</li>";
        }
        ?>
        </ul>
      </li>
    </ul>
  </div>
  
  <fieldset class="upload">
    <legend>상품등록</legend>
    <form method="post" action="">
      <input class="u-name" type="text" placeholder="상품명">
      <input class="u-descript" type="text" placeholder="상품설명">
      <input type="file" id="u-image" accept="image/*" onchange="SetThumbnail(event);">
      <div id="u-image-container"></div>
      <input class="g-btn" type="submit" value="등록하기">
    </form>
  </fieldset>
  <fieldset class="modify">
    <legend>상품수정</legend>
    <form method="post" action="">
      <input class="m-search" type="text" placeholder="상품코드">
      <input type="image" src="../asset/icon/search.png" class="m-btn">
    </form>
    <form class="g-list">
      <div class="g-once">
        <div class="g-once-c">
          <h5><a href="">상품이름1</a></h5>
          <img class="g-pic" src="../asset/icon/hot.png">
          <p class="g-des">
            이 상품으로 말할 것 같으면 이러쿵 저러쿵 해서 이런식으로 탄생한 비밀이 숨어있지요 그런데 이게 왜 그랬냐면요 말하자면 긴데
          </p>
        </div>
        <input class="g-m-btn" type="submit" value="수정">
      </div>
      
    </form>
    <div class="line"></div>
    <form method="post" action="">
      <input class="m-name" type="text" placeholder="상품명">
      <input class="m-descript" type="text" placeholder="상품설명">
      <input type="file" id="m-image" accept="image/*" onchange="mSetThumbnail(event);">
      <div id="m-image-container"></div>
      <input class="g-btn-m" type="submit" value="등록하기">
    </form>
  </fieldset>


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