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
        <script>
        $(document).ready(function() {
            $('#customMessageCheckbox').change(function() {
                if ($(this).is(':checked')) {
                    $('#customMessageText').show();
                } else {
                    $('#customMessageText').hide();
                }
            });
        });
        </script>
        <style>
        #customMessageText {
            display: none;
        }
        </style>
    </head>

    <body>
        <header>
        </header>
        <?php include_once ("components/nav.php"); ?>
        <section class="inner_page_head" style="margin-top:16px; margin-bottom:16px">
            <div class="container_fuild">
                <div class="row">
                    <div class="col-md-12">
                        <div class="full">
                            <h3>Card details</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- card info -->
        <main class="main">
            <div class="container">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                            src="<?php echo $card["thumbnail_url"] ?>" alt="..."></div>
                    <div class="col-md-6">
                        <div class="small mb-1">Product ID: <?php echo $card_id ?></div>
                        <h1 class="display-5 fw-bolder"><?php echo $card["name"] ?></h1>
                        <div class="fs-5 mb-5">
                            <span style="font-size:1.25rem">$<?php echo $card["price"] ?></span>
                        </div>
                        <p class="lead"><?php echo $card["description"] ?></p>
                        <form action="/add_to_cart.php" method="post" class="d-flex flex-column">
                            <input type="hidden" name="id" value="<?php echo $card["id"] ?>" />
                            <div class="d-flex flex-column">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="giftWrapCheckbox"
                                        name="giftWrap" value="1">
                                    <label class="form-check-label" for="giftWrapCheckbox">Gift Wrap (extra $5)</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="customMessageCheckbox"
                                        name="customMessage" value="1">
                                    <label class="form-check-label" for="customMessageCheckbox">Custom Message (extra
                                        $3)</label>
                                </div>
                                <div class="form-group" id="customMessageText">
                                    <label for="messageContent">Message Content:</label>
                                    <textarea class="form-control" id="messageContent" name="messageContent"
                                        rows="3"></textarea>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <label for="inputQuantity" class="text-center m-1" style="font-size:1.25rem">Quantity:
                                </label>
                                <input class="form-control text-center m-3" id="inputQuantity" name="inputQuantity"
                                    type="num" value="1" style="max-width: 3rem">
                                <button class="btn btn-success flex-shrink-0 text-center p-3 fs-6" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <!-- end card info -->
        <!-- related cards -->
        <section class="py-5 bg-light product_section">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php foreach ($related_cards as $item): ?>
                    <div class="col-sm-6 col-md-4 col-lg-4" style="min-height: 98%;">
                        <div class="box" style="min-height: 98%;">
                            <div class="option_container">
                                <div class="options">
                                    <a href="/card-detail.php?id=<?php echo $item["id"]; ?>" class="option1">
                                        More info
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
        <!-- end related cards -->
        <?php include_once ("components/footer.php"); ?>
    </body>

</html>