<!-- 登録できたどうかの結果を表示するファイルです -->
<?php include "common/header.php" ?>
    <div class="panlist">
        <p>登録場所の一覧＞</p>
    </div>
    <main>
        <div class="item">
        <?php
        include "common/dbConfig.php";   //データベースを読み込む

        //NEW_home_edit.phpで生成した、クエリパラメータを取得、変数への代入
        $now_table = $_GET['table'];

        if(!empty($now_table)){

            $sql = "DROP TABLE $now_table";
            
            try {
                //なんか準備しているらしい
                $pdo = dbconnect();
                $result = $pdo->prepare($sql);

                //実行するらしい
                $result->execute();   
                echo "<p>削除が完了しました。</p><a href='index.php'><p>戻る</p></a>";
            } catch (PDOException $e) {
                echo "<p>エラー</p><a href='index.php'><p>戻る</p></a>" . $e->getMessage();
            }
        }   
        ?>
        </div>
    </main>
<?php include "common/footer.php" ?>