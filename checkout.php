<?php
require_once ("database/db.php");
$cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];
$gift_wrap_status = isset($_SESSION["gift_wrap"]) ? $_SESSION["gift_wrap"] : [];
$message = isset($_SESSION["message"]) ? $_SESSION["message"] : [];
$cards = get_cart();
$total = [];
$grand_total = 0;
foreach ($cards as $item) {
    $customMessage = $message[$item["id"]] != "" ? 1 : 0;
    //price = unit price * qty + 5 * gift wrap? + 3 * custom message?
    $price = $item["price"] * $cart[$item["id"]] + 5 * $gift_wrap_status[$item["id"]] + 3 * $customMessage;
    $grand_total += $price;
    $total[$item["id"]] = $price;
}
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
        <section class="inner_page_head mb-6">
            <div class="container_fuild">
                <div class="row">
                    <div class="col-md-12">
                        <div class="full">
                            <h3>Checkout</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <main class="main">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 mb-4">
                        <form action="/place_order.php" method="post" class="card shadow-0 border">
                            <div class="p-4">
                                <h5 class="card-title mb-3">Your info</h5>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <p class="mb-0">First name</p>
                                        <div class="form-outline">
                                            <input type="text" id="firstName" name="firstName" placeholder="First name"
                                                class="form-control border">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <p class="mb-0">Last name</p>
                                        <div class="form-outline">
                                            <input type="text" id="lastName" name="lastName" placeholder="Last name"
                                                class="form-control border">
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <p class="mb-0">Phone</p>
                                        <div class="form-outline">
                                            <input type="tel" id="tel" value="+84 " name="tel"
                                                class="form-control border">
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <p class="mb-0">Email</p>
                                        <div class="form-outline">
                                            <input type="email" id="email" name="email" placeholder="example@gmail.com"
                                                class="form-control border">
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <h5 class="card-title mb-3">Shipping info</h5>

                                <div class="row mb-3">
                                    <div class="col-lg-4 mb-3">
                                        <!-- Default checked radio -->
                                        <div class="form-check h-100 border rounded-3">
                                            <div class="p-3">
                                                <input class="form-check-input" type="radio" name="shipping_method"
                                                    id="expressShipping" checked value="EXPRESS">
                                                <label class="form-check-label" for="expressShipping">
                                                    Express delivery <br>
                                                    <small class="text-muted">3-4 days via Fedex </small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <!-- Default radio -->
                                        <div class="form-check h-100 border rounded-3">
                                            <div class="p-3">
                                                <input class="form-check-input" type="radio" name="shipping_method"
                                                    id="postShipping" value="POST">
                                                <label class="form-check-label" for="postShipping">
                                                    Post office <br>
                                                    <small class="text-muted">20-30 days via post </small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <!-- Default radio -->
                                        <div class="form-check h-100 border rounded-3">
                                            <div class="p-3">
                                                <input class="form-check-input" type="radio" name="shipping_method"
                                                    id="selfPickUp" value="SELF">
                                                <label class="form-check-label" for="selfPickUp">
                                                    Self pick-up <br>
                                                    <small class="text-muted">Come to our shop </small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-8 mb-3">
                                        <p class="mb-0">Address</p>
                                        <div class="form-outline">
                                            <input type="text" id="address" name="address" placeholder="Address"
                                                class="form-control border">
                                        </div>
                                    </div>

                                    <div class="col-sm-4 mb-3">
                                        <p class="mb-0">City</p>
                                        <div class="form-outline">
                                            <input type="text" id="city" name="city" placeholder="Type here"
                                                class="form-control border">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-6 mb-3">
                                        <p class="mb-0">Postal code</p>
                                        <div class="form-outline">
                                            <input type="text" id="postalCode" name="postalCode"
                                                class="form-control border">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-6 mb-3">
                                        <p class="mb-0">Zipcode</p>
                                        <div class="form-outline">
                                            <input type="text" id="zipCode" name="zipCode" class="form-control border">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <p class="mb-0">Message to seller</p>
                                    <div class="form-outline">
                                        <textarea class="form-control border" id="messageToSeller"
                                            name="messageToSeller" rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="float-end">
                                    <button class="btn btn-light border">Cancel</button>
                                    <button class="btn btn-success shadow-0 border" type="submit">Place order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-4 col-lg-4 d-flex justify-content-center justify-content-lg-end">
                        <div class="ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
                            <h6 class="mb-3">Summary</h6>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2">$<?php echo $grand_total ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Discount:</p>
                                <p class="mb-2 text-danger">- $<?php echo $grand_total * 0.2 ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Shipping cost:</p>
                                <p id="shippingPrice">$20.00</p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total price:</p>
                                <p class="mb-2 fw-bold">$<?php echo $grand_total * 0.8 + 14 ?></p>
                            </div>

                            <hr>
                            <h6 class="text-dark my-4">Items in cart</h6>
                            <?php foreach ($cards as $item): ?>
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-3 position-relative">
                                    <span class="position-absolute top-0 end-0 translate-middle badge rounded-pill"
                                        style="background-color: #f7444e !important; color: white">
                                        <?php echo $cart[$item["id"]] ?>
                                    </span>
                                    <img src="<?php echo $item["thumbnail_url"] ?>"
                                        style="height: 96px !important; width: 96px !important;"
                                        class="img-sm rounded border">
                                </div>
                                <div class="">
                                    <a href="/card-detail.php?id=<?php echo $item["id"] ?>" class="nav-link">
                                        <?php echo $item["name"] ?>
                                    </a>
                                    <div class="price text-muted">Total: $<?php echo $total[$item["id"]] ?></div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script>
        $(document).ready(function() {
            $('input[name="shipping_method"]').change(function() {
                var method = $(this).val();
                switch (method) {
                    case "EXPRESS":
                        $('#shippingPrice').text('$20');
                    case "POST":
                        $('#shippingPrice').text('$10')
                    case "SELF":
                        $('#shippingPrice').text('$0');
                }
            });
        });
        </script>
    </body>

</html>