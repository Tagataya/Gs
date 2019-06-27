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
  if(isset($_SESSION['cart'])==true){
    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];
    $max = count($cart);
  }else{
    $max = 0;
  }
  // var_dump($kazu);
  // exit();
  if($max==0){
    echo 'カートに商品が入っていません。<br>';
    echo '<br>';
    echo '<a href="shop_list.php">商品一覧へ戻る</a>';
    exit();
  }

  $dsn ='mysql:dbname=gs_proPHP;host=localhost;charset=UTF8';
  $user ='root';
  $password ='';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  foreach($cart as $key => $val){
    $sql ='SELECT code,name,price,gazou FROM mst_product WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[0]=$val;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    $pro_name[]=$rec['name'];
    $pro_price[]=$rec['price'];
    if($rec['gazou']==''){
      $pro_gazou[]='';
    } else {
      $pro_gazou[]='<img src="../product/gazou/'.$rec['gazou'].'">';
    }
  }

  $dbh = null;

} catch(Exception $e){
  echo 'エラーが発生しました。';
  exit('DB-Connection-Error:'.$e->getMessage());
}
?>
カートの中身 <br>
<br>
<!-- ↓ここの数の変更をAjaxでできないか、後で検討 -->
<form method="post" action="kazu_change.php">
<table>
  <tr>
  <th>商品</th>
  <th>商品画像</th>
  <th>価格</th>
  <th>数量</th>
  <th>小計</th>
  <th>削除</th>
  </tr>

  <?php for($i=0;$i<$max;$i++){ ?>
  <tr>
    <td><?= $pro_name[$i] ;?></td>
    <td><?= $pro_gazou[$i];?></td>
    <td><?= $pro_price[$i];?>円</td>
    <td><input type="text" name="kazu<?=$i;?>" value="<?= $kazu[$i];?>" style="width:30px;"></td>
    <td><?= $pro_price[$i]*$kazu[$i];?>円</td>
    <td><input type="checkbox" name="sakujo<?= $i;?>"></td>
  </tr>
  <?php } ?>
</table>

<input type="hidden" name = "max" value="<?= $max; ?>">
<br>
<input type="submit" value = "数量変更・削除"><br><br>
<!-- <input type="button" onclick="history.back()" value="戻る"> -->
<br>
<a href="shop_list.php">商品一覧へ</a>
</form>
<a href="shop_form.html">ご購入手続きへ進む<br></a>

<?php
  if(isset($_SESSION["member_login"])==true){
    echo '<a href="shop_kantan_check.php">会員かんたん注文へ進む</a><br>';
  }
?>

</body>
</html>