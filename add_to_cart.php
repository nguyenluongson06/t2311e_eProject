<?php
require_once ("database/db.php");
$cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];
$id = $_POST["id"];
$qty = isset($_POST["inputQuantity"]) ? $_POST["inputQuantity"] : 1;

if (isset($cart[$id])) {
    $cart[$id] = $cart[$id] + $qty;
} else {
    $cart[$id] = $qty;
}

$_SESSION["cart"] = $cart;
header("Location: /cart.php");