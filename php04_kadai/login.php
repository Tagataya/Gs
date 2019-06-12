<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Login</title>
</head>
<body>
<div class="container">
  <h2 class="mt-4 mb-4">書籍DB：ログイン画面</h2>
  <form action="login_act.php" method="post">
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
    <button type="submit" class="btn btn-outline-secondary">ログイン</button>
  </form>
</div>
</body>
</html>

<!-- 
  DBはPHP03_kadaiと同じものとした。
 -->