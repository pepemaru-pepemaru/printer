<!-- 削除できたかどうかの結果を表示するファイルです -->
<?php include "common/header.php" ?>
    <div class="panlist">
        <p>登録製品の編集＞削除の結果</p>
    </div>
    <main>
        <div class="item">
        <?php
        //データベースと接続する
        include "common/dbConfig.php";

        //NEW_item_edit.phpで生成した、クエリパラメータを取得、変数への代入
        $now_table = $_GET['table'];
        //NEW_item_edit.phpで生成した、クエリパラメータを取得、変数への代入
        $imageId = $_GET['id'];

        //emptyは空、!で反転させて「空じゃなければif文を実行する」。上記でデータは受け取っているので、実行される。ない時はない。
        if(!empty($imageId)){
            
                //削除文の設定と代入、上記クエリパラメータで得た内容は変数に入っているので、後半に合体の「.」をつけてGO
                $sql = "DELETE FROM $now_table WHERE id = " . $imageId;

                //ここから先の作り方はRegistration.phpを参考に、、、（よくわかっていないってこと！！）
                $pdo = dbconnect();
                $stmt = $pdo->prepare($sql);

            try {
                //実行処理
                $stmt->execute();   
                echo "<p>削除が完了しました。</p><a href='NEW_home_item.php?table=$now_table'><p>戻る</p></a>";
            } catch (PDOException $e) {
                echo "<p>エラー</p><a href='NEW_home_item.php?table=$now_table'><p>戻る</p></a>" . $e->getMessage();
            }
        }
        ?>
        </div>
    </main>
<?php include "common/footer.php" ?>