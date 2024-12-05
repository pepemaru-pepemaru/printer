<?php 
session_start();
$err = $_SESSION['errors'];
$err['msg'] = $_SESSION['msg'];

//セッションを消す
$_SESSION = array();
session_destroy();
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
        <p>ログイン画面</p>
    </div>
    <main class="login">
        
        <?php if (isset($err['msg'])): ?>
            <p><?php echo $err['msg']; ?></p>
        <?php endif; ?>
        
        <form action="Login.php" method="POST">
            <p>
                <label for="name">ユーザー名：</label>
                <input id="name" type="name" name="name">
            </p>
            <?php if (isset($err['name'])): ?>
                <p><?php echo $err['name']; ?></p>
            <?php endif; ?>
            <p>
                <label for="password">パスワード：</label>
                <input id="password" type="password" name="pass">
            </p>
            <?php if (isset($err['pass'])): ?>
                <p><?php echo $err['pass']; ?></p>
            <?php endif; ?>
            <p>
                <input type="submit" value="ログイン">
            </p>
        </form>
        <a href="Signup_form.php"><p>新規登録はこちら</p></a>
    </main>
