<nav class="navbar navbar-expand navbar-light bg-light">
    <!-- <span class="navbar-brand">Link:</span> -->
    <ul class="nav">
      <li class="nav-item"><span class="nav-link"><?= $_SESSION["name"]?>さん こんにちは！</span></li>
      <li class="nav-item"><span class="nav-link">■ Link</span></li>
      <li class="nav-item"><a href="select.php" class="nav-link">書籍一覧</a></li>
      <li class="nav-item"><a href="index.php" class="nav-link">書籍登録</a></li>
      <?php if($_SESSION["kanri_flg"]=="1") {?>
      <li class="nav-item"><a href="../user/select_user.php" class="nav-link">ユーザー一覧</a></li>
      <li class="nav-item"><a href="../user/index_user.php" class="nav-link">ユーザー登録</a></li>
      <?php } ?>
      <li class="nav-item"><a href="../logout.php" class="nav-link">Log Out</a></li>
    </ul>
</nav>