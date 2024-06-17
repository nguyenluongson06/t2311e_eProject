<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failure</title>
    <?php include_once ("components/style.php"); ?>
</head>
<body>
    <header>
    </header>
    <?php include_once("components/nav.php"); ?>
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Payment Failed!</h4>
            <p>Your order could not be processed. Please try again later or contact us for support.</p>
            <hr>
            <p class="mb-0">You can <a href="index.php" class="alert-link">return to the homepage</a> or try to make the payment again.</p>
        </div>
    </div>
    <?php include_once("components/footer.php");?>
</body>
</html>
