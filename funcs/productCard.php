<?php
function showCard($product)
{
?>
  <a href="../product.php?id=<?= $product['id'] ?>" class="product-card inner-shadow" title="<?= $product['name'] ?>">
    <div class="mini-poster">
      <img src="../img/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
    </div>
    <div class="pcard-info inner-shadow white-text">
      <h3><?= $product['name'] ?></h3>
      <br>
      <span><?= $product['cost'] ?> ₽</span>
    </div>
  </a>
<? }
