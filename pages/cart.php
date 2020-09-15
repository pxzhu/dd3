<?php 
require_once('../db/dbConn.php'); 
if(isset($_SESSION['userid'])) {
  $uid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="kr">
<head>
  <meta charset="UTF-8">
  <title>VIEW.S - 장바구니</title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/s-menu.css">
  <link rel="stylesheet" type="text/css" href="../css/cart.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../js/menu.js"></script>
  <script type="text/javascript" src="../js/cart.js"></script>
</head>
<body>
  <?php 
  require_once('../data/menu.php');
  require_once('../data/icon.php');
  ?>
  <div id="cart">
    <h2>장바구니</h2>
    <div class="c-goods">
      <?php
      $sql = mq("SELECT g.gname AS gname, g.gexplain AS gexplain, g.gprice AS gprice, g.gpicture AS gpicture, t.name AS tname
                FROM carts c
                LEFT JOIN goods g
                ON c.cgcode = g.gcode
                LEFT JOIN category ca
                ON g.gcid = ca.id
                LEFT JOIN tCategory t
                ON ca.tCid = t.id
                WHERE c.cuid = '$uid'
                ");
      $total = 0;
      while($query = mysqli_fetch_array($sql)) {
        echo "
        <div>
          <img src=\"../asset/img/{$query['tname']}/{$query['gpicture']}\">
          <h5>{$query['gname']}</h5>
          <h6>{$query['gexplain']}</h6>
        </div>
        <span class=\"c-t\">{$query['gprice']} 원</span>
        ";
        $total += $query['gprice'];
      }
      ?>
      
    </div>
    <div class="c-total">
      <?php 
      $query = mysqli_num_rows($sql);
      echo "
      <span>총 {$query} 상품</span>
      <span class=\"c-t\">{$total} 원</span>
      "
      ?>
      <input type="submit" value="구매하기">
    </div>
  </div>
<?php 
} else {
  echo "
  <script>
    alert('로그인 후 이용바랍니다.');
    window.location = '../user/sign-in.php';
  </script>
  ";
}
?>
</body>
</html>
