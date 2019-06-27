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
  if(isset($_SESSION['cart'])==true){
    $cart=$_SESSION['cart'];
    $kazu=$_SESSION['kazu'];
    if(in_array($pro_code,$cart)==true){ //in_arrayは要素があるかどうかの判別をする
      echo 'その商品はすでにカートに入っています。<br>';
      echo '<a href="shop_list.php">商品一覧に戻る</a>';
      exit();
    }
  }
    $cart[]=$pro_code;
    $kazu[]=1;
    $_SESSION['cart']=$cart;
    $_SESSION['kazu']=$kazu;

  // チェック用 P193
  // foreach($cart as $key=>$val){
  //   echo $val;
  //   echo '<br>';
  // }

} catch(Exception $e){
  echo 'エラーが発生しました。';
  exit('DB-Connection-Error:'.$e->getMessage());
}
?>

カートに追加しました。<br>
<br>
<a href="shop_list.php">商品一覧に戻る</a>　
<a href="shop_cartlook.php">カートを見る</a>

</body>
</html>