<?php
session_start(); //これを入れ忘れてエラーになった。講義と同じ過ち。
include "../funcs.php";
chkSsid();

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$bookname = $_POST["bookname"];
$author = $_POST["author"];
$bookurl = $_POST["bookurl"];
$comment = $_POST["comment"];

//2. DB接続します
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_bm_table(bookname,author,bookurl,comment)VALUES(:bookname,:author,:bookurl,:comment)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);
$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR); 
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR); 

$status = $stmt->execute();

// ４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
// ５．index.phpへリダイレクト
    redirect("select.php");
}