<?php
function e($str, $charset = 'UTF-8') {
  return htmlspecialchars($str, ENT_QUOTES, $charset);
}

function format($datetime, $format = 'yyyy/MM/dd') {
  $ts = strtotime($datetime);
  print(date($format, $ts));
}

function date_ja($datetime, $format = 'Y年m月d日') {
  $ts = strtotime($datetime);
  print(date($format, $ts));
  }
  ?>