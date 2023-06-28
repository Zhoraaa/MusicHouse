<?php
require("./funcs/pageBase.php");
require("./funcs/user.php");
require("./funcs/session.php");
require("./funcs/alert.php");
require("./funcs/DBinteraction.php");

$query = "SELECT * FROM `products` LIMIT 5";
$slides = selectFrom($query, "ALL");
?>

<div class="slider">
    <div class="slider-line">
        <?php
        foreach ($slides as $slide) {
        ?>
            <a href="product.php?id=<?= $slide['id'] ?>"><img src="./img/products/<?= $slide['image'] ?>" alt="<?= $slide['name'] ?>"></a>
        <?php } ?>
    </div>
</div>
<button class="slider-prev">Prev</button>
<button class="slider-next">Next</button>
<script src="./js/slider.js"></script>