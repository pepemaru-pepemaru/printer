<?php include "common/header.php" ?>
    <div class="panlist">
        <p><?php echo $_GET['table'] ?>＞新規製品の登録</p>
    </div>

    <main>
        <h1>新規製品の登録</h1>
        <form action="Registration_item.php" method="post">
            <div class="textbox">
                <h2>登録する機材名</h2>
                <p><input name="printerName" type="text"></p>
            </div>
            <div class="textbox">
                <h2>台数</h2>
                <p><input name="haveNumber" type="number"></p>
            </div>
            <div class="textbox">
                <h2>登録する場所</h2>
                <p><input name="nowTable" type="text" value="<?php echo $_GET['table']?>"></p>
            </div>
            <div class="bottom">
                <input type="submit" value="登録">
            </div>
        </form> 
    </main>
<?php include "common/footer.php" ?>