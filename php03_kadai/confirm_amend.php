<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>修正後内容確認</title>
</head>
<body>
<?php
    include ("funcs.php");
    // input.phpからのデータの受取
    $bookname = $_POST['bookname'];
    $author = $_POST['author'];
    $bookurl = $_POST['bookurl'];
    $comment = $_POST['comment'];
    $id = $_POST['id'];

    // サニタイズ
    $bookname = h($bookname);
    $author = h($author);
    $bookurl = h($bookurl);
    $comment = h($comment);
    $id = h($id);
?>
<div class="container">
  <h2 class="mt-4 mb-4">修正後内容の確認</h2>
  <form  method="post" action="update.php">
    <div class="form-group mb-4">
      <label for="bookname">書籍名</label>
      <input type="text" class="form-control" name= "bookname" id="bookname" value="<?=$bookname?>" readonly>
    </div>
    <div class="form-group mb-4">
      <label for="bookname">著者</label>
      <input type="text" class="form-control" name= "author" id="author" value="<?=$author?>" readonly>
    </div>
    <div class="form-group mb-4">
      <label for="bookurl">書籍URL</label>
      <input type="text" class="form-control" name= "bookurl" id="bookurl" value="<?=$bookurl?>" readonly>
    </div>
    <div class="form-group mb-4">
      <label for="comment">書籍コメント</label>
      <textarea rows="5" class="form-control" name= "comment" id="comment" readonly><?=$comment?></textarea>
    </div>
    <input type="hidden" name="id" value="<?=$id?>">
    <hr>
    <p>上記内容で修正しますか？</p>
    <button type="submit" class="btn btn-outline-secondary">修正する</button>　　
    <input type="button" onclick="history.back()" value="やっぱやめとく" class="btn btn-outline-secondary">
  </form>
</div>
</body>
</html>