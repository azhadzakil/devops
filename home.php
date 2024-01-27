<!DOCTYPE html>
<html lang="en">

<?php
// $page_title = 'Home Page';
// include('./includes/indexheader.html');

// Require the file with the getNodeResponse function
require 'node_request.php';

// Use the function
$nodeResponse = getNodeResponse();
echo "<p>Response from Node.js: $nodeResponse</p>";

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- for icons  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!-- fancy box  -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    <!-- custom css  -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="body-fixed">
    <!-- start of header  -->
    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header-logo">
                        <a href="./home.php">
                            <img src="logo1.png" width="160" height="36" alt="Logo" >
                            <!-- <h3 class="h3-title">Feast</h3> -->
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="main-navigation">
                        <button class="menu-toggle"><span></span><span></span></button>
                        <nav class="header-menu">
                            <ul class="menu food-nav-menu">
                                <li><a href="./home.php">Home</a></li>
                                <li><a href="#occasion">Occasion</a></li>
                                <li><a href="./form.php">Order</a></li>
                                <li><a href="#about">About</a></li>

                            </ul>
                        </nav>
                        <div class="header-right">
                            
                            <a href="admin.php" class="header-btn">
                                <i class="uil uil-user-md"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header ends  -->

    <div id="viewport">
        <div id="js-scroll-content">
            <section class="main-banner" id="home">
                
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner-text">
                                    <h1 class="h1-title">
                                        Feast with us
                                    </h1>
                                    <p>Elevate Your Occasion, Simply Order from Us!</p>
                                    <div class="banner-btn mt-4">
                                        <a href="#occasion" class="sec-btn">Check our Service</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="banner-img-wp">
                                    <div class="banner-img">
                                        <img src="assets/images/dishes1.jpg" alt="Image 1">
                                        <img src="assets/images/dishes2.jpg" alt="Image 2">
                                        <img src="assets/images/dishes3.jpg" alt="Image 3">
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section style="background-image: url(assets/images/menu-bg.png);"
                class="our-menu section bg-light repeat-img" id="occasion">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">Occasion</p>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-tab-wp">
                            <div class="row">
                                <div class="col-lg-12 m-auto">
                                    <div class="menu-tab text-center">
                                        <ul class="filters">
                                            <div class="filter-active"></div>
                                            <li class="filter" data-filter=".all, .wedding, .birthday, .corporate">
                                                <img src="assets/images/alll.png" alt="">
                                                All
                                            </li>
                                            <li class="filter" data-filter=".wedding">
                                                <img src="assets/images/wedding1.png" alt="">
                                                Wedding
                                            </li>
                                            <li class="filter" data-filter=".birthday">
                                                <img src="assets/images/birthday.png" alt="">
                                                Birthday
                                            </li>
                                            <li class="filter" data-filter=".corporate">
                                                <img src="assets/images/corporate.png" alt="">
                                                Corporate
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-list-row">
                            <div class="row g-xxl-5 bydefault_show" id="menu-dish">

                                <!-- 1 -->
                                <div class="col-lg-4 col-sm-6 dish-box-wp wedding" data-cat="wedding">
                                    <div class="dish-box text-center">
                                        <div class="dist-img">
                                            <img src="assets/images/dish/8.png" alt="">
                                        </div>
                                        <div class="package">
                                            <h3 class="h3-title">Wedding Package A</h3>

                                            <!-- <i class="uil uil-star"></i> -->
                                        </div>
                                        <div class="dish-info">
                                            <ul>
                                                <li>
                                                <b>Nasi Putih</b>
                                                <b>Ayam Goreng Berempah</b>
                                                <b>Daging Hitam</b>
                                                <b>Dalca Sayur</b>
                                                <b>Buah Oren</b>
                                                <b>Teh O Ais</b>
                                                <b>Bubur Pulut Hitam</b>
                                                </li>
                                            </ul>
                                        </div>                                        
                                        
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6 dish-box-wp wedding" data-cat="wedding">
                                    <div class="dish-box text-center">
                                        <div class="dist-img">
                                            <img src="assets/images/dish/9.png" alt="">
                                        </div>
                                        <div class="package">
                                            <h3 class="h3-title">Wedding Package B</h3>
                                        </div>
                                        <div class="dish-info">
                                            <ul>
                                            <li>
                                                <b>Nasi Minyak</b>
                                                <b>Ayam Masak Merah</b>
                                                <b>Daging Kurma</b>
                                                <b>Dalca Sayur</b>
                                                <b>Buah Tembikai</b>
                                                <b>Sirap Ais</b>
                                                <b>Bubur Jagung</b>
                                            </li>
                                            </ul>
                                        </div>                                        
                                        
                                    </div>
                                </div>

                                <!-- 3 -->
                                <div class="col-lg-4 col-sm-6 dish-box-wp birthday" data-cat="birthday">
                                    <div class="dish-box text-center">
                                        <div class="dist-img">
                                            <img src="assets/images/dish/33.png" alt="">
                                        </div>
                                        <div class="package">
                                            <h3 class="h3-title">Birthday Package A</h3>
                                        </div>
                                        <div class="dish-info">
                                            <ul>
                                            <li>
                                                <b>Ayam Goreng</b>
                                                <b>Bihun Goreng</b>
                                                <b>Nasi Goreng</b>
                                                <b>Coleslaw</b>
                                                <b>Cocktail Buah</b>
                                                <b>Buah Tembikai</b>
                                                <b>Karipap</b>
                                            </li>
                                            </ul>
                                        </div>                                        
                                       
                                    </div>
                                </div>

                                <!-- 4 -->
                                <div class="col-lg-4 col-sm-6 dish-box-wp birthday" data-cat="birthday">
                                    <div class="dish-box text-center">
                                        <div class="dist-img">
                                            <img src="assets/images/dish/44.png" alt="">
                                        </div>
                                        <div class="package">
                                            <h3 class="h3-title">Birthday Package B</h3>
                                        </div>
                                        <div class="dish-info">
                                            <ul>
                                            <li>
                                                <b>Mac N Cheese</b>
                                                <b>Lasagna</b>
                                                <b>Chicken Tempura</b>
                                                <b>Mashed Potatoes</b>
                                                <b>Crispy Pop</b>
                                                <b>Orange Juice</b>
                                                <b>Mini Donut</b>
                                            </li>
                                            </ul>
                                        </div>                                        
                                        
                                    </div>
                                </div>

                                <!-- 5 -->
                                <div class="col-lg-4 col-sm-6 dish-box-wp corporate" data-cat="corporate">
                                    <div class="dish-box text-center">
                                        <div class="dist-img">
                                            <img src="assets/images/dish/55.png" alt="">
                                        </div>
                                        <div class="package">
                                            <h3 class="h3-title">Corporate Package A</h3>
                                        </div>
                                        <div class="dish-info">
                                            <ul>
                                            <li>
                                                <b>BBQ Chicken</b>
                                                <b>Chicken/Beef Satay</b>
                                                <b>Spaghetti Bolognese</b>
                                                <b>Salad Bowl</b>
                                                <b>Fruit Cocktail</b>
                                                <b>Watermelon</b>
                                                <b>Tuna Sandwich</b>
                                            </li>
                                            </ul>
                                        </div>                                        
                                        
                                    </div>
                                </div>
                                
                                <!-- 6 -->
                                <div class="col-lg-4 col-sm-6 dish-box-wp corporate" data-cat="corporate">
                                    <div class="dish-box text-center">
                                        <div class="dist-img">
                                            <img src="assets/images/dish/66.png" alt="">
                                        </div>
                                        <div class="package">
                                            <h3 class="h3-title">Corporate Package B</h3>
                                        </div>
                                        <div class="dish-info">
                                            <ul>
                                            <li>
                                                <b>Chicken Chop</b>
                                                <b>Fries</b>
                                                <b>Butterscotch Bun</b>
                                                <b>Coleslaw</b>
                                                <b>Carbonated Drinks</b>
                                                <b>Orange</b>
                                                <b>Brownies</b>
                                            </li>
                                            </ul>
                                        </div>                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="about-sec section" id="about">
                <div class="book-table-shape">
                    <img src="assets/images/table-leaves-shape.png" alt="">
                </div>

                <div class="book-table-shape book-table-shape2">
                    <img src="assets/images/table-leaves-shape.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <p class="sec-sub-title mb-3">About Us</p>
                                <h1 class="h2-title">Feast With Us</h1>
                                <p>Elevating every occasion with exquisite catering and personalized service.</p>
                                <div class="sec-title-shape mb-4">
                                    <img src="assets/images/title-shape.svg" alt="">
                                </div>

                                <p> Contact us: </p>
                                <p><img src="assets/images/whatsapp.png" alt="Logo" class="logo-img"> +60127891234</p>
                                <p><img src="assets/images/facebook.png" alt="Logo" class="logo-img"> Feast With Us</p>
                                <p><img src="assets/images/instagram.png" alt="Logo" class="logo-img">@feastwithus</p>

                                <div class="discount-box">
                                <p><b>Follow us on Instagram and Facebook to get an EXCLUSIVE DISCOUNT!<b><p>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>

            <section class="footer section" id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <p>&copy; Copyright • Project • IBB 32303 DevOps</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


    <!-- jquery  -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <!-- fontawesome  -->
    <script src="assets/js/font-awesome.min.js"></script>

    <!-- swiper slider  -->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!-- mixitup -- filter  -->
    <script src="assets/js/jquery.mixitup.min.js"></script>

    <!-- fancy box  -->
    <script src="assets/js/jquery.fancybox.min.js"></script>

    <!-- parallax  -->
    <script src="assets/js/parallax.min.js"></script>

    <!-- gsap  -->
    <script src="assets/js/gsap.min.js"></script>

    <!-- scroll trigger  -->
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <!-- scroll to plugin  -->
    <script src="assets/js/ScrollToPlugin.min.js"></script>
    <!-- rellax  -->
    <!-- <script src="assets/js/rellax.min.js"></script> -->
    <!-- <script src="assets/js/rellax-custom.js"></script> -->
    <!-- smooth scroll  -->
    <script src="assets/js/smooth-scroll.js"></script>
    <!-- custom js  -->
    <script src="main.js"></script>

    <!-- footer 
    <footer class="site-footer">
        <div class="container">
            <?php /*
            $page_title = 'Catering';
            include('./includes/footer.html');  */
            ?> 
        </div>
    </footer> -->


</body>

<style>
    .discount-box {
    border: 2px solid #EE7D00; /* Choose your desired border color */
    padding: 10px 20px;
    border-radius: 8px; /* Optional: Add rounded corners */
}

/* Additional styling for the text inside the box */
.discount-box p {
    /* margin: 0; */
    font-size: 14px;
    color: black; /* Choose your desired text color */
    padding-left: 10px; /* Add padding to the left */
    padding-right: 20px; /* Add padding to the right */
}

    </style>

<?php
// include('./includes/footer.html');
?>

</html>