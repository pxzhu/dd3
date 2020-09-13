<div class="top-menu">
  <a href="../index.php">
    <img class="logo" src="../asset/icon/logo.png" alt="Logo">
  </a>
  <a href="../pages/cart.php">
    <img class="cart" src="../asset/icon/shopping-cart.png" alt="Cart">
  </a>
  <a href="../pages/mypage.php">
    <img class="user" src="../asset/icon/user.png" alt="MyPage">
  </a>
</div>
<div class="btn"></div>
<div id="menu">
  <div class="close"></div>
  <form class="search" method="post" action="../pages/goods.php">
    <select name="category">
      <option selected disabled hidden>category</option>
      <?php
      $sql = mq("SELECT name FROM category");
      while($tc = mysqli_fetch_array($sql)) {
        echo "<option value=\"{$tc['name']}\">{$tc['name']}</option>";
      }
      ?>
    </select>
    <input type="text" name="stext">
    <input type="image" src="../asset/icon/search.png" class="s-btn">
  </form>
  <ul>
    <?php
    function s_menu() {
      $tsql = mq("SELECT *
                FROM tCategory
                ");
      while($tquery = mysqli_fetch_array($tsql)) {
        echo "<li class=\"menu\">";
        echo "<a>{$tquery['name']}</a>";
        echo "<ul class=\"hide\">";
        $sql = mq("SELECT c.id, c.name, t.name AS tname 
                  FROM category c 
                  LEFT JOIN tCategory t 
                  ON c.tCid = t.id
                  WHERE t.name = '{$tquery['name']}'");
        while($query = mysqli_fetch_array($sql)) {
          echo "<li><a href=\"../pages/goods.php?id={$query['id']}\">{$query['name']}</a></li>";
        }
        echo "</ul>";
        echo "</li>";
      }
    }
    echo s_menu();
    ?>
  </ul>
</div>