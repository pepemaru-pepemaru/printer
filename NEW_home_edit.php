<?php include "common/header.php" ?>
    <div class="panlist">
        <p>登録場所の一覧＞<?php echo $_GET['table']; ?>＞登録した場所の編集</p>
    </div>

    <main>
        <h1>登録した場所の編集</h1>
        <?php include ("dbConfig.php") ?>
        <?php include ("getDatas.php") ?>

        <form action="Update_home.php?table=<?php echo $_GET['table']; ?>" method="post">
            <div class="textbox">
                <h2>場所名</h2>
                <p><input name="tableName" type="text" value="<?php echo $_GET['table']; ?>"></p>
            </div>

            <div class="bottom">
                <input onclick="location.href='Update_home.php';" type="submit" value="場所名の変更">
            </div>
        </form> 
        <div class="bottom">
            <input onclick="location.href='Delete_home.php?table=<?php echo $_GET['table']; ?>';" type="submit" value="場所の削除">
        </div>
    </main>
<?php include "common/footer.php" ?>