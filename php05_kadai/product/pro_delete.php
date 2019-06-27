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
  <title>Document</title>
</head>
<body>
<?php
try{
  $pro_code = $_GET['procode'];

  $dsn ='mysql:dbname=gs_proPHP;host=localhost;charset=UTF8';
  $user ='root';
  $password ='';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql ='SELECT name,gazou FROM mst_product WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[]=$pro_code;
  $stmt->execute($data);

  $rec=$stmt->fetch(PDO::FETCH_ASSOC);
  $pro_name=$rec['name'];
  $pro_gazou_name=$rec['gazou'];

  $dbh = null;

  if($pro_gazou_name==''){
    $disp_gazou='';
  }else{
    $disp_gazou='<img src="./gazou/'.$pro_gazou_name.'">';
  }


} catch(Exception $e){
  echo 'エラーが発生しました。';
  exit('DB-Connection-Error:'.$e->getMessage());
}
?>

商品削除<br>
<br>
商品コード<br>
<?=$pro_code?>
<br>
商品名<br>
<?=$pro_name?>
<br>
<?= $disp_gazou ?>
<br>
この商品を削除してよろしいですか？
<br>
<form method="post" action="pro_delete_done.php">
<input type="hidden" name="code" value="<?= $pro_code ?>">
<input type="hidden" name="gazou_name" value="<?= $pro_gazou_name ?>">
<br>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
</body>
</html>