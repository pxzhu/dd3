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
    <h4>최근 상품평</h4>
    <h6><a href="../pages/total-reviews.php">more</a></h6>
    <nav class="some_review">
      <?php 
      $sql = mq("SELECT g.id AS gid, g.gname AS gname, t.name AS tname, r.rpicture AS rpicture, r.rstars AS rstars, r.rdescript AS rdescript
                FROM goods g
                LEFT JOIN category c
                ON g.gcid = c.id
                LEFT JOIN tCategory t
                ON c.tCid = t.id
                LEFT JOIN reviews r
                ON g.gcode = r.rgcode
                ORDER BY r.id DESC
                LIMIT 2
                ");
      while($query = mysqli_fetch_array($sql)) {
        $gname = $query['gname'];
        if(strlen($gname) > 6) {
          $gname = str_replace($query['gname'], mb_substr($query['gname'], 0, 6, "UTF-8")."..", $query['gname']);
        }
        echo "
        <div>
          <img class=\"re_pic\" src=\"../asset/img/rimg/{$query['tname']}/{$query['rpicture']}\">
          <h5><a href=\"../pages/goods-detail.php?id={$query['gid']}\">{$gname}</a></h5>
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
          <p class=\"re_des\">{$query['rdescript']}</p>
        </div>
        ";
      }
      ?>
    </nav>
  </div>
  <div>
    <h4>공지사항</h4>
    <h6><a href="../board/notice.php">more</a></h6>
    <ul>
      <?php
      $sql = mq("SELECT *
                FROM notice
                ORDER BY id DESC
                LIMIT 6
                ");
      while($query = mysqli_fetch_array($sql)) {
        echo "
        <li><a href=\"../board/n-Read.php?id={$query['id']}\">{$query['ntitle']}</a></li>
        ";
      }
      ?>
    </ul>
  </div>
  <div>
    <h4>문의사항</h4>
    <h6><a href="../board/qna.php">more</a></h6>
    <ul>
      <?php
      $sql = mq("SELECT *
                FROM qna
                ORDER BY id DESC
                LIMIT 6
                ");
      while($query = mysqli_fetch_array($sql)) {
        echo "
        <li><a href=\"../board/q-Read.php?id={$query['id']}\">{$query['qtitle']}</a></li>
        ";
      }
      ?>
    </ul>
  </div>
</span>