<?php
session_start(); //これを入れ忘れてエラーになった。講義と同じ過ち。
include "../funcs.php";
chkSsid();

//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
$id = $_GET["id"];

$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);//あぶない文字を無効化してくれる。,PDO以下はなくてもOK
$status = $stmt->execute(); 
  //ここでstmtにSQLの実行結果が格納される。
  //statusにはtrueかfalseしか格納されない。

//３．データ表示
// $view = "";
if ($status == false) {
    sqlError($stmt);
} 
$row = $stmt->fetch();//executeで格納されたdataを1つだけとってくる
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>削除確認</title>
</head>
<body>
<div class="container">
  <h2 class="mt-4 mb-4">削除対象の確認</h2>
  <form  method="post" action="delete.php">
    <div class="form-group mb-4">
      <label for="bookname">書籍名</label>
      <input type="text" class="form-control" name= "bookname" id="bookname" value="<?=$row["bookname"]?>" readonly>
    </div>
    <div class="form-group mb-4">
      <label for="bookname">著者</label>
      <input type="text" class="form-control" name= "author" id="author" value="<?=$row["author"]?>" readonly>
    </div>
    <div class="form-group mb-4">
      <label for="bookurl">書籍URL</label>
      <input type="text" class="form-control" name= "bookurl" id="bookurl" value="<?=$row["bookurl"]?>" readonly>
    </div>
    <div class="form-group mb-4">
      <label for="comment">書籍コメント</label>
      <textarea rows="5" class="form-control" name= "comment" id="comment" readonly><?=$row["comment"]?></textarea>
    </div>
    <input type="hidden" name="id" value="<?=$row["id"]?>">
    <hr>
    <p>本当にこのデータを削除しますか？</p>
    <button type="submit" class="btn btn-outline-secondary">削除する！</button>　　
    <input type="button" onclick="history.back()" value="やっぱやめとく" class="btn btn-outline-secondary">
  </form>
</div>
</body>
</html>