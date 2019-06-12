<?php
session_start(); //これを入れ忘れてエラーになった。講義と同じ過ち。
include "../funcs.php";
chkSsid_KanriFlg();
// amend_user.phpからのデータの受取
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$lpw2 = $_POST['lpw2'];
$kanri_flg = $_POST['kanri_flg'];
$life_flg = $_POST['life_flg'];
$id = $_POST['id'];

// サニタイズ
$name = h($name);
$lid = h($lid);
$lpw = h($lpw);
$lpw2 = h($lpw2);
$kanri_flg = h($kanri_flg);
$life_flg = h($life_flg);
$id = h($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>修正内容確認</title>
</head>
<body>
<header>
  <div class="container">
  <?php include("../menu_user.php"); ?>
  </div>
</header>
<div class="container">
  <h2 class="mt-4 mb-4">修正内容確認</h2>
  <form  method="post" action="update_user.php">
    <div class="form-group row mb-4">
      <label for="name" class="col-sm-2 pt-2">氏名</label>
      <div class="col-sm-4">
      <input type="text" class="form-control" name= "name" id="name" value="<?=$name?>" readonly>
      </div>
    </div>
    <div class="form-group row mb-4">
      <label for="lid" class="col-sm-2 pt-2">ID</label>
      <div class="col-sm-4">
      <input type="text" class="form-control" name= "lid" id="lid" value="<?=$lid?>" readonly>
      </div>
    </div>
    <div class="form-group row mb-4">
      <label for="lpw" class="col-sm-2 pt-2">PASSWORD</label>
      <div class="col-sm-4">
      <input type="password" class="form-control" name= "lpw" id="lpw" value="<?=$lpw?>" readonly>
      </div>
    </div>
    <div class="form-group row mb-4">
      <label for="lpw2" class="col-sm-2 pt-2">再入力PASSWORD</label>
      <div class="col-sm-4">
      <input type="password" class="form-control" name= "lpw2" id="lpw2" value="<?=$lpw2?>" readonly>
      </div>
    </div>
    <div class="form-group row mb-4">
      <label for="kanri_flg" class="col-sm-4 pt-2">0:管理者 1:スーパー管理者</label>
      <div class="col-sm-1">
      <input type="number" class="form-control" name= "kanri_flg" id="kanri_flg" value="<?=$kanri_flg?>" readonly>
      </div>
    </div>
    <div class="form-group row mb-4">
      <label for="life_flg" class="col-sm-4 pt-2">0:使用中 1:使用中止</label>
      <div class="col-sm-1">
      <input type="number" class="form-control" name= "life_flg" id="life_flg" value="<?=$life_flg?>" readonly>
      </div>
    </div>
  </form>
    <hr>
    <!-- 内容判定php -->
    <?php
      if($lpw != $lpw2){
        echo "パスワードが一致しません。戻って再入力してください。<br><br>";
        echo'<form>';
        echo'<input type = "button" onclick="history.back()" value="戻る" class="btn btn-outline-secondary">';
        echo'</form>';
      } elseif
        ($name==''|| $lid==''|| $lpw=='' || $kanri_flg=='' ||$life_flg==''){
        echo "未入力の項目があります。戻って入力してください。<br><br>";
        echo'<form>';
        echo'<input type = "button" onclick="history.back()" value="戻る" class="btn btn-outline-secondary">';
        echo'</form>';
      } else{ //問題がないときの処理
        echo '<br>';
        echo '宜しければ「OK」をクリックして登録してください。';
        $lpw = password_hash($lpw,PASSWORD_DEFAULT);//Gsで習ったやり方
        echo '<form method="post" action="update_user.php">';
        echo '<input type="hidden" name= "name" value="'.$name.'">'; //文字列をつなげている！！！
        echo '<input type="hidden" name= "lid" value="'.$lid.'">';
        echo '<input type="hidden" name= "lpw" value="'.$lpw.'">';
        echo '<input type="hidden" name= "kanri_flg" value="'.$kanri_flg.'">';
        echo '<input type="hidden" name= "life_flg" value="'.$life_flg.'">';
        echo '<input type="hidden" name= "id" value="'.$id.'">';
        echo '<br>';
        echo '<input type="submit" value="OK" class="btn btn-outline-secondary">';
        echo '　　';
        echo '<input type="button" onclick="history.back()" value="戻る" class="btn btn-outline-secondary">';
        echo '</form>';
      }
    ?>
</div>
</body>
</html>