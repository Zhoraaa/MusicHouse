<?php
if (isset($_SESSION['result'])) {
?>
  <div id="alert">
    <span>
      <?= $_SESSION['result'] ?>
    </span>
    <span id="deleteParent">×</span>
  </div>
  <script src="./scripts/deleteParent.js"></script>
<?php
}
