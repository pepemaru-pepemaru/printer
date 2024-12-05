<!-- 登録できたどうかの結果を表示するファイルです -->
<?php include "header.php" ?>
    <div class="panlist">
        <p><?php echo $_POST["nowTable"] ?>＞新規製品の登録＞登録の結果</p>
    </div>
    <main>
        <div class="item">
        <?php
        include ("dbConfig.php");   //データベースを読み込む


        if ($_SERVER["REQUEST_METHOD"] == "POST") { //POSTされているか確認

            $printerName = $_POST["printerName"];   //各入力を変数に代入
            $haveNumber = $_POST["haveNumber"];
            $nowTable = $_POST["nowTable"];

            //INSERT文を作って代入、前半（）でデータベース側の指示、後半（）で代入する変数の指示
            $sql = "INSERT INTO $nowTable ( printer_name,have_number ) VALUES ('$printerName', '$haveNumber')";
            //なんか準備しているらしい
            $stmt = $db->prepare($sql);

            //実行するらしい
            try {
                $stmt->execute();   
                echo "<p>登録が完了しました。</p><a href='NEW_home_item.php?table=$nowTable'><p>戻る</p></a>";
            } catch (PDOException $e) {
                echo "<p>エラー</p><a href='NEW_home_item.php'><p>戻る</p></a>" . $e->getMessage();
            }
        }
        ?>
        </div>
    </main>

<?php include "footer.php" ?>