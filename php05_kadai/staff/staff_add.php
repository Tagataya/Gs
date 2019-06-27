<?php
  session_start();
  session_regenerate_id(true);
  if(isset($_SESSION['login'])==false){
    echo'ログインされていません。<br>';
    echo'<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
  } else{
    echo $_SESSION['staff_name'];
    echo 'さんログイン中<br>';
    echo '<br>';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ろくまる農園</title>
</head>
<body>
スタッフ追加<br>
<br>
<form method="post" action="staff_add_check.php">
  スタッフ名を入力してください。<br>
  <input type="text" name="name" style="width:200px"><br>
  パスワードを入力してください。<br>
  <input type="password" name="pass" style="width:100px"><br>
  パスワードをもう一度入力してください。<br>
  <input type="password" name="pass2" style="width:100px"><br>
  <br>
  <input type="button" onclick="history.back()" value="戻る">
  <input type="submit" value="OK">
</form>
</body>
</html>