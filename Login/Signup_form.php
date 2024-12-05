<?php 
session_start();
$err = $_SESSION['errors'];

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

    <title>プリンタ在庫管理｜新規登録</title>
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
        <form action="Signup.php" method="POST">
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
                <label for="pass_conf">確認用パスワード：</label>
                <input id="pass_conf" type="password" name="pass_conf">
            </p>
            <?php if (isset($err['pass_conf'])): ?>
                <p><?php echo $err['pass_conf']; ?></p>
            <?php endif; ?>
            <?php if (isset($err['dberr'])): ?>
                <p><?php echo $err['dberr']; ?></p>
            <?php endif; ?>
            <p>
                <input type="submit" value="新規登録">
            </p>
        </form>
        <a href="Login_form.php"><p>ログインはこちら</p></a>
    </main>