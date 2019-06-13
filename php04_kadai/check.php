<?php
$pass = 'tomohide';
echo password_hash($pass,PASSWORD_DEFAULT).'<br>';
echo password_hash($pass,PASSWORD_DEFAULT).'<br>';
echo password_hash($pass,PASSWORD_DEFAULT);
echo '<br>';