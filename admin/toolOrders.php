<?php
require_once("security.php");
require_once("./funcs/DBinteraction.php");
$query = "SELECT 
orders.id, 
CONCAT(users.surname, ' ', users.name, ' ', users.patronymic) AS client,
products.name AS `name`, 
statuses.name AS `status` 

FROM orders 

INNER JOIN products ON orders.product = products.id 
INNER JOIN users ON orders.client = users.id 
INNER JOIN statuses ON orders.`status` = statuses.id";
$orders = selectFrom($query, "ALL");

?>
<div class="list flex column g10 wcenter">
    <?php
    require("./funcs/listGenerator.php");
    ?>
    <h2>Новые:</h2>
    <?php
    $emptyList = true;
    foreach ($orders as $order) {
        if ($order['status'] == "Новый") {
            generateListItem($order, "order");
            $emptyList = false;
        }
    }
    if ($emptyList) {
    ?>
        <p>Новых заказов ещё нет.</p>
    <?php
    }
    ?>
    <h2>Старые:</h2>
    <?php
    $emptyList = true;
    foreach ($orders as $order) {
        if ($order['status'] == "Старый") {
            generateListItem($order, "order");
            $emptyList = false;
        }
    }
    if ($emptyList) {
    ?>
        <p>Старых заказов ещё нет.</p>
    <?php
    }   
    ?>
</div>