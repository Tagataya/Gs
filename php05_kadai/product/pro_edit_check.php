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
  <title>内容確認</title>
</head>
<body>
商品追加 確認<br>
<br>
<?php
require_once('../common/common.php');

$post = sanitize($_POST);

$code = $post['code'];
$name = $post['name'];
$price = $post['price'];
$pro_gazou_name_old=$post['gazou_name_old'];
$gazou = $_FILES['gazou'];

if($name==''){
  echo "商品名が入力されていません。 <br>";
} else{
  echo '商品名：';
  echo $name;
  echo '<br>';
}

if(preg_match('/^[0-9]+$/',$price)==0){
  echo "価格は半角の数字できちんといれてください。 <br>";
} else{
  echo '価格：';
  echo $price;
  echo '円<br>';
}

if($gazou['size']>0){
  if($gazou['size']>1000000){
    echo '画像が大きすぎます。';
  } else{
    move_uploaded_file($gazou['tmp_name'],'./gazou/'.$gazou['name']);
    echo '<img src="./gazou/'.$gazou['name'].'">';
    echo '<br>';
  }
}

if($name=='' || preg_match('/^[0-9]+$/',$price)==0 || $gazou['size']>1000000){
  echo '<form>';
  echo '<input type="button" onclick="history.back()" value="戻る">';
  echo '</form>';
}else{
  echo '上記のとおり商品を修正します。';
  echo '<form method="post" action="pro_edit_done.php">';
  echo '<input type="hidden" name="code" value="'.$code.'">';
  echo '<input type="hidden" name="name" value="'.$name.'">';
  echo '<input type="hidden" name="price" value="'.$price.'">';
  echo '<input type="hidden" name="gazou_name_old" value="'.$pro_gazou_name_old.'">';
  echo '<input type="hidden" name="gazou_name" value="'.$gazou['name'].'">';
  echo '<br>';
  echo '修正しますか？';
  echo '<br>';
  echo '<input type="button" onclick="history.back()" value="戻る">';
  echo '<input type="submit" value="OK">';
  echo '</form>';
}
?>
</body>
</html>