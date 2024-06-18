<?php
require_once ("database/db.php");
//3 arrays in session: cart(id, qty); gift_wrap_status(id, status); message(id, message)

$cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];
$gift_wrap_status = isset($_SESSION["gift_wrap"]) ? $_SESSION["gift_wrap"] : [];
$message = isset($_SESSION["message"]) ? $_SESSION["message"] : [];


$id = $_POST["id"];
$qty = isset($_POST["inputQuantity"]) ? $_POST["inputQuantity"] : 1;
$gift_wrap = isset($_POST["giftWrap"]) ? 1 : 0;
$customMessage = isset($_POST['customMessage']) ? 1 : 0;
$messageContent = isset($_POST['messageContent']) ? $_POST['messageContent'] : "";

if (isset($cart[$id]) & $cart[$id] > 0) {
    $cart[$id] = $cart[$id] + $qty;
} else {
    $cart[$id] = $qty;
    $gift_wrap_status[$id] = $gift_wrap;
    $message[$id] = $messageContent;
}

$_SESSION["cart"] = $cart;
$_SESSION["gift_wrap"] = $gift_wrap_status;
$_SESSION["message"] = $message;
header('Location: ' . $_SERVER['HTTP_REFERER']);