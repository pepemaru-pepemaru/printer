<?php
//データベースを読み込む関数
function dbconnect()
{
  $dbhost = "localhost";  //ホスト名
  $db = "printer";        //データベース名
  $dbuser = "root";       //ユーザ名
  $dbpass = "";           //DBのパスワード

  $dsn = "mysql:host=$dbhost;dbname=$db;charset=utf8;";

  try{
      //DBへの接続
    $pdo = new PDO ($dsn,$dbuser,$dbpass) or die("er 接続できません。");
    return $pdo;
    
  } catch (\Throwable $e) {
    echo "接続失敗です！". $e -> getMessage();
    exit();
  }
}
?>
