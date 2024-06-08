<?php
require_once ("database/db.php");
$cards = get_cards();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Card Treasure</title>
        <?php include_once ("components/style.php"); ?>
    </head>

    <body>
        <div class="hero_area">
            <?php include_once ("components/nav.php"); ?>
            <?php include_once ("components/slider.php"); ?>
        </div>

        <main class="main">
            <div class="container">
                <section class="product_section layout_padding">
                    <div class="container">
                        <div class="heading_container heading_center">
                            <h2>
                                All <span>cards</span>
                            </h2>
                        </div>
                        <div class="row">
                            <?php foreach ($cards as $item): ?>
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="box">
                                    <div class="option_container">
                                        <div class="options">
                                            <a href="/card-detail.php?id=<?php echo $item["id"]; ?>" class="option1">
                                                More info
                                            </a>
                                            <a href="" class="option2">
                                                Add to cart
                                            </a>
                                        </div>
                                    </div>
                                    <div class="img-box">
                                        <img src="<?php echo $item["thumbnail_url"] ?>" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            <?php echo $item["name"] ?>
                                        </h5>
                                        <h6>
                                            $<?php echo $item["price"] ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <?php include_once ("components/footer.php"); ?>
    </body>

</html>