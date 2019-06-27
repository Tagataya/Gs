<?php
  session_start();
  session_regenerate_id(true);
  if(isset($_SESSION['member_login'])==false){
    echo'ようこそゲスト様　';
    echo'<a href="member_login.html">会員ログイン画面へ</a>';
    echo'<br><br><br>';
  } else{
    echo 'ようこそ';
    echo $_SESSION['member_name'];
    echo '様<br>';
    echo '<a href="member_logout.html">ログアウト</a><br>';
    echo '<br><br><br>';  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>商品詳細</title>
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
  $pro_gazou_name=$rec['gazou'];

  $dbh = null;

  if($pro_gazou_name==''){
    $disp_gazou='';
  } else{
    $disp_gazou='<img src="../product/gazou/'.$pro_gazou_name.'">';
  }
  echo '<a href="shop_cartin.php?procode='.$pro_code.'">カートに入れる</a><br><br>';

} catch(Exception $e){
  echo 'エラーが発生しました。';
  exit('DB-Connection-Error:'.$e->getMessage());
}
?>

商品情報参照<br>
<br>
商品コード<br>
<?=$pro_code?>
<br>
商品名<br>
<?=$pro_name?>
<br>
価格<br>
<?=$pro_price?>円
<br>
<?=$disp_gazou?>
<br>
<br>
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>
</body>
</html>