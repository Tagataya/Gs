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
  <title>内容確認</title>
</head>
<body>
スタッフ追加 確認<br>
<br>
<?php
require_once('../common/common.php');

$post = sanitize($_POST);
$name = $post['name'];
$pass = $post['pass'];
$pass2 = $post['pass2'];

if($name==''){
  echo "スタッフ名が入力されていません。 <br>";
} else{
  echo 'スタッフ名：';
  echo $name;
  echo '<br>';
}

if($pass==''){
  echo "パスワードが入力されていません。 <br>";
}

if($pass != $pass2){
  echo "パスワードが一致しません。<br>";
}

if($name=='' || $pass=='' || $pass != $pass2){
  echo '<form>';
  echo '<input type="button" onclick="history.back()" value="戻る">';
  echo '</form>';
}else{
  $pass = md5($pass);
  echo '<form method="post" action="staff_add_done.php">';
  echo '<input type="hidden" name="name" value="'.$name.'">';
  echo '<input type="hidden" name="pass" value="'.$pass.'">';
  echo '<br>';
  echo '登録しますか？';
  echo '<br>';
  echo '<input type="button" onclick="history.back()" value="戻る">';
  echo '<input type="submit" value="OK">';
  echo '</form>';
}
?>
</body>
</html>