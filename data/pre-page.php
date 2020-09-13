<?php
  $goods_total = mysqli_num_rows($sql); // 상품 총 갯수
  $page_num = ceil($page / $page_list); // 현재 페이지 위치
  $page_start = (($page_num - 1) * $page_list) + 1; // 페이지 시작 번호
  $page_end = $page_start + $page_list - 1; // 페이지 끝 번호
  $page_total = ceil($goods_total / $list); // 페이징 한 페이지 수 구하기
    
  if($page_end > $page_total) {
    $page_end = $page_total;
  } // 만약 블록의 마지막 번호가 페이지 수 보다 많다면 마지막 번호는 페이지 수
  $pl_total = ceil($page_total / $page_list); // 블록 총 갯수
  $start_num = ($page - 1) * $list;
?>