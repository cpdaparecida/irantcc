<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['funcao']);
unset($_SESSION['hospital']);
unset($_SESSION['hospitais']);
setcookie('login', null, -1);
setcookie('funcao', null, -1);
setcookie('hospital', null, -1);
setcookie('hospitais', null, -1);
header('location:login.html');
?>