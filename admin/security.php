<?php
if (!isset($user)) {
    require_once("./funcs/user.php");
}
if ($user['role'] != 1) {
    header('location: /');
}
