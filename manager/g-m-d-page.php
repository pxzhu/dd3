<?php 
require_once('../db/dbConn.php'); 
require_once('../data/menu.php'); 
$goodsCode = $_POST['gcode'];
$goodsCode = strtoupper($goodsCode);
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
    <form method="post" action="g-m-d-page.php">
      <input name="gcode" class="m-search" type="text" placeholder="상품코드">
      <input type="image" src="../asset/icon/search.png" class="m-btn">
    </form>
    <?php 
    if($goodsCode) {
      $sql = mq("SELECT *
                  FROM goods
                  WHERE gcode LIKE '%$goodsCode%'
                  LIMIT 1
                ");
      $fsql = mysqli_fetch_array($sql);
      if(empty($fsql['gcode'])) {
        echo "<script>
                alert('상품이 없습니다.');
                window.location = './management-page.php';
              </script>";
      } else {
        $sql = mq("SELECT g.gcode AS gcode, g.gname AS gname, g.gexplain AS gexplain, g.gprice AS gprice, g.gpicture AS gpicture, c.name AS cname, t.name AS tname
                  FROM goods g
                  LEFT JOIN category c
                  ON g.gCid = c.id
                  LEFT JOIN tCategory t
                  ON c.tCid = t.id
                  WHERE gcode LIKE '%$goodsCode%'
                  LIMIT 1
                  ");
        while($query = mysqli_fetch_array($sql)) {
          $gname = $query['gname'];
          $gexplain = $query['gexplain'];
          $gprice = $query['gprice'];
          $gcode = $query['gcode'];
          $gpicture = $query['gpicture'];
          $cname = $query['cname'];
          $tname = $query['tname'];
        }
      }
    } else {
      echo "<script>
              alert('잘못된 접근입니다.');
              window.location = './management-page.php';
            </script>";
    }
    ?>
    <form class="g-list" method="post" action="./g-d-page.php">
      <div class="g-once">
        <div class="g-once-c">
          <h5><a href=""><?php echo $gname; ?></a></h5>
          <img class="g-pic" src="../asset/img/<?php echo $tname."/".$gpicture; ?>">
          <p class="g-des">
            <?php echo $gexplain; ?>
          </p>
        </div>
        <input type="hidden" name="gcode" value="<?php echo $gcode; ?>">
        <input type="hidden" name="gpicture" value="<?php echo $gpicture; ?>">
        <input type="hidden" name="cname" value="<?php echo $cname; ?>">
        <input type="hidden" name="tname" value="<?php echo $tname; ?>">
        <input class="g-m-btn" type="submit" value="삭제">
      </div>
      
    </form>
    <div class="line"></div>
    <form method="post" action="g-m-page.php" enctype="multipart/form-data">
      <input class="m-name" type="text" name="gname" placeholder="상품명" value="<?php echo $gname; ?>">
      <input class="m-descript" name="gexplain" type="text" placeholder="상품설명" value="<?php echo $gexplain; ?>">
      <select class="category" name="gcategory">
        <?php
        $sql = mq("SELECT name FROM category");
        echo "<option value=\"{$cname}\" selected disabled hidden>{$cname}</option>";
        while($tc = mysqli_fetch_array($sql)) {
          echo "<option value=\"{$tc['name']}\">{$tc['name']}</option>";
        }
        ?>
      </select>
      <input class="u-price" type="text" name="gprice" placeholder="상품가격" value="<?php echo $gprice; ?>">
      <input type="file" id="m-image" name="gimg" accept="image/*" onchange="mSetThumbnail(event);">
      <div id="m-image-container">
        <img src="../asset/img/<?php echo $tname."/".$gpicture; ?>">
      </div>
      <input type="hidden" name="gcode" value="<?php echo $gcode; ?>">
      <input type="hidden" name="cname" value="<?php echo $cname; ?>">
      <input type="hidden" name="tname" value="<?php echo $tname; ?>">
      <input class="g-btn-m" type="submit" value="수정하기">
    </form>
  </fieldset>
</body>

</html>