<?php
//このファイルはデータベーステーブルを表示するためのテーブルです。

// データベース内のテーブル全てを呼び出す （ここで言うテーブルとは機材場所を指す）
$sql = "SHOW TABLES";
// 呼び出したデータの下ごしらえ
$pdo = dbconnect();
$sth = $pdo->prepare($sql);  //準備
$sth->execute();            //実行
$result = $sth->fetchAll(PDO::FETCH_NUM);   //全部取り出す（連想配列で）

?>

