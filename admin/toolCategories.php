<?php
require_once("security.php");
require_once("./funcs/listGenerator.php");
require_once("./funcs/DBinteraction.php");

$query = "SELECT * FROM `countries`";
$countries = selectFrom($query, "ALL");

$query = "SELECT * FROM `types`";
$types = selectFrom($query, "ALL");
?>
<div class="flex wrap g20 mauto">
    <div class="list flex column g10">
        <h2>Страны-производители:</h2>
        <a href="?tool=categories&edit=country" class="accent-to-black ctrl-e brad10">+ Добавить</a>
        <?php
        foreach ($countries as $country) {
            generateListItem($country, "country");
        }
        ?>
    </div>
    <div class="list flex column g10">
        <h2>Типы товаров:</h2>
        <a href="?tool=categories&edit=type" class="accent-to-black ctrl-e brad10">+ Добавить</a>
        <?php
        foreach ($types as $type) {
            generateListItem($type, "type");
        }
        ?>
    </div>
</div>