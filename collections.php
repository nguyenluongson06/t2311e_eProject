<?php
require_once ("database/db.php");
$cards = get_cards();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checkout</title>
        <?php include_once ("components/style.php"); ?>
    </head>

    <body>
        <?php include_once ("components/nav.php"); ?>
        <main class="main">
            <div class="container">
                <h1>Collections</h1>
            </div>
        </main>
    </body>

</html>