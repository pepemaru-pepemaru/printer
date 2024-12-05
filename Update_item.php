<!-- 更新できたかどうかの結果を表示するファイルです -->
<?php require_once "common/header.php" ?>
    <div class="panlist">
        <p>登録製品の編集＞更新の結果</p>
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

        if(!empty($imageId)){
            
        //下記文は登録のファイルから拝借した内容を更新へ変更して使っている。
            if ($_SERVER["REQUEST_METHOD"] == "POST") { //POSTされているか確認
            
                $printerName = $_POST['printerName'];   //変更内容を変数に代入
                $haveNumber = $_POST['haveNumber'];   //変更内容を変数に代入
                $pdo = dbconnect();


                //下記文は削除のファイルから拝借した内容を更新へ変更して使っている。
                $sql = "UPDATE $now_table SET printer_name = '".$printerName."' WHERE id = " . $imageId;
                $stmt = $pdo->prepare($sql);

                try {
                    //実行処理
                    $stmt->execute();
                    echo "<p>テーブル名の更新が完了しました。</p><a href='NEW_home_item.php?table=$now_table'><p>戻る</p></a>";
                } catch (PDOException $e) {
                    echo "<p>テーブル名の更新が失敗しました。</p><a href='NEW_home_item.php?table=$now_table'><p>戻る</p></a>" . $e->getMessage();
                    exit;
                }
                ?>
        </div>
        <div class="item">
        <?php
                //下記文は削除のファイルから拝借した内容を更新へ変更して使っている。
                $sql = "UPDATE $now_table SET have_number = '".$haveNumber."' WHERE id = " . $imageId;
                $stmt = $pdo->prepare($sql);

                try {
                    //実行処理
                    $stmt->execute();
                    echo "<p>台数の更新が完了しました。</p><a href='NEW_home_item.php?table=$now_table'><p>戻る</p></a>";
                } catch (PDOException $e) {
                    echo "<p>台数の更新が失敗しました。</p><a href='NEW_home_item.php?table=$now_table'><p>戻る</p></a>" . $e->getMessage();
                    exit;
                }
            }
        }
        ?>
        </div>
    </main>
<?php include "common/footer.php" ?>