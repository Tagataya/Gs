<?php
session_start(); //これを入れ忘れてエラーになった。講義と同じ過ち。
include "../funcs.php";
chkSsid();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>書籍登録</title>
</head>
<body>
<header>
  <div class="container">
  <?php include("../menu.php"); ?>
  </div>
</header>
<div class="container">
  <h2 class="mt-4 mb-4">書籍登録</h2>
  <form  method="post" action="confirm.php">
    <div class="form-group mb-4">
      <label for="bookname">書籍名</label>
      <input type="text" class="form-control" name= "bookname" id="bookname">
    </div>
    <div class="form-group mb-4">
      <label for="bookname">著者</label>
      <input type="text" class="form-control" name= "author" id="author">
    </div>
    <div class="form-group mb-4">
      <label for="bookurl">書籍URL</label>
      <input type="text" class="form-control" name= "bookurl" id="bookurl">
    </div>
    <div class="form-group mb-4">
      <label for="comment">書籍コメント</label>
      <textarea rows="5" class="form-control" name= "comment" id="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-outline-secondary">内容確認</button>　　
  </form>
</div>
</body>
</html>

<!-- 
未了事項
・新規入力時、NULLチェックの処理が入っていない。
・各phpファイルの関係図作成


 -->