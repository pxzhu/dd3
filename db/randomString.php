<?php
function RandomString($length = 10) {
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randstring = '';
  for($i = 0; $i < $length; $i++) {
    $randstring .= $characters[rand(0, $charactersLength)];
  }
  return $randstring;
}
// echo RandomString();
?>