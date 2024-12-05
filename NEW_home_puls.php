<?php include "common/header.php"; ?>
    <div class="panlist">
        <p>登録場所の一覧＞新規場所の作成</p>
    </div>

    <main>
        <h1>新規場所の作成</h1>
        <form action="Registration_home.php" method="post">
            <div class="textbox">
                <h2>作成する場所の名前</h2>
                <p><input name="tableName" type="text"></p>
            </div>
            <div class="bottom">
                <input type="submit" value="新規作成">
            </div>
        </form> 
    </main>
<?php include "common/footer.php"; ?>