<?php
session_start(); //これを入れ忘れてエラーになった。講義と同じ過ち。
include "../funcs.php";
chkSsid_KanriFlg();
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$list = "";
$nbr = 1;
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      if($nbr % 2 == 0){
        $list .= '<tr bgcolor="#f1f1f1"><th width="50px" class="text-center">'.($nbr).'</th>';
      }else{
        $list .= '<tr><th width="50px" class="text-center">'.($nbr).'</th>';
      }
      $list .= '<td width="70px">';
      $list .= '<a href="amend_user.php?id='.$result["id"].'">';
      $list .= "[修正]";
      $list .= '</a>';
      $list .= '</td>';
      $list .= '<td width="70px">';
      $list .= '<a href="confirm_delete_user.php?id='.$result["id"].'">';
      $list .= "[削除]";
      $list .= '</a>';
      $list .= '</td>';
      $list .= '<td width="150px">'.$result["name"].'</td>';
      $list .= '<td width="200px">'.$result["lid"].'</td>';
      $list .= '<td width="150px">'.substr($result["lpw"],0,10).'・・・</td>';
      $list .= '<td width="50px" class="text-center">'.$result["kanri_flg"].'</td>';
      $list .= '<td width="50px" class="text-center">'.$result["life_flg"].'</td>';
      $list .= '<td width="200px">'.$result["created"].'</td>';
      $list .= '<td width="200px">'.$result["updated"].'</td></tr>';

      $nbr++ ;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>登録者リスト</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body id="main">
<header>
  <div class="container">
  <?php include("../menu_user.php"); ?>
  </div>
</header>
<div class="container">
  <h2 class="mt-4 mb-4">登録者リスト</h2>
<!-- テーブルにする -->
<table cellpadding="8">
<tr bgcolor="#cccccc"><th class="text-center">#</th><th>操作1</th><th>操作2</th><th>氏名</th><th>ID</th><th>PW（hash）</th><th>K_flg</th><th>L_flg</th><th>登録日時</th><th>修正日時</th></tr>
<?=$list?>
</table>
<!-- テーブル以上 -->
</div>

</body>
</html>
