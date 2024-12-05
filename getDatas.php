<?php


//サーバーから現在のURLを取得する
$uri = $_SERVER['REQUEST_URI'];

//どのデータベーステーブルなのかを取得する
$now_table = $_GET['table'];

//上記で取得したURIの中に"item_edit.php"が含まれているかの条件式、含まれていれば編集画面に飛んでいるので
 if (strpos($uri, "NEW_item_edit.php" ) !==false){
    //item_TOP画面で生成した、クエリパラメータを取得、変数への代入
    $imageId = $_GET['id'];
    //item_edit.phpの中身をデータごとに変更する為のSELECT文、一行上で取得したidを使い、どの場所なのか指定する
    $sql = "SELECT * FROM $now_table WHERE id = " . $imageId;

    $pdo = dbconnect();
    $sth = $pdo->prepare($sql);  //準備
    $sth->execute();            //実行
    $result = $sth->fetch();    //一度データを取り出し$resultに格納
    $data['printer_name'] = $result['printer_name'];
    //一度取り出したものを使わず取り出してから格納するこの一手間でおいしくなります。嘘です。１回目で出てくる結果は行全体だったらしい、
    //なので一度取り出したあと、どのカラムが欲しいのかを再度付け加えて代入し直す。
    

//URLに"item_edit.php"が含まれていない時の処理、テーブルから全てのデータを取得するようにしている
} else {
    // 登録機材のテーブルを呼び出す（今回は中身全部を取り出すので＊で指定）
    $sql = "SELECT * FROM $now_table ORDER BY id DESC";
    
    // 呼び出したデータの下ごしらえ
    $pdo = dbconnect();
    $sth = $pdo->prepare($sql);  //準備
    $sth->execute();            //実行
    $data = $sth->fetchAll();   //全部取り出す
}

return $data;
