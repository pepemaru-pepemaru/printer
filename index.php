<?php
include "common/header.php" ;
include "getHome.php";
?>
    <div class="panlist">
        <p>登録場所の一覧</p>
    </div>

    <main>
        <h1>登録場所の一覧</h1>
        <ul>
            <!-- 下記の部分"foreach"で繰り返し処理をしている、as $image は$dataの個々の要素(レコードごとを指定) -->
            <?php foreach ($result as $table){ ?>
            <li class="home">
                <!-- 個々のデータの中の"printer_name"カラムを繰り返しの内容に指定している -->
                <p><?php echo $table[0]; ?></p>
                <!-- "?id="以降のコードは、選択した場所によって取得するURLを変更している、変更内容はidで指定している（クエリパラメータ） -->
                <a href="NEW_home_item.php?table=<?php echo $table[0]; ?>"><p>＞</p></a>
            </li>
            <?php }; ?>
        </ul>

        <a href="NEW_home_puls.php">
            <div class="plus_box">
                <div><img src="img/footer/plus.png"></div>
                <b><p>新規場所の登録</p></b>
            </div>
        </a>
    </main>
<?php include "common/footer.php"; ?>