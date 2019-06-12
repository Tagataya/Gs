<?php
session_start(); //これを入れ忘れてエラーになった。講義と同じ過ち。
include "../funcs.php";
chkSsid();

$bookname = $_POST["bookname"];
$author = $_POST["author"];
$bookurl = $_POST["bookurl"];
$comment = $_POST["comment"];
$id = $_POST["id"];

//2. DB接続します
$pdo = db_con();

//３．データ登録SQL作成
$sql = "UPDATE gs_bm_table SET bookname=:bookname, author=:author, bookurl=:bookurl, comment=:comment WHERE id=:id;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':author', $author, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    redirect("select.php");
}

?>
