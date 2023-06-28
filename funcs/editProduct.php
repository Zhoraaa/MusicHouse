<?php
$_SESSION['mayDel'] = $_GET['id'];
?>
<form action="admin/editProductDB.php" method="post" enctype="multipart/form-data" id="productInfo" class="inner-shadow radius">
  <div id="left-info">
    <div id="poster">
      <img src="../img/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
    </div>
    <input type="file" name="image" id="">
    <input type="text" class="hide" name="id" value="<?= $_GET['id'] ?>" />
    <div id="summary-info">
      <textarea id="titleProduct" class="inner-shadow radius pad10" name="name"><?= $product['name'] ?></textarea>
      <div><input type="date" class="inner-shadow radius pad10" name="releaseDate" value="<?= $product['release_date'] ?>"></div>
      <div>
        <span>Издатель: </span>
        <select name="publisher" id="" class="ctrl-r">
          <?php
          $query = "SELECT * FROM `publishers`";
          $res = $con->query($query);
          $publishers = $res->fetch_all(MYSQLI_ASSOC);
          foreach ($publishers as $publisher) {
            $selected = ($publisher['name'] == $product['publisher']) ? "selected" : null;
          ?>
            <option value="<?= $publisher['id'] ?>" <?= $selected ?>><?= $publisher['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div>
        <span>Разработчик: </span>
        <select name="developer" id="" class="ctrl-r">
          <?php
          $query = "SELECT * FROM `developers`";
          $res = $con->query($query);
          $devs = $res->fetch_all(MYSQLI_ASSOC);
          foreach ($devs as $dev) {
            $selected = ($dev['name'] == $product['developer']) ? "selected" : null;
          ?>
            <option value="<?= $dev['id'] ?>" <?= $selected ?>><?= $dev['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="flex space-between">
        <span>Активация: </span>
        <select name="shop" id="" class="ctrl-r">
          <?php
          $query = "SELECT * FROM `activate_in`";
          $res = $con->query($query);
          $shops = $res->fetch_all(MYSQLI_ASSOC);
          foreach ($shops as $shop) {
            $selected = ($shop['name'] == $product['shop']) ? "selected" : null;
          ?>
            <option value="<?= $shop['id'] ?>" <?= $selected ?>><?= $shop['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div>
        <span>Цена: </span>
        <div>
          <input type="number" placeholder="0000" class="inner-shadow radius ctrl-r pad10 mini-input" min="0" class="cost" name="cost" value="<?= $product['cost'] ?>" />
          <span> ₽</span>
        </div>
      </div>
      <div>
        <span>Цена со скидкой: </span>
        <div>
          <input type="number" placeholder="0000" class="inner-shadow radius ctrl-r pad10 mini-input" min="0" class="cost" name="saleCost" value="<?= $product['sale_cost'] ?>" />
          <span> ₽</span>
        </div>
      </div>
    </div>
    <div class="btns wrap">
      <button class="radius  ">Сохранить</button>
      <a id="delProduct" class="radius  ">Удалить</a>
      <a href="../product.php?id=<?= $id ?>" class="radius  ">Отмена</a>
    </div>
  </div>
  <div id="right-info">
    <textarea class="inner-shadow radius pad20 marg ptInfo" id="desc" placeholder="Описание игры" name="description"><?= $product['description'] ?></textarea>
    <div class="inner-shadow radius pad20 marg ptInfo" id="sys">
      <p>Минимальные системные требования:</p>
      <div>
        <span>OС: </span>
        <select name="OS" id="" class="ctrl-r">
          <?php
          $query = "SELECT * FROM `os`";
          $res = $con->query($query);
          $OSs = $res->fetch_all(MYSQLI_ASSOC);
          foreach ($OSs as $OS) {
            $selected = ($OS['name'] == $product['os']) ? "selected" : null;
          ?>
            <option value="<?= $OS['id'] ?>" <?= $selected ?>><?= $OS['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div>
        <span>CPU: </span>
        <select name="CPU" id="" class="ctrl-r">
          <?php
          $query = "SELECT * FROM `processor_models`";
          $res = $con->query($query);
          $CPUs = $res->fetch_all(MYSQLI_ASSOC);
          foreach ($CPUs as $CPU) {
            $selected = ($CPU['name'] == $product['processor']) ? "selected" : null;
          ?>
            <option value="<?= $CPU['id'] ?>" <?= $selected ?>><?= $CPU['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div>
        <span>GPU: </span>
        <select name="GPU" id="" class="ctrl-r">
          <?php
          $query = "SELECT * FROM `videomemory_vars`";
          $res = $con->query($query);
          $GPUs = $res->fetch_all(MYSQLI_ASSOC);
          foreach ($GPUs as $GPU) {
            $selected = ($GPU['name'] == $product['videocard']) ? "selected" : null;
          ?>
            <option value="<?= $GPU['id'] ?>" <?= $selected ?>><?= $GPU['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div>
        <span>ОЗУ: </span>
        <select name="RAM" id="" class="ctrl-r">
          <?php
          $query = "SELECT * FROM `ram`";
          $res = $con->query($query);
          $RAMs = $res->fetch_all(MYSQLI_ASSOC);
          foreach ($RAMs as $RAM) {
            $selected = ($RAM['name'] == $product['ram']) ? "selected" : null;
          ?>
            <option value="<?= $RAM['id'] ?>" <?= $selected ?>><?= $RAM['name'] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div>
        <span>Место на диске: </span>
        <div>
          <div>
            <input type="number" name="memory" placeholder="00.0" class="inner-shadow ctrl-r radius pad10 mini-input" min="0" step="any" value="<?= $product['memory'] ?>" />
            <span>ГБ</span>
            <label for="SSD">
              <?php
              $checked = ($product['ssd']) ? "checked" : null;
              ?>
              <input type="checkbox" name="SSD" id="SSD" <?= $checked ?>>
              <span>Рекомендован SSD.</span>
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="inner-shadow radius pad20 marg ptInfo" id="reviews">
      <p class="half-text">
        <?php
        include "./functions/connect.php";
        include "./functions/getReviews.php";
        ?>
      </p>
    </div>
  </div>
</form>
<script src="../scripts/ajax.js?v=1.1"></script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    let formSS = false;
    document.querySelector("#delProduct").addEventListener("click", (event) => {
      formSS = !formSS;
      if (formSS) {
        asyncLoad("sources/delSure.html", "ajaxPlace");

        document.addEventListener("DOMContentLoaded", () => {
          function checkYNBlock() {
            const YNBlock = document.querySelector("#YN");
            if (YNBlock) {
              // Блок найден, выполняем нужные действия
              clearInterval(checkYNInterval);
              // Остановить проверку
              // Ваш код здесь...
              const ynDiv = document.querySelector("#YN");

              // создание элементов кнопок
              const yesButton = document.createElement("a");
              yesButton.className = "  radius";
              yesButton.textContent = "Да";

              const noButton = document.createElement("button");
              noButton.className = "  radius";
              noButton.textContent = "Нет";
              noButton.onclick = function() {
                asyncClear("ajaxPlace");
              };

              // добавление кнопок в div
              ynDiv.appendChild(yesButton);
              ynDiv.appendChild(noButton);
            }
          }

          let checkYNInterval = setInterval(checkYNBlock, 100);
        });
      } else {
        asyncClear("ajaxPlace");
      }
    });
  });
</script>