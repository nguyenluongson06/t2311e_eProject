<div?php
require_once ("database/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <?php include_once ("components/style.php"); ?>
    <style>
        .centered-content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .content-frame {
            max-width: 800px;
            margin: 20px 0;
        }

        .content-frame h1,
        .content-frame h2 {
            text-align: center;
        }

        .horizontal-list {
        display: grid;
        grid-auto-flow: column;
        gap: 15px;
        list-style-type: none;
        padding: 0;
        margin: 0;
        }
    </style>
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
                            <h3>About Us</h3>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <main class="main">
        <section class="py-3 py-md-5 py-xl-8">
            <div class="row justify-content-center">
                <div class="col-md-8 centered-content">
                    <div class="content-frame">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                                    <div class="content-frame">
                                        <h2 class="h1 mb-2 text-dark">Welcome</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border border-dark rounded shadow-sm overflow-hidden">
                                            <div class="card-body p-0">
                                                <div class="row gy-3 gy-md-4 gy-lg-0">
                                                    <div class="row align-items-lg-center justify-content-center h-100">
                                                        <div class="col-11 col-xl-10">
                                                            <div class="contact-info-wrapper py-4 py-xl-5">
                                                                <p class="lead fs-4 text-dark opacity-75 mb-4 mb-xxl-5">
                                                                    At Card Treasure, we believe that every occasion deserves to be celebrated 
                                                                    with a personal touch. That's why we've dedicated ourselves to providing a 
                                                                    wide array of greeting cards that cater to every moment in life. Whether you 
                                                                    are celebrating a birthday, welcoming a new baby, congratulating someone on their 
                                                                    achievements, or simply wanting to say "thank you," we have the perfect card to 
                                                                    convey your heartfelt message.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row justify-content-md-center">
                                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                                        <div class="content-frame">
                                            <h2 class="h1 mb-2 text-dark">Our Story</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border border-dark rounded shadow-sm overflow-hidden">
                                            <div class="card-body p-0">
                                                <div class="row gy-3 gy-md-4 gy-lg-0">
                                                    <div class="row align-items-lg-center justify-content-center h-100">
                                                        <div class="col-11 col-xl-10">
                                                            <div class="contact-info-wrapper py-4 py-xl-5">
                                                                <p class="lead fs-4 text-dark opacity-75 mb-4 mb-xxl-5 text-center">
                                                                    Card Treasure was founded with a passion for helping people express their 
                                                                    emotions and connect with others in meaningful ways. We understand that in 
                                                                    this digital age, a handwritten card can make all the difference, adding a personal 
                                                                    and memorable touch to any occasion. Our mission is to bring joy and warmth to every 
                                                                    celebration with our diverse and beautifully crafted cards.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row justify-content-md-center">
                                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                                        <div class="content-frame">
                                            <h2 class="h1 mb-2 text-dark">What We Offer</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border border-dark rounded shadow-sm overflow-hidden">
                                            <div class="card-body p-0">
                                                <div class="row gy-3 gy-md-4 gy-lg-0">
                                                    <div class="row align-items-lg-center justify-content-center h-100">
                                                        <div class="col-11 col-xl-10">
                                                            <div class="contact-info-wrapper py-4 py-xl-5">
                                                                <p class="lead fs-4 text-dark opacity-75 mb-4 mb-xxl-5 text-center">
                                                                    At Card Treasure, we offer a comprehensive selection of greeting 
                                                                    cards for all occasions, including:
                                                                </p>
                                                                <ul class="horizontal-list">
                                                                    <li class="list-group-item"><p class="lead fs-4 text-dark opacity-75 mb-4 mb-xxl-5 text-center">
                                                                        <strong>
                                                                            Birthday
                                                                        </strong>
                                                                    </p></li>
                                                                    <li class="list-group-item"><p class="lead fs-4 text-dark opacity-75 mb-4 mb-xxl-5 text-center">
                                                                        <strong>
                                                                            Anniversary
                                                                        <strong>
                                                                    </p></li>
                                                                    <li class="list-group-item"><p class="lead fs-4 text-dark opacity-75 mb-4 mb-xxl-5 text-center">
                                                                        <strong>
                                                                            Condolence
                                                                        </strong>
                                                                    </p></li>
                                                                </ul>
                                                                <p class="lead fs-4 text-dark opacity-75 mb-4 mb-xxl-5 text-center">
                                                                    Our cards are carefully designed and curated to ensure that you can find exactly what you need, 
                                                                    whether you prefer something classic, contemporary, humorous, or heartfelt.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row justify-content-md-center">
                                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                                        <div class="content-frame">
                                            <h2 class="h1 mb-2 text-dark">Our Objectives</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                        <div class="col-12">
                                            <div class="card border border-dark rounded shadow-sm overflow-hidden">
                                                <div class="card-body p-0">
                                                    <div class="row gy-3 gy-md-4 gy-lg-0">
                                                        <div class="row align-items-lg-center justify-content-center h-100">
                                                            <div class="col-11 col-xl-10">
                                                                <div class="contact-info-wrapper py-4 py-xl-5">
                                                                    <p class="lead fs-4 text-dark opacity-75 mb-4 mb-xxl-5 text-center">
                                                                        <strong>
                                                                            Quality and Craftsmanship:
                                                                        </strong>
                                                                        We are committed to providing high-quality greeting cards that stand 
                                                                        out in design and durability. Each card is crafted with attention to detail 
                                                                        to ensure it is both beautiful and long-lasting.
                                                                    </p>
                                                                    <p class="lead fs-4 text-dark opacity-75 mb-4 mb-xxl-5 text-center">
                                                                        <strong>
                                                                            Diverse Selection:
                                                                        </strong>
                                                                        We aim to offer a wide range of cards that cater to all tastes and preferences. 
                                                                        Our collection includes designs from traditional to modern, 
                                                                        ensuring that everyone can find something they love.
                                                                    </p>
                                                                    <p class="lead fs-4 text-dark opacity-75 mb-4 mb-xxl-5 text-center">
                                                                        <strong>
                                                                            Customer Satisfaction:
                                                                        </strong>
                                                                        Your satisfaction is our top priority. 
                                                                        We strive to provide excellent customer service and ensure a 
                                                                        seamless shopping experience, both online and in-store.
                                                                    </p>
                                                                    <p class="lead fs-4 text-dark opacity-75 mb-4 mb-xxl-5 text-center">
                                                                        <strong>
                                                                            Eco-Friendly Practices:
                                                                        </strong>
                                                                        We are dedicated to sustainability and use environmentally 
                                                                        friendly materials whenever possible. Our goal is to minimize our 
                                                                        impact on the environment while providing you with beautiful products.
                                                                    </p>
                                                                    <p class="lead fs-4 text-dark opacity-75 mb-4 mb-xxl-5 text-center">
                                                                        <strong>
                                                                            Building Connections:
                                                                        </strong>
                                                                        At Card Treasure, we understand the importance of connections and relationships. 
                                                                        Our cards are designed to help you express your feelings and make meaningful 
                                                                        connections with those who matter most.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include_once ("components/footer.php"); ?>
</body>

</html>
