<?php
$con = mysqli_connect("localhost", "root", "", "music_house");
session_start();

if (isset($_COOKIE['user'])) {
  $query = "SELECT * FROM `users` WHERE `id_user` = ".$_COOKIE['user'];
  $res = $con->query($query);
  $user = mysqli_fetch_assoc($res);
}
?>