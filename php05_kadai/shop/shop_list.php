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
    echo '<a href="member_logout.php">ログアウト</a><br>';
    echo '<br><br><br>';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Product List</title>
</head>
<body>
<?php
try{
  $dsn ='mysql:dbname=gs_proPHP;host=localhost;charset=UTF8';
  $user ='root';
  $password ='';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql ='SELECT code,name,price FROM mst_product WHERE 1';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  $dbh = null;
  echo '商品一覧<br>';
  echo '購入希望の商品をクリックしてください。<br><br>';

  while(true){
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    IF($rec==false){
      break;
    }
    echo '<a href="shop_product.php?procode='.$rec['code'].'">';
    echo $rec['name'].'---';
    echo $rec['price'].'円';
    echo '</a><br>';
  }

} catch(Exception $e){
  echo 'エラーが発生しました。';
  exit('DB-Connection-Error:'.$e->getMessage());
}
?>

<br>
<a href="shop_cartlook.php">カートを見る</a>

</body>
</html>