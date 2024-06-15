<?php
require_once ("database/db.php");
$categories = get_categories();
$manufacturers = get_manufacturers();
$current_category = isset($_GET["category"]) ? $_GET["category"] : 0;
$current_manufacturer = isset($_GET["manufacturer"]) ? $_GET["manufacturer"] : 0;

//change card list according to category or manufacturer filter
if ($current_category != 0) {
    $cards = get_card_in_category($current_category);
} elseif ($current_manufacturer != 0) {
    $cards = get_card_in_manufacturer($current_manufacturer);
} else {
    $cards = get_cards();
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Collection</title>
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
                            <h3>Collection</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product_section layout_padding">
            <div class="container">
                <div class="row">
                    <!-- sidebar -->
                    <div class="col-lg-3">
                        <!-- Toggle button -->
                        <button class="btn btn-outline-secondary mb-3 w-100 d-lg-none" type="button"
                            data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span>Show filter</span>
                        </button>
                        <!-- Collapsible wrapper -->
                        <div class="collapse card d-lg-block mb-5" id="navbarSupportedContent">
                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button text-black bg-light" type="button"
                                            data-mdb-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                            aria-controls="panelsStayOpen-collapseOne">
                                            Category
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne">
                                        <div class="accordion-body">
                                            <ul class="list-unstyled">
                                                <?php foreach ($categories as $item): ?>
                                                    <li class="d-flex flex-row align-items-center nav-item <?php if ($item["id"] == $current_category): ?>active<?php endif ?>"
                                                        href="/collection.php?category=<?php echo $item["id"] ?>">
                                                        <a href="/collection.php?category=<?php echo $item["id"] ?>"
                                                            class="text-black me-auto nav-filter <?php if ($item["id"] == $current_category): ?>active<?php endif ?>"><?php echo $item["name"] ?></a>
                                                        <span
                                                            class="badge badge-danger float-end"><?php echo get_count_category($item["id"])["count"] ?></span>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button text-black bg-light" type="button"
                                            data-mdb-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
                                            aria-controls="panelsStayOpen-collapseTwo">
                                            Manufacturer
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                                        aria-labelledby="headingTwo">
                                        <div class="accordion-body">
                                            <ul class="list-unstyled">
                                                <?php foreach ($manufacturers as $item): ?>
                                                    <li class="d-flex flex-row align-items-center <?php if ($item["id"] == $current_manufacturer): ?>active<?php endif ?>"
                                                        href="/collection.php?manufacturer=<?php echo $item["id"] ?>">
                                                        <a href="/collection.php?manufacturer=<?php echo $item["id"] ?>"
                                                            class="text-black me-auto nav-filter <?php if ($item["id"] == $current_manufacturer): ?>active<?php endif ?>"><?php echo $item["name"] ?></a>
                                                        <span
                                                            class="badge badge-danger float-end"><?php echo get_count_manufacturer($item["id"])["count"] ?></span>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar -->
                    <!-- content -->
                    <div class="col-lg-9">
                        <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                            <strong class="d-block py-2"><?php echo count($cards) ?> items found</strong>
                        </header>

                        <?php foreach ($cards as $item): ?>
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-12">
                                    <div class="card shadow-0 border rounded-3">
                                        <div class="card-body">
                                            <div class="row g-0">
                                                <div class="col-xl-3 col-md-4 d-flex justify-content-center">
                                                    <div
                                                        class="bg-image hover-zoom ripple rounded ripple-surface me-md-3 mb-3 mb-md-0">
                                                        <img src="<?php echo $item["thumbnail_url"] ?>" class="w-100">
                                                        <a href="/card-detail.php?id=<?php echo $item["id"] ?>">
                                                            <div class="hover-overlay">
                                                                <div class="mask"
                                                                    style="background-color: rgba(253, 253, 253, 0.15);">
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-5 col-sm-7">
                                                    <h5><?php echo $item["name"] ?></h5>
                                                    <div class="d-flex flex-row">
                                                        <div class="text-warning mb-1 me-2">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <span class="ms-1">
                                                                4.5
                                                            </span>
                                                        </div>
                                                        <span class="text-muted">154 orders</span>
                                                    </div>

                                                    <p class="text mb-4 mb-md-0">
                                                        <?php echo $item["short_desc"] ?>
                                                    </p>
                                                </div>
                                                <div class="col-xl-3 col-md-3 col-sm-5">
                                                    <div
                                                        class="d-flex flex-row align-items-center justify-content-center mb-1">
                                                        <h4 class="mb-1 me-1">$<?php echo $item["price"] ?></h4>
                                                        <span
                                                            class="text-danger"><s>$<?php echo $item["price"] * 1.2 ?></s></span>
                                                    </div>
                                                    <div class="mt-4">
                                                        <div class="options">
                                                            <a href="/card-detail.php?id=<?php echo $item["id"] ?>"
                                                                class="option1">
                                                                More info
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </section>
        <?php include_once ("components/footer.php"); ?>
        <script>
            document.querySelectorAll('li.align-items-center').forEach(
                function (li) {
                    li.addEventListener('click', function () {
                        var a = li.querySelector('a');
                        if (a) {
                            window.location.href = a.href;
                        }
                    });
                });
        </script>

    </body>

</html>