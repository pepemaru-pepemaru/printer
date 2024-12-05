<?php 
session_start();
require_once 'classes/UserLogic.php';

//ここはログインしていない人を（URL直打ちなど）戻す処理
$LoginResult = UserLogic::checkLogin();
if (!$LoginResult) {
    $_SESSION['login_err'] = 'ユーザーを登録してログインしてください！';
    header('Location: Login/signup_form.php');
    return;
}
//セッションからユーザー情報を取得。編入。
$login_user = $_SESSION['login_user'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

    <title>HOME一覧</title>
</head>
<body>
    <header>
        <div class="icon">
            <a href="index.php">
                <img src="img/header/icon.png">
            </a>
        </div>
        <b><p><?php echo $login_user['name'] ?>の在庫管理</p></b>
        <div class="hamburger">
            <a href="Login/Logout.php">
                <img src="img/footer/logout.png">
            </a>
        </div>
    </header>