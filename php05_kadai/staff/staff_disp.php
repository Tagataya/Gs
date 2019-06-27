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
  <title>スタッフ詳細</title>
</head>
<body>
<?php
try{
  $staff_code = $_GET['staffcode'];

  $dsn ='mysql:dbname=gs_proPHP;host=localhost;charset=UTF8';
  $user ='root';
  $password ='';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql ='SELECT name FROM mst_staff WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[]=$staff_code;
  $stmt->execute($data);

  $rec=$stmt->fetch(PDO::FETCH_ASSOC);
  $staff_name=$rec['name'];

  $dbh = null;

} catch(Exception $e){
  echo 'エラーが発生しました。';
  exit('DB-Connection-Error:'.$e->getMessage());
}
?>

スタッフ情報参照<br>
<br>
スタッフコード<br>
<?=$staff_code?>
<br>
スタッフ名<br>
<?=$staff_name?>
<br>
<br>
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>
</body>
</html>