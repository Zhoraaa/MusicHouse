<?php
require("../functions/connect.php");

$id = $_POST['id'];
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

$query = "SELECT `image` FROM `products` WHERE `id` = $id";
$res = $con->query($query);
$product = $res->fetch_assoc();
$oldImg = $product['image'];
$img = "`image` = '$oldImg'";
if (!empty($_FILES['image'])) {
    $check = explode(".", $_FILES['image']['name']);
    switch (end($check)) {
        default:
            $_SESSION['result'] = "Принимаются только файлы png, jpg и jpeg";
            break;
        case "png":
        case "jpg":
        case "jpeg":
            if (file_exists("../img/products/$oldImg")) {
                unlink("../img/products/$oldImg");
            }
            $uploadTo = "../img/products/";
            if (!file_exists($uploadTo)) {
                mkdir($uploadDir, 0777, true);
            }
            $newImg = md5(time()) . "." . end($check);
            $moveTo = $uploadTo . $newImg;
            move_uploaded_file($_FILES['image']['tmp_name'], $moveTo);
            $img = "`image` = '$newImg'";
            break;
    }
}

echo $query = "UPDATE `products` SET 
`name` = '$name', 
`description` = '$description', 
`cost` = '$cost', 
`sale_cost` = $saleCost, 
$img, 
`developer` = '$developer', 
`publisher` = '$publisher', 
`shop` = '$shop', 
`os` = '$OS', 
`processor` = '$CPU', 
`videocard` = '$GPU', 
`ram` = '$RAM', 
`memory` = '$memory', 
`release_date` = '$releaseDate', 
`ssd` = '$SSD' 
WHERE `products`.`id` = $id";
$res = $con->query($query);

header("Location: ../product.php?id=$id");
