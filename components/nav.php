<?php
require_once ("database/db.php");
$categories = get_categories();
$manufacturers = get_manufacturers();
?>

<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.php"><img width="250" src="images/logo.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($categories as $item): ?>
                                <li>
                                    <a href="/category.php?id=<?php echo $item["id"] ?>"
                                        class="dropdown-item"><?php echo $item["name"] ?></a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Manufacturers
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($manufacturers as $item): ?>
                                <li>
                                    <a href="/manufacturer.php?id=<?php echo $item["id"] ?>"
                                        class="dropdown-item"><?php echo $item["name"] ?></a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about-us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact-us.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart.php">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029"
                                style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path
                                            d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                          c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                          C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                          c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                          C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                          c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                    </g>
                            </svg>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-light">
                                <?php echo isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : 0; ?></span></a>
                        </a>

                    </li>
                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </ul>
            </div>
        </nav>
    </div>
</header>