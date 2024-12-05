<?php
session_start();

include "common/header.php" ;
include "getDatas.php";

$_SESSION["have_number"] = $image["have_number"];

?>

<!-- 旧item_TOP.phpページとなります -->
    <div class="panlist">
        <p>登録場所の一覧＞<?php echo $_GET['table']; ?></p>
    </div>

    <main>
    <h1>機材の一覧</h1>
        <div class="home">
            <h2><?php echo $_GET['table']; ?></h2>
            <a href="NEW_home_edit.php?table=<?php echo $_GET['table'] ?>"><p>編集</p></a>
        </div>
        <ul>
            <!-- 下記の部分"foreach"で繰り返し処理をしている、as $image は$dataの個々の要素(レコードごとを指定) -->
            <?php foreach ($data as $image){ ?>
            <li class="item">
                <!-- 個々のデータの中の"printer_name"カラムを繰り返しの内容に指定している -->
                <p class="printer_name"><?php echo $image["printer_name"]; ?></p>

                <p class="have_number"><?php echo $image["have_number"]; ?>台</p>

                <!-- "?id="以降のコードは、選択した場所によって取得するURLを変更している、変更内容はidで指定している（クエリパラメータ） -->
                <a href="NEW_item_edit.php?table=<?php echo $_GET["table"];?>&id=<?php echo $image["id"];?>"><p class="edit_button">編集</p></a>
            </li>
            <?php }; ?>
        </ul>

        <a href="NEW_item_puls.php?table=<?php echo $_GET["table"];?>">
            <div class="plus_box">
                <div><img src="img/footer/plus.png"></div>
                <b><p>新規製品の登録</p></b>
            </div>
        </a>
    </main>
<?php include "common/footer.php"; ?>