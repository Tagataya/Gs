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
  $code = $_POST['code'];
  $gazou_name = $_POST['gazou_name'];

  $dsn ='mysql:dbname=gs_proPHP;host=localhost;charset=UTF8';
  $user ='root';
  $password ='';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql ='DELETE FROM mst_product WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[]=$code;
  $stmt->execute($data);

  $dbh = null;

  if($gazou_name !=''){
    unlink('./gazou/'.$gazou_name);
  }


} catch(Exception $e){
  echo 'エラーが発生しました。';
  exit('DB-Connection-Error:'.$e->getMessage());
}
?>

削除しました。<br>
<a href="pro_list.php">戻る</a>

</body>
</html>