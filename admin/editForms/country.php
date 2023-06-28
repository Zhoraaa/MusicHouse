<?php
require_once("./funcs/DBinteraction.php");
$query = "SELECT * FROM `countries` WHERE id = " . $_GET['id'];
$category = selectFrom($query, "ONE");
?>
<h2>
    Информация о стране-производителе:
</h2>
<div>
    <div class="toolInfo">
        <span class="ctrl-r">Название:</span>
        <span><?= $category['name'] ?></span>
    </div>
</div>
<div class="btns">
    <a href="../admin/delData.php?id=<?= $_GET['id'] ?>" class="accent-to-black">Удалить</a>
    <a href="../admin.php?tool=categories" class="accent-to-black">Отмена</a>
</div>