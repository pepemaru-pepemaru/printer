<?php
session_start();
require_once "../classes/UserLogic.php";

//ここはログインしていない人を（URL直打ちなど）戻す処理
$result = UserLogic::checkLogin();
if($result){
    header( "Location:Login_form.php");
    return;
}

//バリテーションという作業、そもそもの送ってきた中身が入っているのかどうかをチェックしている
//まず処理を上で行い、エラー内容を $err に代入する。下記で代入したエラー内容を吐き出す
$err = [];

if(!$name = filter_input(INPUT_POST, 'name')){
    $err['name'] = 'ユーザー名を記入してください。';
}
if(!$pass = filter_input(INPUT_POST,'pass')){
    $err['pass'] = 'パスワードを記入してください。';
}
//エラーがあった場合、セッションにエラーを入れ、戻す
if(count($err)>0){
    $_SESSION['errors'] = $err;
    header('Location:Login_form.php');
    return;
}

//ログイン成功時の処理
$result = UserLogic::login($name,$pass);
//ログイン失敗時の処理
if (!$result) {
    header('Location:Login_form.php');
    return;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>プリンタ在庫管理｜ログイン</title>
</head>
<body>
    <header>
        <div class="icon">
            <a href="index.php">
                <img src="../img/header/icon.png">
            </a>
        </div>
        <b><p>プリンタ在庫管理</p></b>
        <div class="hamburger">
            <img src="../img/header/hamburger.png">
        </div>
    </header>
    <div class="panlist">
        <p>ログイン結果</p>
    </div>
    <main>
        <div class="item">
            <?php if (count($err)>0) :?>
                <?php foreach($err as $e) :?>
                    <p><?php echo $e ?></p>
                <?php endforeach ;?>
            <?php else :?>
                <p>ログインしました。</p>
            <?php endif ;?>
            <a href='../index.php'><p>戻る</p></a>
        </div>
    </main>
<?php include "../common/footer.php" ?>