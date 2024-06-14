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
        <title>Card Treasure</title>
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
        <!-- why section -->
        <section class="why_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Why Shop With Us?
                    </h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box ">
                            <div class="img-box">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                    style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M476.158,231.363l-13.259-53.035c3.625-0.77,6.345-3.986,6.345-7.839v-8.551c0-18.566-15.105-33.67-33.67-33.67h-60.392
                                    V110.63c0-9.136-7.432-16.568-16.568-16.568H50.772c-9.136,0-16.568,7.432-16.568,16.568V256c0,4.427,3.589,8.017,8.017,8.017
                                    c4.427,0,8.017-3.589,8.017-8.017V110.63c0-0.295,0.239-0.534,0.534-0.534h307.841c0.295,0,0.534,0.239,0.534,0.534v145.372
                                    c0,4.427,3.589,8.017,8.017,8.017c4.427,0,8.017-3.589,8.017-8.017v-9.088h94.569c0.008,0,0.014,0.002,0.021,0.002
                                    c0.008,0,0.015-0.001,0.022-0.001c11.637,0.008,21.518,7.646,24.912,18.171h-24.928c-4.427,0-8.017,3.589-8.017,8.017v17.102
                                    c0,13.851,11.268,25.119,25.119,25.119h9.086v35.273h-20.962c-6.886-19.883-25.787-34.205-47.982-34.205
                                    s-41.097,14.322-47.982,34.205h-3.86v-60.393c0-4.427-3.589-8.017-8.017-8.017c-4.427,0-8.017,3.589-8.017,8.017v60.391H192.817
                                    c-6.886-19.883-25.787-34.205-47.982-34.205s-41.097,14.322-47.982,34.205H50.772c-0.295,0-0.534-0.239-0.534-0.534v-17.637
                                    h34.739c4.427,0,8.017-3.589,8.017-8.017s-3.589-8.017-8.017-8.017H8.017c-4.427,0-8.017,3.589-8.017,8.017
                                    s3.589,8.017,8.017,8.017h26.188v17.637c0,9.136,7.432,16.568,16.568,16.568h43.304c-0.002,0.178-0.014,0.355-0.014,0.534
                                    c0,27.996,22.777,50.772,50.772,50.772s50.772-22.776,50.772-50.772c0-0.18-0.012-0.356-0.014-0.534h180.67
                                    c-0.002,0.178-0.014,0.355-0.014,0.534c0,27.996,22.777,50.772,50.772,50.772c27.995,0,50.772-22.776,50.772-50.772
                                    c0-0.18-0.012-0.356-0.014-0.534h26.203c4.427,0,8.017-3.589,8.017-8.017v-85.511C512,251.989,496.423,234.448,476.158,231.363z
                                    M375.182,144.301h60.392c9.725,0,17.637,7.912,17.637,17.637v0.534h-78.029V144.301z M375.182,230.881v-52.376h71.235
                                    l13.094,52.376H375.182z M144.835,401.904c-19.155,0-34.739-15.583-34.739-34.739s15.584-34.739,34.739-34.739
                                    c19.155,0,34.739,15.583,34.739,34.739S163.99,401.904,144.835,401.904z M427.023,401.904c-19.155,0-34.739-15.583-34.739-34.739
                                    s15.584-34.739,34.739-34.739c19.155,0,34.739,15.583,34.739,34.739S446.178,401.904,427.023,401.904z M495.967,299.29h-9.086
                                    c-5.01,0-9.086-4.076-9.086-9.086v-9.086h18.171V299.29z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M144.835,350.597c-9.136,0-16.568,7.432-16.568,16.568c0,9.136,7.432,16.568,16.568,16.568
                                    c9.136,0,16.568-7.432,16.568-16.568C161.403,358.029,153.971,350.597,144.835,350.597z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M427.023,350.597c-9.136,0-16.568,7.432-16.568,16.568c0,9.136,7.432,16.568,16.568,16.568
                                    c9.136,0,16.568-7.432,16.568-16.568C443.591,358.029,436.159,350.597,427.023,350.597z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M332.96,316.393H213.244c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017H332.96
                                    c4.427,0,8.017-3.589,8.017-8.017S337.388,316.393,332.96,316.393z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M127.733,282.188H25.119c-4.427,0-8.017,3.589-8.017,8.017s3.589,8.017,8.017,8.017h102.614
                                    c4.427,0,8.017-3.589,8.017-8.017S132.16,282.188,127.733,282.188z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M278.771,173.37c-3.13-3.13-8.207-3.13-11.337,0.001l-71.292,71.291l-37.087-37.087c-3.131-3.131-8.207-3.131-11.337,0
                                    c-3.131,3.131-3.131,8.206,0,11.337l42.756,42.756c1.565,1.566,3.617,2.348,5.668,2.348s4.104-0.782,5.668-2.348l76.96-76.96
                                    C281.901,181.576,281.901,176.501,278.771,173.37z" />
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                </svg>
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Fast Delivery
                                </h5>
                                <p>
                                    variations of passages of Lorem Ipsum available
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box ">
                            <div class="img-box">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 490.667 490.667" style="enable-background:new 0 0 490.667 490.667;"
                                    xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M138.667,192H96c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.667-10.667
                                    v-74.667h32c5.888,0,10.667-4.779,10.667-10.667S144.555,192,138.667,192z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M117.333,234.667H96c-5.888,0-10.667,4.779-10.667,10.667S90.112,256,96,256h21.333c5.888,0,10.667-4.779,10.667-10.667
                                    S123.221,234.667,117.333,234.667z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M245.333,0C110.059,0,0,110.059,0,245.333s110.059,245.333,245.333,245.333s245.333-110.059,245.333-245.333
                                    S380.608,0,245.333,0z M245.333,469.333c-123.52,0-224-100.48-224-224s100.48-224,224-224s224,100.48,224,224
                                    S368.853,469.333,245.333,469.333z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M386.752,131.989C352.085,88.789,300.544,64,245.333,64s-106.752,24.789-141.419,67.989
                                    c-3.691,4.587-2.965,11.307,1.643,14.997c4.587,3.691,11.307,2.965,14.976-1.643c30.613-38.144,76.096-60.011,124.8-60.011
                                    s94.187,21.867,124.779,60.011c2.112,2.624,5.205,3.989,8.32,3.989c2.368,0,4.715-0.768,6.677-2.347
                                    C389.717,143.296,390.443,136.576,386.752,131.989z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M376.405,354.923c-4.224-4.032-11.008-3.861-15.061,0.405c-30.613,32.235-71.808,50.005-116.011,50.005
                                    s-85.397-17.771-115.989-50.005c-4.032-4.309-10.816-4.437-15.061-0.405c-4.309,4.053-4.459,10.816-0.405,15.083
                                    c34.667,36.544,81.344,56.661,131.456,56.661s96.789-20.117,131.477-56.661C380.864,365.739,380.693,358.976,376.405,354.923z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M206.805,255.723c15.701-2.027,27.861-15.488,27.861-31.723c0-17.643-14.357-32-32-32h-21.333
                                    c-5.888,0-10.667,4.779-10.667,10.667v42.581c0,0.043,0,0.107,0,0.149V288c0,5.888,4.779,10.667,10.667,10.667
                                    S192,293.888,192,288v-16.917l24.448,24.469c2.091,2.069,4.821,3.115,7.552,3.115c2.731,0,5.461-1.045,7.531-3.136
                                    c4.16-4.16,4.16-10.923,0-15.083L206.805,255.723z M192,234.667v-21.333h10.667c5.867,0,10.667,4.779,10.667,10.667
                                    s-4.8,10.667-10.667,10.667H192z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M309.333,277.333h-32v-64h32c5.888,0,10.667-4.779,10.667-10.667S315.221,192,309.333,192h-42.667
                                    c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667h42.667c5.888,0,10.667-4.779,10.667-10.667
                                    S315.221,277.333,309.333,277.333z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M288,234.667h-21.333c-5.888,0-10.667,4.779-10.667,10.667S260.779,256,266.667,256H288
                                    c5.888,0,10.667-4.779,10.667-10.667S293.888,234.667,288,234.667z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M394.667,277.333h-32v-64h32c5.888,0,10.667-4.779,10.667-10.667S400.555,192,394.667,192H352
                                    c-5.888,0-10.667,4.779-10.667,10.667V288c0,5.888,4.779,10.667,10.667,10.667h42.667c5.888,0,10.667-4.779,10.667-10.667
                                    S400.555,277.333,394.667,277.333z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M373.333,234.667H352c-5.888,0-10.667,4.779-10.667,10.667S346.112,256,352,256h21.333
                                    c5.888,0,10.667-4.779,10.667-10.667S379.221,234.667,373.333,234.667z" />
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                </svg>
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Free Shiping
                                </h5>
                                <p>
                                    variations of passages of Lorem Ipsum available
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box ">
                            <div class="img-box">
                                <svg id="_30_Premium" height="512" viewBox="0 0 512 512" width="512"
                                    xmlns="http://www.w3.org/2000/svg" data-name="30_Premium">
                                    <g id="filled">
                                        <path
                                            d="m252.92 300h3.08a124.245 124.245 0 1 0 -4.49-.09c.075.009.15.023.226.03.394.039.789.06 1.184.06zm-96.92-124a100 100 0 1 1 100 100 100.113 100.113 0 0 1 -100-100z" />
                                        <path
                                            d="m447.445 387.635-80.4-80.4a171.682 171.682 0 0 0 60.955-131.235c0-94.841-77.159-172-172-172s-172 77.159-172 172c0 73.747 46.657 136.794 112 161.2v158.8c-.3 9.289 11.094 15.384 18.656 9.984l41.344-27.562 41.344 27.562c7.574 5.4 18.949-.7 18.656-9.984v-70.109l46.6 46.594c6.395 6.789 18.712 3.025 20.253-6.132l9.74-48.724 48.725-9.742c9.163-1.531 12.904-13.893 6.127-20.252zm-339.445-211.635c0-81.607 66.393-148 148-148s148 66.393 148 148-66.393 148-148 148-148-66.393-148-148zm154.656 278.016a12 12 0 0 0 -13.312 0l-29.344 19.562v-129.378a172.338 172.338 0 0 0 72 0v129.38zm117.381-58.353a12 12 0 0 0 -9.415 9.415l-6.913 34.58-47.709-47.709v-54.749a171.469 171.469 0 0 0 31.467-15.6l67.151 67.152z" />
                                        <path
                                            d="m287.62 236.985c8.349 4.694 19.251-3.212 17.367-12.618l-5.841-35.145 25.384-25c7.049-6.5 2.89-19.3-6.634-20.415l-35.23-5.306-15.933-31.867c-4.009-8.713-17.457-8.711-21.466 0l-15.933 31.866-35.23 5.306c-9.526 1.119-13.681 13.911-6.634 20.415l25.384 25-5.841 35.145c-1.879 9.406 9 17.31 17.367 12.618l31.62-16.414zm-53-32.359 2.928-17.615a12 12 0 0 0 -3.417-10.516l-12.721-12.531 17.658-2.66a12 12 0 0 0 8.947-6.5l7.985-15.971 7.985 15.972a12 12 0 0 0 8.947 6.5l17.658 2.66-12.723 12.535a12 12 0 0 0 -3.417 10.516l2.928 17.615-15.849-8.231a12 12 0 0 0 -11.058 0z" />
                                    </g>
                                </svg>
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Best Quality
                                </h5>
                                <p>
                                    variations of passages of Lorem Ipsum available
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end why section -->
        <!-- arrival section -->
        <section class="arrival_section">
            <div class="container">
                <div class="box">
                    <div class="arrival_bg_box">
                        <img src="images/arrival-bg.png" alt="">
                    </div>
                    <div class="row">
                        <div class="col-md-6 ml-auto">
                            <div class="heading_container remove_line_bt">
                                <h2>
                                    #NewArrivals
                                </h2>
                            </div>
                            <p style="margin-top: 20px;margin-bottom: 30px;">
                                Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem,
                                fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab
                                ipsa, autem similique ex unde!
                            </p>
                            <div class="btn-box">
                                <a href="/collections.php" class="btn1">
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
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
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