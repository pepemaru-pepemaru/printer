<?php include "common/header.php" ?>
    <div class="panlist">
        <p><?php echo $_GET['table']; ?>＞登録した製品の編集</p>
    </div>

    <main>
        <h1>登録した製品の編集</h1>
        <?php include ("dbConfig.php") ?>
        <?php include ("getDatas.php") ?>

        <form action="Update_item.php?table=<?php echo $_GET['table']; ?>&id=<?php echo $_GET['id']; ?>" method="post">
            <div class="textbox">
                <h2>製品名</h2>
                <p><input name="printerName" type="text" value="<?php echo $data['printer_name']; ?>"></p>
            </div>
            <div class="textbox">
                <h2>台数</h2>
                <p><input name="haveNumber" type="number" value="<?php echo $data['have_number']; ?>"></p>
            </div>

            <div class="bottom">
                <input onclick="location.href='Update_item.php';" type="submit" value="変更">
            </div>
        </form> 
        <div class="bottom">
            <input onclick="location.href='Delete_item.php?table=<?php echo $_GET['table']; ?>&id=<?php echo $_GET['id']; ?>';" type="submit" value="削除">
        </div>
    </main>
<?php include "common/footer.php" ?>