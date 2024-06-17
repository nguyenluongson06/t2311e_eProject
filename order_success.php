<?php
require_once ("database/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <?php include_once ("components/style.php"); ?>
</head>
<body>
    <header>
    </header>
    <?php include_once ("components/nav.php"); ?>
    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Payment Successful!</h4>
            <p>Thank you for your purchase. Your order has been successfully processed.</p>
            <hr>
            <p class="mb-0">You can <a href="index.php" class="alert-link">return to the homepage</a>.</p>
        </div>
    </div>
    <?php include_once("components/footer.php")?>
</body>
</html>
