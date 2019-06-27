<?php
  session_start();
  session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<?php

try{
  require_once('../common/common.php');
  $post = sanitize($_POST);
  
  $onamae=$post['onamae'];
  $email=$post['email'];
  $postal1=$post['postal1'];
  $postal2=$post['postal2'];
  $address=$post['address'];
  $tel=$post['tel'];
  $chumon=$post['chumon'];
  $pass=$post['pass'];
  $danjo=$post['danjo'];
  $birth=$post['birth'];
  
  echo $onamae.'様<br>';
  echo 'ご注文ありがとうございました。<br><br>';
  echo $email.'に確認メールを送信しましたので、ご確認ください。<br>';
  echo '商品は以下の住所に発送させていただきます。<br><br>';
  echo $postal1.'-'.$postal2.'<br>';
  echo $address.'<br>';
  echo $tel.'<br>';
  if($chumon=='chumontouroku'){
    echo '<br>';
    echo '会員登録が終了しました。';
    echo '<br>';
    echo '次回はメールアドレスとパスワードでログインしてください。';
    echo '<br>';
  }


  $honbun='';
  $honbun.="■メール本文■\n";//メール送信のcodeは実際にはxammpでは飛ばないのでpassした。
  $honbun.=$onamae."様\n\nこのたびはご注文ありがとうございました。\n\n";
  $honbun.="ご注文商品\n";
  $honbun.="-----------------------------------------------\n";

  $cart=$_SESSION['cart'];
  $kazu=$_SESSION['kazu'];
  $max=count($cart);

  $dsn = 'mysql:dbname=gs_proPHP;host=localhost;charset=utf8';
  $user = 'root';
  $password ='';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $total=0;
  for($i=0; $i<$max; $i++){
    $sql='SELECT name, price FROM mst_product WHERE code=?';
    $stmt=$dbh->prepare($sql);
    $data[0]=$cart[$i];
    $stmt->execute($data);

    $rec=$stmt->fetch(PDO::FETCH_ASSOC);

    $name=$rec['name'];
    $price=$rec['price'];
    $kakaku[]=$price;
    $suryo=$kazu[$i];
    $shokei=$price*$suryo;

    $honbun.=$name.' ';
    $honbun.=$price.'円 ｘ ';
    $honbun.=$suryo.'個 = ';
    $honbun.=$shokei."円 \n";
    $total +=$shokei;
  }

  $sql='LOCK TABLES dat_sales WRITE,dat_sales_product WRITE,dat_member WRITE';
  $stmt=$dbh->prepare($sql);
  $stmt->execute();

  $lastmembercode=0;
  if($chumon=="chumontouroku"){
    $sql = 'INSERT INTO dat_member(password,name,email,postal1,postal2,address,tel,danjo,born) VALUES(:password,:name,:email,:postal1,:postal2,:address,:tel,:danjo,:born)';
    $stmt=$dbh->prepare($sql);
    $stmt->bindValue(':password', md5($pass), PDO::PARAM_STR);
    $stmt->bindValue(':name', $onamae, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':postal1', $postal1, PDO::PARAM_STR);
    $stmt->bindValue(':postal2', $postal2, PDO::PARAM_STR);
    $stmt->bindValue(':address', $address, PDO::PARAM_STR);
    $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
    if($danjo=='dan'){
      $stmt->bindValue(':danjo', 1, PDO::PARAM_STR);
    }else{
      $stmt->bindValue(':danjo', 2, PDO::PARAM_STR);
    }
    $stmt->bindValue(':born', $birth, PDO::PARAM_STR);
    $stmt->execute();
    
    $sql='SELECT LAST_INSERT_ID()';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $lastmembercode=$rec['LAST_INSERT_ID()'];
  }

  $sql = 'INSERT INTO dat_sales(code_member,name,email,postal1,postal2,address,tel) VALUES(:code_member,:name,:email,:postal1,:postal2,:address,:tel)';
  $stmt=$dbh->prepare($sql);
  $stmt->bindValue(':code_member', $lastmembercode, PDO::PARAM_STR);
  $stmt->bindValue(':name', $onamae, PDO::PARAM_STR);
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);
  $stmt->bindValue(':postal1', $postal1, PDO::PARAM_STR);
  $stmt->bindValue(':postal2', $postal2, PDO::PARAM_STR);
  $stmt->bindValue(':address', $address, PDO::PARAM_STR);
  $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
  $stmt->execute();
  
  $sql ='SELECT LAST_INSERT_ID()';
  $stmt=$dbh->prepare($sql);
  $stmt->execute();
  $rec=$stmt->fetch(PDO::FETCH_ASSOC);
  $lastcode=$rec['LAST_INSERT_ID()'];

  for($i=0; $i<$max; $i++){
    $sql = 'INSERT INTO dat_sales_product(code_sales,code_product,price,quantity) VALUES(:code_sales,:code_product,:price,:quantity)';  
    $stmt=$dbh->prepare($sql);
    $stmt->bindValue(':code_sales', $lastcode, PDO::PARAM_STR);
    $stmt->bindValue(':code_product', $cart[$i], PDO::PARAM_STR);
    $stmt->bindValue(':price', $kakaku[$i], PDO::PARAM_STR);
    $stmt->bindValue(':quantity', $kazu[$i], PDO::PARAM_STR);
    $stmt->execute();  
  }

  $sql='UNLOCK TABLES';
  $stmt=$dbh->prepare($sql);
  $stmt->execute();

  $dbh = null;

  $honbun.='以上　総計：'.$total.'円です。';
  $honbun.="\n";
  $honbun.="送料は無料です。\n";
  $honbun.="-----------------------------------------------\n\n";
  $honbun.="代金は以下の口座にお振込みください。\n";
  $honbun.="●●銀行 ●●支店 普通口座１２３４５６７\n";
  $honbun.="入金が確認され次第、発送いたします。\n\n";
  $honbun.="田方屋\n";
  $honbun.="静岡県伊東市宇佐美\n";
  $honbun.="電話 0557-99-9999\n";
  $honbun.="メール info@tagataya.co.jp\n";

  echo '<br>';
  echo nl2br($honbun);

  

} catch(Exception $e){
  echo 'エラーが発生しました。';
  exit('DB-Connection-Error:'.$e->getMessage());
}
?>
<br>
<a href="clear_cart.php">商品画面へ</a>
</body>
</html>