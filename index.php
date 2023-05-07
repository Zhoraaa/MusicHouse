<?php
require_once("./connections.php");
require_once("./alert.php");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../fonts/fonts.css">
  <title>MusicHouse</title>
</head>

<body>
  <a href="../ajax-sources/signUpForm.html" class="ajax">Регистрация</a>
  <a href="../ajax-sources/signInForm.html" class="ajax">Вход</a>
  <section id="output"></section>
  <script src="./scripts/ajax.js"></script>