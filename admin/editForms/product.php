<?php
require_once("./funcs/DBinteraction.php");

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

$query = "SELECT * FROM `countries`";
$countries = selectFrom($query, "ALL");

$query = "SELECT * FROM `types`";
$types = selectFrom($query, "ALL");
?>
<form action="../funcs/editProductDB.php" method="post" enctype="multipart/form-data" class="flex column g10 ai-c">
    <h2>
        Редактировать товар товар:
    </h2>
    <div>
        <div class="toolInfo flex column g10 ai-c">
            <input type="text" name="id" class="hide" value="<?= $product['id'] ?>">
            <span class="ctrl-e">Название:</span>
            <div><input type="text" name="name" placeholder="Введите название" class="inner-shadow brad10 p10" value="<?= $product['name'] ?>"></div>
            <span class="ctrl-e">Цена:</span>
            <div><input type="number" name="cost" placeholder="Введите цену" class="inner-shadow brad10 p10" min="1" value="<?= $product['cost'] ?>"></div>
            <span class="ctrl-e">Дата производства:</span>
            <div><input type="date" name="createDate" class="inner-shadow brad10 p10" min="1" value="<?= $product['create_date'] ?>"></div>
            <span>Изображение:</span>
            <div><input type="file" name="image" id="image" class="inner-shadow brad10 p10"></div>
            <span class="ctrl-e">Страна-производитель:</span>
            <select name="country" id="country" class="inner-shadow brad10 p10">
                <?php 
                foreach ($countries as $country) {
                    $selected = ($country['name'] == $product['country']) ? "selected" : null;
                    ?>
                    <option value="<?= $country['id'] ?>" <?= $selected ?>><?= $country['name'] ?></option>
                    <?php
                }
                ?>
            </select>
            <span class="ctrl-e">Тип:</span>
            <select name="type" id="type" class="inner-shadow brad10 p10">
                <?php 
                foreach ($types as $type) {
                    $selected = ($type['name'] == $product['type']) ? "selected" : null;
                    ?>
                    <option value="<?= $type['id'] ?>" <?= $selected ?>><?= $type['name'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="btns">
        <button class="accent-to-black">Сохранить</button>
        <a href="../admin.php?tool=products" class="accent-to-black">Отмена</a>
    </div>
</form>