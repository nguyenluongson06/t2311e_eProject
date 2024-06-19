<?php
require_once ("database/db.php");
$last_order_info = isset($_SESSION["last_order_info"]) ? $_SESSION["last_order_info"] : [];
$last_cart = isset($_SESSION["last_order_info"]["cart"]) ? $_SESSION["last_order_info"]["cart"] : [];
$last_gift_wrap = isset($_SESSION["last_order_info"]["gift_wrap"]) ? $_SESSION["last_order_info"]["gift_wrap"] : [];
$last_message = isset($_SESSION["last_order_info"]["message"]) ? $_SESSION["last_order_info"]["message"] : [];
$last_total = isset($_SESSION["last_order_info"]["total"]) ? $_SESSION["last_order_info"]["total"] : [];
$last_cards = get_last_cart_info();
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
                <p class="mb-0">You can review your order below or <a href="index.php" class="alert-link">return to the
                        homepage</a>.</p>
            </div>
        </div>
        <main class="main">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 mb-4">
                        <div class="card shadow-0 border">
                            <div class="p-4">
                                <h5 class="card-title mb-3">Your info</h5>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <p class="mb-0">First name</p>
                                        <div class="form-outline">
                                            <input type="text" readonly class="form-control border"
                                                value="<?php echo $last_order_info["first_name"] ?>">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <p class="mb-0">Last name</p>
                                        <div class="form-outline">
                                            <input type="text" readonly class="form-control border"
                                                value="<?php echo $last_order_info["last_name"] ?>">
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <p class="mb-0">Phone</p>
                                        <div class="form-outline">
                                            <input type="tel" id="tel" value="<?php echo $last_order_info["tel"] ?>"
                                                name="tel" readonly class="form-control border">
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <p class="mb-0">Email</p>
                                        <div class="form-outline">
                                            <input type="email" id="email" name="email"
                                                value="<?php echo $last_order_info["email"] ?>" readonly
                                                class="form-control border">
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <h5 class="card-title mb-3">Shipping info</h5>

                                <div class="row mb-3">
                                    <div class="col-6 mb-3">
                                        <p class="mb-0">Shipping method: </p>
                                        <div class="form-outline">
                                            <input type="text" class="form-control border" readonly
                                                value="<?php echo $last_order_info["shipping_method"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-8 mb-3">
                                        <p class="mb-0">Address</p>
                                        <div class="form-outline">
                                            <input type="text" id="address" name="address" class="form-control border"
                                                readonly value="<?php echo $last_order_info["address"] ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-4 mb-3">
                                        <p class="mb-0">City</p>
                                        <div class="form-outline">
                                            <input type="text" id="city" name="city" readonly
                                                value="<?php echo $last_order_info["city"] ?>"
                                                class="form-control border">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-6 mb-3">
                                        <p class="mb-0">Postal code</p>
                                        <div class="form-outline">
                                            <input type="text" id="postalCode" name="postalCode" readonly
                                                value="<?php echo $last_order_info["postal_code"] ?>"
                                                class="form-control border">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-6 mb-3">
                                        <p class="mb-0">Zipcode</p>
                                        <div class="form-outline">
                                            <input type="text" id="zipCode" name="zipCode" class="form-control border"
                                                readonly value="<?php echo $last_order_info["zip_code"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <p class="mb-0">Message to seller</p>
                                    <div class="form-outline">
                                        <textarea class="form-control border" id="messageToSeller"
                                            name="messageToSeller"
                                            rows="2"><?php echo $last_order_info["message_to_seller"] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 d-flex justify-content-center justify-content-lg-end">
                        <div class="ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
                            <h6 class="mb-3">Summary</h6>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2">$<?php echo $last_order_info["grand_total"] ?></p>
                            </div>

                            <hr>
                            <h6 class="text-dark my-4">Items in cart</h6>
                            <?php foreach ($last_cards as $item): ?>
                                <div class="d-flex align-items-center mb-4">
                                    <div class="me-3 position-relative">
                                        <span class="position-absolute top-0 end-0 translate-middle badge rounded-pill"
                                            style="background-color: #f7444e !important; color: white">
                                            <?php echo $last_cart[$item["id"]] ?>
                                        </span>
                                        <img src="<?php echo $item["thumbnail_url"] ?>"
                                            style="height: 96px !important; width: 96px !important;"
                                            class="img-sm rounded border">
                                    </div>
                                    <div class="">
                                        <a href="/card-detail.php?id=<?php echo $item["id"] ?>" class="nav-link">
                                            <?php echo $item["name"] ?>
                                        </a>
                                        <div class="price text-muted">Total: $<?php echo $last_total[$item["id"]] ?></div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include_once ("components/footer.php") ?>
    </body>

</html>