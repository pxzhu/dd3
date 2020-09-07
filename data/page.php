<?php
echo "
<div class=\"page-num\">
  <ul>
";
    if($page <= 1) {
    } else {
      echo "<li><a href='?page=1'>처음</a></li>";
      $pre = $page - 1;
      echo "<li><a href='?page=$pre'>이전</a></li>";
    }
    for($i = $page_start; $i <= $page_end; $i++) {
      if($page == $i) {
        echo "<li class=\"pn-select\">$i</li>";
      } else {
        echo "<li><a href='?page=$i'>$i</a></li>";
      }
    }
    if($page_num < $page_total) {
      $next = $page + 1;
        if($next <= $page_total) {
          echo "<li><a href='?page=$next'>다음</a></li>";
        }
    }
    if($page >= $page_total) {
    } else {
      echo "<li><a href='?page=$page_total'>마지막</a></li>";
    }
echo "
  </ul>
</div>
";
?>