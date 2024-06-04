<?php
require_once ("database/db.php");
$cards = get_cards();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Card Shop</title>
        <?php include_once ("components/style.php"); ?>
    </head>

    <body>
        <header>
        </header>
        <?php include_once ("components/nav.php"); ?>
        <main class="main">
            <div class="container">
                <h2>All cards</h2>
                <div class="row">
                    <?php foreach ($cards as $item): ?>
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <a href="/card-detail.php?id=<?php echo $item["id"]; ?>">
                                    <img src="<?php echo $item["thumbnail_url"] ?>" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $item["name"] ?></h5>
                                    <p class="card-text"><?php echo $item["short_desc"] ?></p>
                                    <p class="text-danger"><?php echo $item["price"] ?></p>
                                    <a href="/card-detail.php?id=<?php echo $item["id"]; ?>" class="btn btn-primary">More
                                        info</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </body>

</html>