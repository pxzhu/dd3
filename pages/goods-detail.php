<?php
require_once('../db/dbConn.php');
$gid = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <title>VIEW.S - 상품</title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/s-menu.css">
  <link rel="stylesheet" type="text/css" href="../css/g-detail.css">
  <link rel="stylesheet" type="text/css" href="../css/page.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/menu.js"></script>
  <script type="text/javascript" src="../js/upload.js"></script>
</head>
<body>
  <?php 
  require_once('../data/menu.php');
  require_once('../data/icon.php');
  $sql = mq("SELECT g.gcode AS gcode, g.gname AS gname, g.gexplain AS gexplain, g.gprice AS gprice, g.gpicture AS gpicture, c.name AS cname, t.name AS tname 
            FROM goods g 
            LEFT JOIN category c 
            ON g.gcid = c.id 
            LEFT JOIN tCategory t 
            ON c.tCid = t.id 
            WHERE g.id = '$gid'
            ");
  $query = mysqli_fetch_array($sql);
  echo "
  <div class=\"g-r-detail\">
    <form action=\"\" method=\"post\" class=\"goods-detail\">
      <img src=\"../asset/img/{$query['tname']}/{$query['gpicture']}\" alt=\"\">
      <input type=\"hidden\" name=\"gcode\" value=\"{$query['gcode']}\">
      <h3>{$query['gname']}</h3>
      <h4>{$query['gprice']}원</h4>
      <h5>사이즈</h5>
      <select>
        <option>XL</option>
        <option>L</option>
        <option>M</option>
        <option>S</option>
      </select>
      <h5>색상</h5>
      <select>
        <option>블랙</option>
        <option>화이트</option>
      </select>
      <h5>수량</h5>
      <select>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
      </select>
      <input type=\"submit\" value=\"장바구니\">
    </form>
    <textarea class=\"g-descript\" disabled>{$query['gexplain']}</textarea>
    <form action=\"./r-create.php\" method=\"post\" class=\"r-create\" enctype=\"multipart/form-data\">
      <h3>상품평 작성</h3>
      <select name=\"rstars\">
        <option selected disabled hidden>별점</option>
        <option value=\"1\">1</option>
        <option value=\"2\">2</option>
        <option value=\"3\">3</option>
        <option value=\"4\">4</option>
        <option value=\"5\">5</option>
      </select>
      <input type=\"submit\" value=\"작성\">
      <input type=\"text\" name=\"rtext\" class=\"r-text\">
      <input type=\"file\" id=\"u-image\" name=\"rimg\" accept=\"image/*\" onchange=\"SetThumbnail(event);\">
      <div id=\"u-image-container\"></div>
      <input type=\"hidden\" name=\"gcode\" value=\"{$query['gcode']}\">
    </form>
    ";
    ?>
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
    
    $list = 2; // 한 페이지 당 상품 수
    $page_list = 10; // 페이지 갯수
    require_once('../data/pre-page.php');
    $sql = mq("SELECT r.rgcode AS rgcode
              FROM goods g
              LEFT JOIN reviews r
              ON g.gcode = r.rgcode
              WHERE g.id = '$gid'
              ");
    $c_sql = mysqli_fetch_array($sql);
    $sql = mq("SELECT r.rstars AS rstars, r.ruid AS ruid, r.rdescript AS rdescript, r.rpicture AS rpicture, t.name AS tname
              FROM goods g
              LEFT JOIN category c
              ON g.gcid = c.id
              LEFT JOIN tCategory t
              ON c.tCid = t.id
              LEFT JOIN reviews r
              ON g.gcode = r.rgcode
              WHERE g.id = '$gid'
              ORDER BY r.id DESC
              LIMIT $start_num, $list
              ");           
    
    echo "
    <div class=\"g-reviews\">
    ";
    if($c_sql['rgcode'] != NULL) {
      while($query = mysqli_fetch_array($sql)) {
        echo "
        <img class=\"r-p\" src=\"../asset/img/rimg/{$query['tname']}/{$query['rpicture']}\">
        ";
        $count = 1;
        while($count <= $query['rstars']) {
          echo "
          <img class=\"star\" src=\"../asset/icon/star.png\">
          ";
          $count++;
        }
        while($count <= 5) {
          echo "
          <img class=\"star\" src=\"../asset/icon/favourite.png\">
          ";
          $count++;
        }
        echo "
        
        <textarea disabled>{$query['rdescript']}</textarea>
        <p>by. {$query['ruid']}</p>
        ";
      }
      echo "
      <div class=\"page-num\">
        <ul>
      ";
        if($page <= 1) {
        } else {
          echo "<li><a href='?id=$gid&page=1'>처음</a></li>";
          $pre = $page - 1;
          echo "<li><a href='?id=$gid&page=$pre'>이전</a></li>";
        }
        for($i = $page_start; $i <= $page_end; $i++) {
          if($page == $i) {
            echo "<li class=\"pn-select\">$i</li>";
          } else {
            echo "<li><a href='?id=$gid&page=$i'>$i</a></li>";
          }
        }
        if($page_num < $page_total) {
          $next = $page + 1;
            if($next <= $page_total) {
              echo "<li><a href='?id=$gid&page=$next'>다음</a></li>";
            }
        }
        if($page >= $page_total) {
        } else {
          echo "<li><a href='?id=$gid&page=$page_total'>마지막</a></li>";
        }
        echo "
        </ul>
      </div>
      ";
      echo "
    </div>
    ";
    } else {
    }
  echo "
  </div>
  ";
  ?>
</body>
</html>