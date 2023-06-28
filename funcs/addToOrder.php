<?php
require "../functions/connect.php";
require "../functions/getProduct.php";
$id = $_GET['id'];

$query = "SELECT * FROM `orders` WHERE `client` = '" . $_COOKIE['user'] . "' AND `game` = $id AND `status` = '1'";
$res = $con->query($query);
$check = $res->fetch_assoc();
print_r($check);

function addToCart($con, $id, $check)
{
    if (empty($check)) {
        echo $query = "INSERT INTO `orders`(`id`, `client`, `game`, `count`, `status`) VALUES (NULL,'" . $_COOKIE['user'] . "','$id','1','1')";
        $res = $con->query($query);
        $_SESSION['result'] .= "Товар добавлен!";
    } else {
        $count = $check['count'] + 1;
        echo $query = "UPDATE `orders` SET `count`='$count' WHERE `id`=" . $check['id'];
        $res = $con->query($query);
        $_SESSION['result'] .= "Количество товара увеличено!";
    }
}

if ($product['count']) {
    if ($check['count'] < $product['count'] || empty($check)) {
        addToCart($con, $id, $check);
        $_SESSION['result'] = "Корзина пополнена! ";
    } else {
        $_SESSION['result'] = "Извините! Вы уже претендуете на все ключи для этого товара!";
    }
} else {
    $_SESSION['result'] = "Извините! Сейчас нет ключей для этого товара!";
}
echo $_SESSION['result'];
header("location: ../product.php?id=$id");