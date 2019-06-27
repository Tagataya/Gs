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

  $code=$post['code'];
  $name = $post['name'];
  $price = $post['price'];
  $gazou_name_old = $post['gazou_name_old'];
  $gazou_name = $post['gazou_name'];

  $dsn ='mysql:dbname=gs_proPHP;host=localhost;charset=UTF8';
  $user ='root';
  $password ='';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql ='UPDATE mst_product SET name=?,price=?,gazou=? WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[]=$name;
  $data[]=$price;
  $data[]=$gazou_name;
  $data[]=$code;
  $stmt->execute($data);

  $dbh = null;
  if($gazou_name_old!=$gazou_name){
    if($gazou_name_old !=''){
      unlink('./gazou/'.$gazou_name_old);
    }
  }

  echo '修正完了しました。<br>';
} catch(Exception $e){
  echo 'エラーが発生しました。';
  exit('DB-Connection-Error:'.$e->getMessage());
}
?>

<a href="pro_list.php">戻る</a>

</body>
</html>