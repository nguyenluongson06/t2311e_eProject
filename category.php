<?php
require_once ("database/db.php");
$manufacturer_id = $_GET["id"];
$manufacturer_detail = get_category_detail($manufacturer_id);
$cards = get_card_in_category($manufacturer_id);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $manufacturer_detail["name"] ?></title>
        <?php include_once ("components/style.php"); ?>
    </head>

    <body>
        <header>
        </header>
        <?php include_once ("components/nav.php"); ?>
        <section class="inner_page_head">
            <div class="container_fuild">
                <div class="row">
                    <div class="col-md-12">
                        <div class="full">
                            <h3><?php echo $manufacturer_detail["name"] ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Card <span>list</span>
                    </h2>
                </div>
                <div class="row">
                    <?php foreach ($cards as $item): ?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="box">
                                <div class="option_container">
                                    <div class="options">
                                        <a href="/card-detail.php?id=<?php echo $item["id"]; ?>" class="option1">
                                            More Info
                                        </a>
                                        <a href="" class="option2">
                                            Buy Now
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
        <?php include_once ("components/footer.php"); ?>
    </body>

</html>