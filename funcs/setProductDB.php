<?php
require("../functions/connect.php");

$name = $_POST['name'];
$description = $_POST['description'];
$publisher = $_POST['publisher'];
$developer = $_POST['developer'];
$shop = $_POST['shop'];
$cost = $_POST['cost'];
$saleCost = (empty($_POST['saleCost'])) ? "NULL" : "'".$_POST['saleCost']."'";
$OS = $_POST['OS'];
$CPU = $_POST['CPU'];
$RAM = $_POST['RAM'];
$GPU = $_POST['OS'];
$memory = $_POST['memory'];
$releaseDate = date("Y-m-d", strtotime($_POST['releaseDate']));
$SSD = (isset($_POST['SSD'])) ? 1 : 0;

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
            mkdir($uploadDir, 0777, true);
        }
        $img = md5(time()) . "." . end($check);
        $moveTo = $uploadTo . $img;
        move_uploaded_file($_FILES['image']['tmp_name'], $moveTo);

        $query = "INSERT INTO `products` 
        (`id`, `name`, `description`, `sale_cost`, `cost`, `image`, `publisher`, `developer`, `shop`, 
        `os`, `processor`, `videocard`, `ram`, `memory`, `release_date`, `ssd`) VALUES 
        (NULL, '$name', '$description', $saleCost, '$cost', '$img', '$publisher', '$developer', '$shop', '$OS', '$CPU', '$GPU', '$RAM', '$memory', '$releaseDate', '$SSD')";
        $res = $con->query($query);
        break;
}

header("Location: /catalogue.php");
