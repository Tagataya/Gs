<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>管理ユーザー登録</title>
</head>
<body>
<div class="container">
  <h2 class="mt-4 mb-4">管理ユーザー登録</h2>
  <form  method="post" action="confirm_user.php">
    <div class="form-group row mb-4">
      <label for="name" class="col-sm-2 pt-2">氏名を入力</label>
      <div class="col-sm-4">
      <input type="text" class="form-control" name= "name" id="name">
      </div>
    </div>
    <div class="form-group row mb-4">
      <label for="lid" class="col-sm-2 pt-2">IDを入力</label>
      <div class="col-sm-4">
      <input type="text" class="form-control" name= "lid" id="lid">
      </div>
    </div>
    <div class="form-group row mb-4">
      <label for="lpw" class="col-sm-2 pt-2">PASSWORDを入力</label>
      <div class="col-sm-4">
      <input type="password" class="form-control" name= "lpw" id="lpw">
      </div>
    </div>
    <div class="form-group row mb-4">
      <label for="lpw2" class="col-sm-2 pt-2">PASSWORDを再入力</label>
      <div class="col-sm-4">
      <input type="password" class="form-control" name= "lpw2" id="lpw2">
      </div>
    </div>
    <div class="form-group row mb-4">
      <label for="kanri_flg" class="col-sm-4 pt-2">管理者フラグを入力ー0:管理者 1:スーパー管理者</label>
      <div class="col-sm-1">
      <input type="number" class="form-control" name= "kanri_flg" id="kanri_flg">
      </div>
    </div>
    <div class="form-group row mb-4">
      <label for="life_flg" class="col-sm-4 pt-2">使用フラグを入力ー0:使用中 1:使用中止</label>
      <div class="col-sm-1">
      <input type="number" class="form-control" name= "life_flg" id="life_flg">
      </div>
    </div>

    <button type="submit" class="btn btn-outline-secondary">内容確認</button>　　
    <input type="button" onclick="location.href='select_user.php'" value="リストへ" class="btn btn-outline-secondary">　　
    <input type="button" onclick="location.href='index.php'" value="書籍登録へ" class="btn btn-outline-secondary">

  </form>
</div>
</body>
</html>

<!-- 
未了事項


 -->