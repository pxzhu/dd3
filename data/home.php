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