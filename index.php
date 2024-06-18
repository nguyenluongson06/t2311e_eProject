<?php
require_once ("database/db.php");
$cards = get_cards();
$newest_cards = newest_cards();
$best_sellers = best_sellers();
$hot_items = hot_items();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Red Card Ltd.</title>
        <?php include_once ("components/style.php"); ?>
    </head>

    <body>
        <!-- header + slider -->
        <div class="hero_area">
            <?php include_once ("components/nav.php"); ?>
            <?php include_once ("components/slider.php"); ?>
        </div>
        <!-- end header + slider -->
        <!-- main content -->
        <main class="main">
            <div class="container">
                <section class="product_section layout_padding">
                    <div class="container">
                        <div class="heading_container heading_center">
                            <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                <li class="nav-item mx-2 text-center d-flex flex-column justify-content-center"
                                    role="presentation" style="min-width:150px;">
                                    <button class="nav-link active btn btn-lg rounded-circle mx-auto p-3 mb-2"
                                        id="pills-newest-cards-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-newest-cards" type="button" role="tab"
                                        aria-controls="pills-newest-cards" aria-selected="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                            width="36" height="36" viewBox="0 0 24 24">
                                            <path
                                                d="M8.5,20.003l-2.834-5.669L-.003,11.5l5.669-2.834,2.834-5.669,2.834,5.669,5.669,2.834-5.669,2.834-2.834,5.669ZM2.233,11.5l4.178,2.089,2.089,4.178,2.089-4.178,4.178-2.089-4.178-2.089-2.089-4.178-2.089,4.178-4.178,2.089Zm16.267,12.489l-1.826-3.651-3.651-1.826,3.651-1.825,1.826-3.652,1.826,3.652,3.651,1.825-3.651,1.826-1.826,3.651Zm-3.241-5.477l2.161,1.081,1.08,2.161,1.08-2.161,2.161-1.081-2.161-1.08-1.08-2.161-1.08,2.161-2.161,1.08Zm4.254-9.497l-1.497-2.994-2.993-1.496,2.993-1.497L19.513,.036l1.497,2.994,2.993,1.497-2.993,1.496-1.497,2.994Zm-2.254-4.49l1.503,.751,.751,1.502,.751-1.502,1.503-.751-1.503-.751-.751-1.502-.751,1.502-1.503,.751Z" />
                                        </svg>
                                    </button>
                                    <span>Newest Cards</span>
                                </li>
                                <li class="nav-item mx-2 text-center d-flex flex-column justify-content-center"
                                    role="presentation" style="min-width:150px;">
                                    <button class="nav-link btn btn-lg rounded-circle mx-auto p-3 mb-2"
                                        id="pills-best-sellers-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-best-sellers" type="button" role="tab"
                                        aria-controls="pills-best-sellers" aria-selected="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                            viewBox="0 0 24 24" width="36" height="36">
                                            <path
                                                d="m23.427,18.1l-3.443-3.333c-.003-.225-.029-.448-.079-.669-.119-.525.122-1.087.601-1.396.449-.29.814-.685,1.084-1.172.255-.459.388-.989.386-1.528.002-.543-.131-1.072-.386-1.532-.27-.487-.635-.882-1.085-1.172-.478-.309-.719-.87-.6-1.396.122-.534.104-1.083-.055-1.63-.295-1.029-1.117-1.852-2.146-2.146-.549-.158-1.098-.176-1.629-.055-.525.121-1.087-.121-1.396-.6-.289-.449-.684-.813-1.172-1.084-.934-.519-2.099-.52-3.036,0-.487.27-.882.635-1.172,1.084-.309.479-.87.722-1.396.6-.535-.122-1.081-.103-1.628.055-1.029.295-1.852,1.117-2.146,2.146-.158.548-.177,1.097-.055,1.63.119.527-.122,1.088-.601,1.396-.449.29-.814.685-1.084,1.172-.255.459-.388.989-.386,1.528-.002.543.131,1.073.386,1.532.27.487.635.882,1.085,1.172.478.309.719.869.6,1.396-.052.228-.078.459-.079.691l-3.421,3.311c-.529.511-.709,1.261-.469,1.957s.845,1.175,1.576,1.25l1.135.118.134.967c.098.703.576,1.283,1.249,1.513.2.068.405.102.608.102.479,0,.947-.186,1.303-.533l4.129-4.001c.075.049.152.097.233.141.468.26.993.39,1.519.39s1.05-.13,1.518-.39c.085-.047.167-.097.246-.15l4.136,4.008c.356.349.825.535,1.305.535.203,0,.408-.033.608-.102.673-.229,1.151-.81,1.249-1.514l.134-.966,1.134-.118c.732-.075,1.337-.554,1.577-1.25s.061-1.446-.469-1.957Zm-18.015,4.656c-.241.234-.572.309-.891.202-.318-.108-.535-.372-.582-.704l-.188-1.354c-.031-.229-.215-.405-.443-.429l-1.525-.158c-.346-.036-.62-.253-.733-.582s-.032-.67.219-.912l2.941-2.847c.347.914,1.118,1.631,2.065,1.903.547.157,1.093.177,1.629.055.524-.119,1.087.121,1.396.601.061.094.126.184.196.27l-4.083,3.957Zm5.543-4.019c-.342-.189-.617-.441-.816-.75-.441-.686-1.191-1.089-1.966-1.089-.163,0-.328.019-.491.056-.365.082-.748.068-1.132-.041-.689-.198-1.263-.771-1.461-1.462-.11-.384-.124-.765-.041-1.132.212-.935-.203-1.923-1.032-2.457-.311-.2-.563-.475-.752-.816-.172-.311-.263-.672-.261-1.048-.002-.372.089-.733.261-1.044.188-.342.441-.616.751-.816.83-.534,1.245-1.522,1.033-2.458-.083-.366-.069-.747.041-1.132.198-.689.771-1.263,1.461-1.461.383-.11.764-.124,1.131-.041.938.213,1.923-.202,2.458-1.032.199-.31.475-.562.816-.751.63-.35,1.439-.349,2.067,0,.343.189.616.441.815.751.536.83,1.522,1.247,2.458,1.032.366-.082.747-.068,1.132.041.689.198,1.263.771,1.461,1.462.11.384.124.765.041,1.131-.213.935.202,1.923,1.032,2.458.311.2.563.475.752.816.172.311.263.672.261,1.048.002.372-.089.733-.261,1.044-.188.342-.441.616-.751.816-.831.535-1.246,1.523-1.033,2.458.083.366.069.747-.041,1.132-.198.689-.771,1.263-1.461,1.461-.385.109-.768.123-1.131.041-.933-.21-1.923.203-2.46,1.033-.198.309-.472.561-.814.75-.63.351-1.439.35-2.067,0Zm11.995.993c-.113.329-.388.546-.734.582l-1.524.158c-.229.023-.412.2-.443.429l-.188,1.354c-.047.333-.264.597-.582.705-.317.107-.652.033-.893-.204l-4.093-3.967c.066-.083.128-.168.185-.258.309-.479.875-.719,1.397-.601.533.12,1.081.102,1.628-.055.952-.273,1.727-.997,2.071-1.918l2.957,2.863c.251.242.332.583.219.912ZM13,5.945v8.555c0,.276-.224.5-.5.5s-.5-.224-.5-.5V6.088l-1.634,1.753c-.188.202-.504.214-.707.025-.202-.188-.213-.505-.025-.707l1.742-1.869c.283-.284.688-.366,1.041-.217.354.146.583.489.583.872Z" />
                                        </svg>
                                    </button>
                                    <span>Best Sellers</span>
                                </li>
                                <li class="nav-item mx-2 text-center d-flex flex-column justify-content-center"
                                    role="presentation" style="min-width:150px;">
                                    <button class="nav-link btn btn-lg rounded-circle mx-auto p-3 mb-2"
                                        id="pills-hot-items-tab" data-bs-toggle="pill" data-bs-target="#pills-hot-items"
                                        type="button" role="tab" aria-controls="pills-hot-items" aria-selected="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                            viewBox="0 0 24 24" width="36" height="36">
                                            <path
                                                d="M17.938,5.57c-1.175-1.511-2.389-3.073-3.26-4.786-.228-.447-.615-.722-1.063-.753-.515-.032-1.017,.24-1.364,.736-.795,1.138-1.251,2.681-1.251,4.232,0,2.201,.648,3.516,1.219,4.677,.5,1.015,.895,1.816,.783,3.023-.12,1.305-1.315,2.315-2.698,2.3-2.856-.032-3.174-2.772-3.305-6.485-.025-.704-.484-1.276-1.169-1.459-.69-.188-1.38,.088-1.755,.691-1.003,1.61-2.074,4.123-2.075,6.343,0,5.461,4.53,9.905,10.002,9.905,5.512-.034,9.997-4.477,9.997-9.896,.056-3.234-1.944-5.807-4.061-8.529Zm3.061,8.521c0,4.879-4.039,8.874-9.002,8.904-4.929,0-8.997-3.995-8.997-8.905,0-2.011,1.037-4.39,1.924-5.815,.126-.202,.314-.274,.486-.274,.057,0,.112,.008,.163,.021,.097,.026,.413,.141,.427,.528,.108,3.078,.305,7.404,4.336,7.45,1.891,0,3.495-1.401,3.662-3.208,.138-1.488-.357-2.493-.882-3.558-.549-1.114-1.116-2.267-1.116-4.234,0-1.352,.39-2.686,1.071-3.66,.17-.242,.354-.31,.475-.312,.093,.007,.175,.077,.242,.209,.914,1.799,2.158,3.398,3.362,4.946,2.006,2.58,3.9,5.017,3.851,7.907Z" />
                                        </svg>
                                    </button>
                                    <span>Hot Items</span>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-newest-cards" role="tabpanel"
                                    aria-labelledby="pills-newest-cards-tab" tabindex="0">
                                    <div class="row">
                                        <?php foreach ($newest_cards as $item): ?>
                                        <div class="col-sm-6 col-md-4 col-lg-4">
                                            <div class="box" style="height:99%">
                                                <div class="option_container">
                                                    <div class="options">
                                                        <a href="/card-detail.php?id=<?php echo $item["id"]; ?>"
                                                            class="option1">
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
                                <div class="tab-pane fade" id="pills-best-sellers" role="tabpanel"
                                    aria-labelledby="pills-best-sellers-tab" tabindex="0">
                                    <div class="row">
                                        <?php foreach ($best_sellers as $item): ?>
                                        <div class="col-sm-6 col-md-4 col-lg-4">
                                            <div class="box" style="height:99%">
                                                <div class="option_container">
                                                    <div class="options">
                                                        <a href="/card-detail.php?id=<?php echo $item["id"]; ?>"
                                                            class="option1">
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
                                <div class="tab-pane fade" id="pills-hot-items" role="tabpanel"
                                    aria-labelledby="pills-hot-items-tab" tabindex="0">
                                    <div class="row">
                                        <?php foreach ($hot_items as $item): ?>
                                        <div class="col-sm-6 col-md-4 col-lg-4">
                                            <div class="box" style="height:99%">
                                                <div class="option_container">
                                                    <div class="options">
                                                        <a href="/card-detail.php?id=<?php echo $item["id"]; ?>"
                                                            class="option1">
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
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <!-- end main content -->
        <!-- arrival section -->
        <section class="arrival_section">
            <div class="container">
                <div class="box">
                    <div class="arrival_bg_box">
                        <img src="images/arrival-bg.jpg" alt="">
                    </div>
                    <div class="row">
                        <div class="col-md-6 ml-auto">
                            <div class="heading_container remove_line_bt">
                                <h2>
                                    #NewArrivals
                                </h2>
                            </div>
                            <p style="margin-top: 20px;margin-bottom: 30px;">
                                Introducing our newest selection of cards, designed to bring smiles and joy. Explorer
                                oufresh arrivals and find your favorite!
                            </p>
                            <div class="btn-box">
                                <a href="/collection.php" class="btn1">
                                    Shop Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end arrival section -->

        <!-- subscribe section -->
        <section class="subscribe_section">
            <div class="container-fuild">
                <div class="box">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="subscribe_form ">
                                <div class="heading_container heading_center">
                                    <h3>Subscribe To Get Discount Offers</h3>
                                </div>
                                <form action="">
                                    <input type="email" placeholder="Enter your email">
                                    <button>
                                        subscribe
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end subscribe section -->
        <!-- footer -->
        <?php include_once ("components/footer.php"); ?>
        <!-- end footer -->
    </body>

</html>