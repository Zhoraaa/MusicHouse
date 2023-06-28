<?php
require("connect.php");

$name = $_POST['name'];
$cost = $_POST['cost'];
$country = $_POST['country'];
$type = $_POST['type'];
$createDate = date("Y-m-d", strtotime($_POST['createDate']));

$check = explode(".", $_FILES['image']['name']);
switch (end($check)) {
    default:
        $_SESSION['result'] = "Принимаются только файлы png, jpg и jpeg";
        break;
    case "png":
    case "jpg":
    case "jpeg":
        $uploadTo = "../img/products/";
        if (!file_exists($uploadTo)) {
            mkdir($uploadTo, 0777, true);
        }

        $check = explode(".", $_FILES['image']['name']);
        $img = md5(time()) . "." . end($check);
        $moveTo = $uploadTo . $img;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $moveTo)) {
            $query = "INSERT INTO `products` (`id`, `name`, `cost`, `image`, `create_date`, `country`, `type`) VALUES (NULL, '$name', '$cost', '$img', '$createDate', '$country', '$type')";
            $res = $con->query($query);
        }

        break;
}

header("Location: /admin.php?tool=products&edit=product");
