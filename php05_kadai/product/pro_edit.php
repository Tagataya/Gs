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
  <title>商品修正</title>
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

  $sql ='SELECT name,price,gazou FROM mst_product WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[]=$pro_code;
  $stmt->execute($data);

  $rec=$stmt->fetch(PDO::FETCH_ASSOC);
  $pro_name=$rec['name'];
  $pro_price=$rec['price'];
  $pro_gazou_name_old=$rec['gazou'];

  $dbh = null;

  if($pro_gazou_name_old==''){
    $disp_gazou='';
  }else{
    $disp_gazou='<img src="./gazou/'.$pro_gazou_name_old.'">';
  }

} catch(Exception $e){
  echo 'エラーが発生しました。';
  exit('DB-Connection-Error:'.$e->getMessage());
}
?>

商品修正<br>
<br>
商品コード<br>
<?=$pro_code?>
<br>
<br>
<form method="post" action="pro_edit_check.php" enctype="multipart/form-data">
<input type="hidden" name="code" value="<?= $pro_code ?>">
<input type="hidden" name="gazou_name_old" value="<?= $pro_gazou_name_old ?>">
商品名
<input type="text" name="name" style="width:200px" value="<?=$pro_name?>"><br>
価格
<input type="text" name="price" style="width:50px" value="<?=$pro_price?>"><br>
<br>
<?= $disp_gazou?>
<br>
画像を選んでください。<br>
<input type="file" name="gazou" style="width:400px"><br>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
</body>
</html>