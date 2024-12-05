<?php 
session_start();
require_once "../classes/UserLogic.php";

$err = [];
//バリテーションを設けるぞ！！
//文字がなかったらエラーに代入
if(!$name = filter_input(INPUT_POST,"name")){
    $err["name"] = "ユーザー名を入力してください。";
}
//パスワードは正規表現（条件を満たしているのか確認する方法）で確認したい
//上の奴らのif文なしパターンで、$passに代入してあげる
$pass = filter_input(INPUT_POST,"pass");
//ここが正規表現（今回は６桁以上の半角英数字かどうかで条件をかけている）
if(!preg_match("/^[a-zA-Z0-9]{8,}$/",$pass)){
    $err["pass"] = "パスワードは英数字８桁以上にしてください。";
}
//確認用パスワードは1度目のパスワードと同じかどうか確認する
$pass_conf = filter_input(INPUT_POST,"pass_conf");
if($pass!==$pass_conf){
    $err["pass_conf"] = "確認用パスワードが異なっています。";
}
 
//
if(count($err)===0){
    //$_POSTでPOSTした内容をキャッチ、createUser関数内では$userdataに代入して処理
    //関数の結果を$hasCreateに入れて、if文で出力（bool型で返ってくるよ）
    $hasCreate = UserLogic::createUser($_POST);

    if(!$hasCreate){
        $err["dberr"] = "データベースへの保存に失敗しました。";
        $_SESSION["errors"] = $err;
        header("Location:Signup_form.php");
        exit;
    }

}else{
    $_SESSION['errors'] = $err;
    header("Location:Signup_form.php");
    exit;
}

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
        <p>新規登録結果</p>
    </div>
    <main>
        <div class="item">
            <?php if (count($err) === 0): ?>
                <p>ユーザー登録が完了しました。</p>
            <?php else: ?>
                <p>エラーがあります。フォームに戻って修正してください。</p>
            <?php endif; ?>
            <a href="Login_form.php"><p>戻る</p></a>
        </div>
        
    </main>