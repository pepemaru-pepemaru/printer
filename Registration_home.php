<!-- 登録できたどうかの結果を表示するファイルです -->
<?php include "common/header.php"; ?>
    <div class="panlist">
        <p>登録場所の一覧＞新規場所の作成＞作成結果</p>
    </div>
    <main>
        <div class="item">
        <?php
        include "common/dbConfig.php";   //データベースを読み込む

        if ($_SERVER["REQUEST_METHOD"] == "POST") { //POSTされているか確認

            //各入力を変数に代入 
            $tableName = $_POST["tableName"];   //テーブル名

            $sql = "CREATE TABLE $tableName (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,printer_name VARCHAR(255) NOT NULL,have_number INT(11) NOT NULL) DEFAULT CHARACTER SET=utf8mb4;";
            
            try {
                //なんか準備しているらしい
                $pdo = dbconnect();
                $result = $pdo->prepare($sql);

                //実行するらしい
                $result->execute();   
                echo "<p>登録が完了しました。</p><a href='index.php'><p>戻る</p></a>";
            } catch (PDOException $e) {
                echo "<p>エラー</p><a href='index.php'><p>戻る</p></a>" . $e->getMessage();
            }
        }   
        ?>
        </div>
    </main>
<?php include "common/footer.php"; ?>