<?php
require("../funcs/connect.php");
require("../funcs/session.php");

if (!isset($_GET['rules'])) {
    $_SESSION['result'] = "Вы пренебрегаете нашими правилами.";
} else {
    // Подключение БД и сессии
    require("../funcs/DBinteraction.php");
    $_SESSION['result'] = "Регистрация не была завершена по неизвестной ошибке";

    // Запись в переменные для последующего SQL-запроса
    $login = $_GET['login'];
    $name = $_GET['name'];
    $surname = $_GET['surname'];
    $patronymic = (!empty($_GET['patronymic'])) ? "'" . $_GET['patronymic'] . "'" : "NULL";
    $email = $_GET['email'];
    $pass = ($_GET['password'] == $_GET['password_repeat']) ? $_GET['password'] : false;

    // Защита от дурака, отключившего JS
    if (!$login || mb_strlen($login) < 6 || mb_strlen($login) > 32) {
        $_SESSION['result'] = "Введите корректный логин (от 6 до 32 символов, латиница и цифры)";
    } elseif (!$email) {
        $_SESSION['result'] = "Введите почту";
    } elseif (!$pass || mb_strlen($pass) < 6 || mb_strlen($pass) > 32) {
        $_SESSION['result'] = "Пароли корректный пароль (от 6 до 32 символов, латиница и цифры)";
    } else {
        // Проверка логина, почты и телефона на уникальность
        $res = $con->query("SELECT * FROM users WHERE `login`='$login'");
        $checkLogin = mysqli_fetch_assoc($res);
        $res = $con->query("SELECT * FROM users WHERE `email`='$email'");
        $checkEmail = mysqli_fetch_assoc($res);

        if ($checkLogin) {
            $_SESSION['result'] = "Логин уже используется";
        } elseif ($checkEmail) {
            $_SESSION['result'] = "Почта уже используется";
        } else {
            // Добавление пользователя. Всегда есть хотябы один админ.
            $query = "SELECT * FROM `users` WHERE role = 1";
            $res = $con->query($query);
            $check = $res->fetch_all(MYSQLI_ASSOC);
            $role = (!empty($check)) ? 1 : 2;

            $pass = md5($pass);

            $query = "INSERT INTO `users`
        (`id`, `login`, `name`, `surname`, `patronymic`, `password`, `email`, `role`) 
        VALUES 
        (NULL,'$login','$name','$surname',$patronymic,'$pass','$email','$role')";
            $res = insertOrUpdate($query);

            // Автоматический вход в аккаунт после регистрации
            include "signIn.php";

            $_SESSION['result'] = "Регистрация завершена. Добро пожаловать, " . $account['name'] . "!";
        }
    }
}
header("location: /");

