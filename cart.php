<?php
require_once ("database/db.php");
$cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];
$cards = get_cart();
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
        <!-- header + slider -->

        <?php include_once ("components/nav.php"); ?>

        <!-- end header + slider -->
        <!-- inner page head -->
        <section class="inner_page_head">
            <div class="container_fuild">
                <div class="row">
                    <div class="col-md-12">
                        <div class="full">
                            <h3>Your cart</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end inner page head -->
        <!-- main content -->
        <section class="h-100">
            <div class="container py-5">
                <div class="row d-flex justify-content-center my-4">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0">Cart - <?php echo count($cart) ?> items</h5>
                            </div>
                            <div class="card-body">
                                <?php foreach ($cards as $item): ?>
                                <!-- Single item -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                            data-mdb-ripple-color="light">
                                            <img src="<?php echo $item["thumbnail_url"] ?>" class="w-100"
                                                alt="<?php echo $item["name"] ?>" />
                                            <a href="#!">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)">
                                                </div>
                                            </a>
                                        </div>
                                        <!-- Image -->
                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong><?php echo $item["name"] ?></strong></p>
                                        <p>Manufacturer:
                                            <?php echo get_manufacturer_detail($item["manufacturer_id"])["name"] ?>
                                        </p>
                                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-danger btn-sm me-1 mb-2" data-mdb-tooltip-init
                                            title="Remove item">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <!-- Data -->
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                        <!-- Quantity -->
                                        <div class="d-flex mb-4" style="max-width: 300px">
                                            <button data-mdb-button-init="" data-mdb-ripple-init=""
                                                class="btn btn-primary px-3 me-2 active"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                data-mdb-button-initialized="true" style="" aria-pressed="true">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <div data-mdb-input-init="" class="form-outline"
                                                data-mdb-input-initialized="true">
                                                <input id="form1" min="0" name="quantity"
                                                    value="<?php echo $cart[$item["id"]] ?>" type="number"
                                                    class="form-control active">
                                                <label class="form-label" for="form1"
                                                    style="margin-left: 0px;">Quantity</label>
                                                <div class="form-notch">
                                                    <div class="form-notch-leading" style="width: 9px;"></div>
                                                    <div class="form-notch-middle" style="width: 52px;"></div>
                                                    <div class="form-notch-trailing"></div>
                                                </div>
                                            </div>

                                            <button data-mdb-button-init="" data-mdb-ripple-init=""
                                                class="btn btn-primary px-3 ms-2 active"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                data-mdb-button-initialized="true" style="" aria-pressed="true">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <!-- Quantity -->

                                        <!-- Price -->
                                        <p class="text-start text-md-center">
                                            <strong>$<?php echo $item["price"] ?></strong>
                                        </p>
                                        <!-- Price -->
                                    </div>
                                </div>
                                <!-- Single item -->

                                <hr class="my-4" />
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body">
                                <p><strong>We accept</strong></p>
                                <img class="me-2" width="45px"
                                    src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                                    alt="Visa" />
                                <img class="me-2" width="45px"
                                    src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                                    alt="American Express" />
                                <img class="me-2" width="45px"
                                    src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                                    alt="Mastercard" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary btn-lg btn-block">
                                    Go to checkout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end main content -->
        <!-- footer -->
        <?php include_once ("components/footer.php"); ?>
        <!-- end footer -->
    </body>

</html>