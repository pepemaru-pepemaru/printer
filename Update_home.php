<!-- 登録できたどうかの結果を表示するファイルです -->
<?php include "common/header.php" ?>
    <div class="panlist">
        <p>登録場所の一覧＞<?php echo $_GET['table'] ?>＞登録した場所の編集＞変更結果</p>
    </div>
    <main>
        <div class="item">
        <?php
        include "common/dbConfig.php";   //データベースを読み込む

        //NEW_home_edit.phpで生成した、クエリパラメータを取得、変数への代入
        $now_table = $_GET['table'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") { //POSTされているか確認

            //各入力を変数に代入 
            $tableName = $_POST["tableName"];   //テーブル名

            $sql = "RENAME TABLE `$now_table` TO `$tableName`";
            
            try {
                //なんか準備しているらしい
                $pdo = dbconnect();
                $result = $pdo->prepare($sql);

                //実行するらしい
                $result->execute();   
                echo "<p>登録が完了しました。</p><a href='NEW_home_item.php?table=$tableName'><p>戻る</p></a>";
            } catch (PDOException $e) {
                echo "<p>エラー</p><a href='NEW_home_item.php?table=$tableName'><p>戻る</p></a>" . $e->getMessage();
            }
        }   
        ?>
        </div>
    </main>
<?php include "common/footer.php" ?>