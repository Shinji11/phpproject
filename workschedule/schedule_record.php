<?php
try {
  $db = new PDO('mysql:host=localhost;dbname=workschedule;charset=utf8', 'root', 'root');
  print('データベースに接続できました。!!!!!!!!!!');
  $db = NULL;
} catch(PDOException $e) {
  die('エラーメッセージ：'.$e->getMessage());
}
