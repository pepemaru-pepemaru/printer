<?php
//データベースを読み込む関数
function dbconnect()
{
  $dbhost = "localhost";  //ホスト名
  $db = "printer";        //データベース名
  $dbuser = "root";       //ユーザ名
  $dbpass = "";           //DBのパスワード

  $dsn = "mysql:host=$dbhost;dbname=$db;charset=utf8;";

  try{
      //DBへの接続
    $pdo = new PDO ($dsn,$dbuser,$dbpass) or die("er 接続できません。");
    return $pdo;
    
  } catch (\Throwable $e) {
    echo "接続失敗です！". $e -> getMessage();
    exit();
  }
}

class UserLogic
{
    /**
     * ユーザーを登録する          //このクラスの意味（この書き方をDocと言うらしい）
     * @param array $userDate   //引数（今回は入力情報を配列で入力したもの）
     * @return bool $result     //返り値
     */
    public static function createUser($userDate)
    {
        $result = false;

        //今回は (?,?) という配列の形で入れるみたいだ。SQLインジェクション対策。
        $sql = 'INSERT INTO userdata (name,pass) VALUES (?,?)';

        //配列の中身の設定
        $arr = [];
        $arr[] = $userDate['name'];
        //通常なら $arr[] = $userDate['pass']; なのだが、パスワードをハッシュ化するので下記のコードになる。
        $arr[] = password_hash($userDate['pass'],PASSWORD_DEFAULT);

        try{
            $pdo = dbconnect();                 // connect() は自作の関数、dbと接続する関数だ。
            $stmt = $pdo->prepare($sql);        //準備
            $result = $stmt -> execute($arr);   //実行(このタイミングで関数を入れるみたいだ。)
            
            if ($result) {
                return $result; // 成功
            } else {
                throw new Exception("データベース保存に失敗しました。");
            }
        } catch (Exception $e) {
            error_log("Error in createUser: " . $e->getMessage()); // ログに記録
            echo "エラー: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
            return false;
        }
    }

    /**
     * ログイン処理               //このクラスの意味（この書き方をDocと言うらしい）
     * @param string $name     //引数
     * @param string $pass  //引数
     * @return bool $result     //返り値
     */
    public static function login($name,$pass)
    {
        //先持って結果が失敗になるようにしておく。以下の処理で成功パターンを記述する。
        $result = false;
        //ユーザーをユーザー名（name）から検索して持ってくる
        $user = self::getUserByName($name);

        if (!$user) {
            $_SESSION['msg'] = 'ユーザー名が一致しません。';
            return $result;
        }

        //パスワードの照会
        if (password_verify($pass,$user['pass'])){
            //ログイン成功
            //セッションハイジャック対策
            session_regenerate_id(true);
            $_SESSION['login_user'] = $user;
            $result = true;
            return $result;
        }
        $_SESSION['msg'] = 'パスワードが一致しません。';
        return $result;
    }

    /**
     * ユーザー名からユーザーを取得
     * @param string $name
     * @return array|bool $user|false
     */
    public static function getUserByName($name)
    {
        //SQLの準備、実行、結果を作るよ
        //今回は (?,?,?) という配列の形で入れるみたいだ。
        $sql = 'SELECT * FROM userdata WHERE name = ?';

        //nameを配列に入れる
        $arr = [];
        $arr[] = $name;

        try{
            // dbconnect() は自作の関数、dbと接続する関数だ。
            $pdo = dbconnect();
            $stmt = $pdo->prepare($sql);   //準備
            $stmt -> execute($arr);   //実行(このタイミングで関数を入れるみたいだ。)
            $user = $stmt ->fetch();
            return $user;
        } catch(\Exception $e) {
            return false;
        }
    }

    /**
     * ログインチェック            //このクラスの意味（この書き方をDocと言うらしい）
     * @param void $userDate    //引数
     * @return bool $result     //返り値
     */
    public static function checkLogin()
    {
        $result = false;
        if(isset($_SESSION['login_user']) && $_SESSION['login_user']['id'] >0 ){
            return $result = true;
        }
        return $result;
    }

    /**
     * ログアウト処理             //このクラスの意味（この書き方をDocと言うらしい）
     * @param void $userDate    //引数
     * @return bool $result     //返り値
     */
    public static function logout()
    {
        $_SESSION = array();
        session_destroy();
    }
}

?>