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

  $year=$_POST['year'];
  $month=$_POST['month'];
  $day=$_POST['day'];

  $dsn ='mysql:dbname=gs_proPHP;host=localhost;charset=UTF8';
  $user ='root';
  $password ='';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql ='
  SELECT
    dat_sales.code,
    dat_sales.date,
    dat_sales.code_member,
    dat_sales.name AS dat_sales_name,
    dat_sales.email,
    dat_sales.postal1,
    dat_sales.postal2,
    dat_sales.address,
    dat_sales.tel,
    dat_sales_product.code_product,
    mst_product.name AS mst_product_name,
    dat_sales_product.price,
    dat_sales_product.quantity
  FROM
    dat_sales,dat_sales_product,mst_product
  WHERE
    dat_sales.code=dat_sales_product.code_sales
    AND dat_sales_product.code_product=mst_product.code
    AND substr(dat_sales.date,1,4)=:year
    AND substr(dat_sales.date,6,2)=:month
    AND substr(dat_sales.date,9,2)=:day
  ';
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':year', $year, PDO::PARAM_STR);
  $stmt->bindValue(':month', $month, PDO::PARAM_STR);
  $stmt->bindValue(':day', $day, PDO::PARAM_STR);
  $stmt->execute();

  $dbh = null;
  
  $csv='注文コード,注文日時,会員番号,お名前,メール,郵便番号,住所,TEL,商品コード,商品名,価格,数量';
  $csv.="\n";
  while(true){
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false){
      break;
    }
    $csv.=$rec['code'];
    $csv.=',';
    $csv.=$rec['date'];
    $csv.=',';
    $csv.=$rec['code_member'];
    $csv.=',';
    $csv.=$rec['dat_sales_name'];
    $csv.=',';
    $csv.=$rec['email'];
    $csv.=',';
    $csv.=$rec['postal1'].'-'.$rec['postal2'];
    $csv.=',';
    $csv.=$rec['address'];
    $csv.=',';
    $csv.=$rec['tel'];
    $csv.=',';
    $csv.=$rec['code_product'];
    $csv.=',';
    $csv.=$rec['mst_product_name'];
    $csv.=',';
    $csv.=$rec['price'];
    $csv.=',';
    $csv.=$rec['quantity'];
    $csv.="\n";
  }

  //echo nl2br($csv); $csv1の内容を表示する
  $file=fopen('./chumon.csv','w');
  $csv=mb_convert_encoding($csv,'SJIS','UTF-8');
  fputs($file,$csv);
  fclose($file);

} catch(Exception $e){
  echo 'エラーが発生しました。';
  exit('DB-Connection-Error:'.$e->getMessage());
}
?>
<br>
<a href="chumon.csv">注文データのダウンロード</a><br>
<br>
<a href="order_download.php">日付選択へ</a><br>
<a href="../staff_login/staff_top.php">トップメニューへ</a><br>
<a href="../staff_login/staff_logout.php">ログアウト</a><br>

</body>
</html>