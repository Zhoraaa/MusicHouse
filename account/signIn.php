<?php
require_once("../connections.php");

$login = $_GET['login'];
$pass = md5($_GET['password']);

$query = "SELECT * FROM `users` WHERE `login` = '$login' OR `email` = '$login' AND `password` = '$pass'";
$res = $con->query($query);
$user = mysqli_fetch_assoc($res);

if ($user) {
  $_SESSION['result'] = "Добро пожаловать";
  setcookie('user', $user['id'], time() + 3600 * 24, "/");
} else {
  $_SESSION['result'] = "Зло пожаловать";
}

header("location: /");