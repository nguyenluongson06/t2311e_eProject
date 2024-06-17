<?php
require_once ("database/db.php");
require_once ("database/paypal.php");
$cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];
$gift_wrap_status = isset($_SESSION["gift_wrap"]) ? $_SESSION["gift_wrap"] : [];
$message = isset($_SESSION["message"]) ? $_SESSION["message"] : [];
$cards = get_cart();
$total = [];
$grand_total = 0;
foreach ($cards as $item) {
    $customMessage = $message[$item["id"]] != "" ? 1 : 0;
    //price = unit price * qty + 5 * gift wrap? + 3 * custom message?
    $price = $item["price"] * $cart[$item["id"]] + 5 * $gift_wrap_status[$item["id"]] + 3 * $customMessage;
    $grand_total += $price;
    $total[$item["id"]] = $price;
}
$first_name = isset($_POST["firstName"]) ? $_POST["firstName"] : "";
$last_name = isset($_POST["lastName"]) ? $_POST["lastName"] : "";
$customer_name = $first_name . "" . $last_name;
$tel = $_POST["tel"];
$address = $_POST["address"];
$city = $_POST["city"];
$postal_code = $_POST["postalCode"];
$zip_code = $_POST["zipCode"];
$message_to_seller = $_POST["messageToSeller"];
$email = $_POST["email"];
$shipping_method = $_POST["shipping_method"];

$cart = $_SESSION["cart"];
if (count($cart) == 0) {
    header("Location: cart.php");
}

switch ($shipping_method) {
    case "EXPRESS":
        $grand_total += 20;
        break;
    case "POST":
        $grand_total += 10;
        break;
    case "SELF":
        break;
}

$status = "PENDING";
$order_info = [
    "customer_name" => $customer_name,
    "tel" => $tel,
    "address" => $address,
    "grand_total" => $grand_total,
    "status" => $status,
    "shipping_method" => $shipping_method,
];
// clear cart
$_SESSION["cart"] = [];
// paypal
$client_id = "AfJIGrcsyLs4x0VKDCRb9vlOPuPdMtGM-vJAXOgvZ-AqEjVm1z7f1tvTCzieDZo7BXXQQILvv-qWW2OC";
$client_secret = "EE-IG6rW03oVcJXV-apHwMYzur4GRLNph4oCuqpWvKj2HGTw1IPkEETCDy2LB8HCnT6lXkV_JKfUAdwF";


$success_url = "http://localhost:3000/order_success.php";
$cancel_url = "http://localhost:3000/order_fail.php";

$access_token = get_access_token($client_id, $client_secret);

$payment = create_payment($access_token, $success_url, $cancel_url, $grand_total);

header('Location: ' . $payment['links'][1]['href']);