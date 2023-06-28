<?php
function generateListItem($listItem, $listType)
{
?>
    <div class="accent-to-black brad10 flex jc-sb ai-c">
        <span>
            <?= $listItem['name'] ?>
            <?php if ($listType == "order") { ?>
                - <?= $listItem['client'] ?>
            <?php } ?>
        </span>
        <div class="flex g10">
            <?php
            switch ($listType) {
                case "order":
                    $href = "?edit=order&id=" . $listItem['id'];
                    break;
                case "product":
                    $href = "?tool=products&edit=product&id=" . $listItem['id'];
                    break;
                case "country":
                    $href = "?tool=categories&edit=country&id=" . $listItem['id'];
                    break;
                case "type":
                    $href = "?tool=categories&edit=type&id=" . $listItem['id'];
                    break;
            }
            ?>
            <a href="<?= $href ?>" class="accent-to-white">👁‍🗨</a>
        </div>
    </div>
<?php
}
