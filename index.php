<?php
require("./funcs/pageBase.php");
require("./funcs/user.php");
require("./funcs/session.php");
require("./funcs/alert.php");
require("./funcs/DBinteraction.php");

$query = "SELECT * FROM `products` LIMIT 5";
$slides = selectFrom($query, "ALL");

