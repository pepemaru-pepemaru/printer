<?php
session_start();
require_once '../classes/UserLogic.php';

if ($logout = filter_input(INPUT_POST, 'logout')){
    exit('不正なリクエストです。');
}

//ログインしているか判別し、セッションが切れていたらログインしてくださいとメッセージを出す。
$result = UserLogic::checkLogin();
if (!$result) {
    exit('セッションが切れましたので、ログインし直してください。');
}

UserLogic::logout();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>ログアウト</title>
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
        <p>新規登録画面</p>
    </div>
    <main class="login">
        <p>ログアウト完了</p>
        <p>ログアウト完了しました。</p>
    <a href="login_form.php">ログイン画面へ</a>
</body>
</html>