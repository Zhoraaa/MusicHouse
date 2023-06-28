<div id="first-content-on-page" class="product-info inner-shadow brad20 p20 flex g20 jc-sa wrap">
  <div id="poster">
    <img src="../img/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
  </div>
  <div class="flex column g20">
    <h1><?= $product['name'] ?></h1>
    <div id="summary-info" class="flex column g10">
      <div> <span>Страна-производитель: </span> <span class="ctrl-r"><?= $product['country'] ?></span> </div>
      <div> <span>Тип: </span> <span class="ctrl-r"><?= $product['type'] ?></span> </div>
      <div> <span>Дата релиза: </span> <span><?php echo date("d.m.Y", strtotime($product['create_date'])); ?></span> </div>
      <div> <span>Цена: </span> <span class="ctrl-r"><?= $product['cost'] ?></span> </div>
    </div>
    <div class="btns">
      <a href="/user/addToOrder.php?id=<?= $_GET['id'] ?>" class="radius accent-to-black">Добавить к заказу</a>
      <a href="../catalogue.php" class="pad10 radius accent-to-black">Назад</a>
    </div>
  </div>
</div>