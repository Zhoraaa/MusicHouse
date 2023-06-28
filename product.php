<?php
require("./funcs/pageBase.php");
require("./funcs/user.php");
require("./funcs/session.php");
require("./funcs/alert.php");
require("./funcs/DBinteraction.php");

if (!empty($_GET['id'])) {
    $query = "SELECT 
    products.id,
    products.name,
    products.cost,
    products.image,
    products.create_date,
    countries.name AS country,
    types.name AS type
  FROM products
  INNER JOIN countries ON products.country = countries.id
  INNER JOIN types ON products.type = types.id
  WHERE products.id = " . $_GET['id'] .
  " ORDER BY products.name ASC;";
    $product = selectFrom($query, "ONE");
    if (isset($_GET['edit']) && $user['role'] == 1) {
        include "./funcs/editProduct.php";
    } else {
        include "./funcs/seeProduct.php";
    }
} elseif ($user['role'] == 1 && empty($_GET['id'])) {
    include "./admin/setProduct.php";
}
