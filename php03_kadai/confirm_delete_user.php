<?php
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
$id = $_GET["id"];

include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);//あぶない文字を無効化してくれる。,PDO以下はなくてもOK
$status = $stmt->execute(); 
  //ここでstmtにSQLの実行結果が格納される。
  //statusにはtrueかfalseしか格納されない。

//３．データ表示
// $view = "";
if ($status == false) {
    sqlError($stmt);
} 
$row = $stmt->fetch();//executeで格納されたdataを1つだけとってくる
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>削除確認</title>
</head>
<body>
  <div class="container">
  <h2 class="mt-4 mb-4">削除対象の確認</h2>
  <form  method="post" action="delete_user.php">
    <div class="form-group row mb-4">
      <label for="name" class="col-sm-2 pt-2">氏名</label>
      <div class="col-sm-4">
      <input type="text" class="form-control" name= "name" id="name" value="<?=$row["name"]?>" readonly>
      </div>
    </div>
    <div class="form-group row mb-4">
      <label for="lid" class="col-sm-2 pt-2">ID</label>
      <div class="col-sm-4">
      <input type="text" class="form-control" name= "lid" id="lid" value="<?=$row["lid"]?>" readonly>
      </div>
    </div>
    <div class="form-group row mb-4">
      <label for="kanri_flg" class="col-sm-4 pt-2">0:管理者 1:スーパー管理者</label>
      <div class="col-sm-1">
      <input type="number" class="form-control" name= "kanri_flg" id="kanri_flg" value="<?=$row["kanri_flg"]?>" readonly>
      </div>
    </div>
    <div class="form-group row mb-4">
      <label for="life_flg" class="col-sm-4 pt-2">0:使用中 1:使用中止</label>
      <div class="col-sm-1">
      <input type="number" class="form-control" name= "life_flg" id="life_flg" value="<?=$row["life_flg"]?>" readonly>
      </div>
    </div>
    <input type="hidden" name="id" value="<?=$row["id"]?>"> <!-- ここのidがpostされる -->
    <hr>
    <p>本当にこのデータを削除しますか？</p>
    <button type="submit" class="btn btn-outline-secondary">削除する！</button>　　
    <input type="button" onclick="history.back()" value="やっぱやめとく" class="btn btn-outline-secondary">
  </form>
</div>
</body>
</html>