<?php
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
        </style>
    </head>

    <body>
        <header>
        </header>
        <?php include_once ("components/nav.php"); ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8 centered-content">
                    <div class="content-frame">
                        <h1>About Us</h1>
                        <p class="lead">Welcome to Card Treasure!</p>
                        <p>At Card Treasure, we believe that every occasion deserves to be celebrated with a personal
                            touch. That's why we've dedicated ourselves to providing a wide array of greeting cards that
                            cater to every moment in life. Whether you are celebrating a birthday, welcoming a new baby,
                            congratulating someone on their achievements, or simply wanting to say "thank you," we have
                            the perfect card to convey your heartfelt message.</p>
                    </div>
                    <div class="content-frame">
                        <h1>Our Story</h1>
                        <p>Card Treasure was founded with a passion for helping people express their emotions and
                            connect with others in meaningful ways. We understand that in this digital age, a
                            handwritten card can make all the difference, adding a personal and memorable touch to any
                            occasion. Our mission is to bring joy and warmth to every celebration with our diverse and
                            beautifully crafted cards.</p>
                    </div>
                    <div class="content-frame">
                        <h1>What We Offer</h1>
                        <p>At Card Treasure, we offer a comprehensive selection of greeting cards for all occasions,
                            including:</p>
                        <ul>
                            <li>Anniversary</li>
                            <li>Birthday</li>
                            <li>Condolence</li>
                        </ul>
                        <p>Our cards are carefully designed and curated to ensure that you can find exactly what you
                            need, whether you prefer something classic, contemporary, humorous, or heartfelt.</p>
                    </div>
                    <div class="content-frame">
                        <h1>Our Objectives</h1>
                        <p><strong>Quality and Craftsmanship:</strong> We are committed to providing high-quality
                            greeting cards that stand out in design and durability. Each card is crafted with attention
                            to detail to ensure it is both beautiful and long-lasting.</p>
                        <p><strong>Diverse Selection:</strong> We aim to offer a wide range of cards that cater to all
                            tastes and preferences. Our collection includes designs from traditional to modern, ensuring
                            that everyone can find something they love.</p>
                        <p><strong>Customer Satisfaction:</strong> Your satisfaction is our top priority. We strive to
                            provide excellent customer service and ensure a seamless shopping experience, both online
                            and in-store.</p>
                        <p><strong>Eco-Friendly Practices:</strong> We are dedicated to sustainability and use
                            environmentally friendly materials whenever possible. Our goal is to minimize our impact on
                            the environment while providing you with beautiful products.</p>
                        <p><strong>Building Connections:</strong> At Card Treasure, we understand the importance of
                            connections and relationships. Our cards are designed to help you express your feelings and
                            make meaningful connections with those who matter most.</p>

                        <p>Thank you for choosing Card Treasure. We look forward to helping you celebrate life's special
                            moments with our exquisite greeting cards.</p>
                    </div>
                    <div class="content-frame">
                        <h1>Our Brands</h1>
                        <p>We are proud to offer greeting cards from a variety of renowned brands, including:</p>
                        <ul>
                            <li>Moji</li>
                            <li>CardCo</li>
                            <li>Creative Cards</li>
                            <li>Party Cards</li>
                            <li>Joyful Prints</li>
                            <li>CardMart</li>
                            <li>LoveNotes</li>
                            <li>Romance Prints</li>
                            <li>Heartfelt Cards</li>
                            <li>Comfort Creations</li>
                            <li>Sympathy Solutions</li>
                        </ul>
                    </div>
                    <!-- Sales Address -->
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <h2><strong>Address</strong></h2>
                                <address>
                                    <strong>Card Treasure</strong><br>
                                    8 Ton That Thuyet, Dich Vong<br>
                                    Cau Giay, Hanoi<br>
                                    Vietnam
                                </address>
                                <p>Feel free to visit us during our business hours. We look forward to seeing you!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once ("components/footer.php"); ?>
    </body>

</html>