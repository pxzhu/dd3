<?php 
require_once('../db/dbConn.php'); 
require_once('../data/menu.php'); 
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
  <?php 
  require_once('../data/menu.php');
  require_once('../data/icon.php');
  ?>
  
  <fieldset class="upload">
    <legend>상품등록</legend>
    <form method="post" action="../manager/g-regi.php" enctype="multipart/form-data">
      <input class="u-name" type="text" name="gname" placeholder="상품명">
      <input class="u-descript" type="text" name="gexplain" placeholder="상품설명">
      <select class="category" name="gcategory">
        <?php
        $sql = mq("SELECT name FROM category");
        while($tc = mysqli_fetch_array($sql)) {
          echo "<option value=\"{$tc['name']}\">{$tc['name']}</option>";
        }
        ?>
      </select>
      <input class="u-price" type="text" name="gprice" placeholder="상품가격">
      <input type="file" id="u-image" name="gimg" accept="image/*" onchange="SetThumbnail(event);">
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
</body>

</html>