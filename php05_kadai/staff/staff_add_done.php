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
  <title>input</title>
</head>
<body>

<?php
try{
  require_once('../common/common.php');

  $post = sanitize($_POST);

  $name = $post['name'];
  $pass = $post['pass'];

  $dsn ='mysql:dbname=gs_proPHP;host=localhost;charset=UTF8';
  $user ='root';
  $password ='';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql ='INSERT INTO mst_staff(name,password) VALUES(?,?)';
  $stmt = $dbh->prepare($sql);
  $data[]=$name;
  $data[]=$pass;
  $stmt->execute($data);

  $dbh = null;
  echo $name.'さんを追加しました。<br>';
} catch(Exception $e){
  echo 'エラーが発生しました。';
  exit('DB-Connection-Error:'.$e->getMessage());
}
?>

<a href="staff_list.php">戻る</a>

</body>
</html>