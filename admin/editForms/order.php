<?php
require_once("./funcs/DBinteraction.php");
$query = "SELECT 
orders.id, 
CONCAT(users.surname, ' ', users.name, ' ', users.patronymic) AS client,
products.name AS `name`, 
products.cost AS cost,
countries.name AS country, 
types.name AS type, 
statuses.name AS `status` 

FROM orders 

INNER JOIN products ON orders.product = products.id 
INNER JOIN users ON orders.client = users.id 
INNER JOIN countries ON products.country = countries.id 
INNER JOIN types ON products.type = types.id
INNER JOIN statuses ON orders.`status` = statuses.id

WHERE `orders`.`id` = " . $_GET['id'];
$thisOrder = selectFrom($query, "ONE");
?>
<h1>Информация о заказе</h1>
<?php
$descOrder = ["Клиент", "Имя клиента", "Наименование", "Цена", "Страна производитель", "Тип", "Статус"];

$descOrderKey = 0;
foreach ($thisOrder as $key => $item) {
    switch ($key) {
        case "id":
            break;
        default:
?>
            <div class="flex g10 mauto toolInfo">
                <span class="ctrl-r"><?= $descOrder[$descOrderKey] ?>:</span>
                <span><?= $item ?></span>
            </div>
<?php
            $descOrderKey++;
            break;
    }
} 

if ($thisOrder['status'] == "Новый") {?>
<div class="btns mauto">
    <a href="../funcs/acceptOrder.php?id=<?= $thisOrder['id'] ?>" class="accent-to-black block brad10">Одобрить</a>
    <?php $_SESSION['mayDel'] = $thisOrder['id']; ?>
    <a href="../ajax-sources/reasonOfDel.html" class="ajax accent-to-black block brad10">Отказать</a>
    <a href="../admin.php" class="accent-to-black brad10">Отмена</a>
</div>
<?php }