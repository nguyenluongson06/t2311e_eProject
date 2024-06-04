<?php
require_once ("database/db.php");
$card_id = $_GET["id"];
$card = get_card_detail($card_id);
if ($card == null)
    die("404 not found!");
$manufacturer_id = $card["manufacturer_id"];
$manufacturer_id = $card["category_id"];
$manufacturer = get_manufacturer_detail($manufacturer_id);
$category = get_category_detail($manufacturer_id);
$related_cards = get_related_cards($card_id);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $card["name"]; ?></title>
        <?php include_once ("components/style.php"); ?>
    </head>

    <body>
        <header>
        </header>
        <?php include_once ("components/nav.php"); ?>
        <main class="main">
            <div class="container">
                <img src="<?php echo $card["thumbnail_url"]; ?>" style="width: 20rem;" />
                <h2>Name: <?php echo $card["name"]; ?></h2>
                <h3>Manufacturer: <?php echo $manufacturer["name"] ?></h3>
                <h3>Category: <?php echo $category["name"] ?></h3>
                <h3>Description: <?php echo $card["description"] ?></h3>
                <h3>Price: <?php echo $card["price"] ?>$</h3>
            </div>
            <div class="container">
                <h2>Related cards</h2>
                <div class="row">
                    <?php foreach ($related_cards as $item): ?>
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <a href="/card-detail.php?id=<?php echo $item["id"]; ?>">
                                    <img src="<?php echo $item["thumbnail_url"] ?>" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $item["name"] ?></h5>
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