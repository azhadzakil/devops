<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require_once('db_connection.php');

$page_title = 'Catering';
//include('./includes/header.html');

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
    <title>Order Page</title>
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

<title>Instant Total Calculation</title>
<script>
    function calculateTotal() {
        var budget = document.getElementById('budget').value;
        var pax = document.getElementById('pax').value;
        var totalSpan = document.getElementById('total');

        if (budget !== '' && pax !== '') {
            var total = parseFloat(budget) * parseFloat(pax);
            totalSpan.textContent = 'RM ' + total.toFixed(2);
        } else {
            totalSpan.textContent = '';
        }
    }
</script>

<body class="body-fixed">

    <!-- start of header  -->
    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header-logo">
                        <a href="./home.php">
                            <img src="logo1.png" width="160" height="36" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="main-navigation">
                        <button class="menu-toggle"><span></span><span></span></button>
                        <nav class="header-menu">
                            <ul class="menu food-nav-menu">
                                <li><a href="./home.php">Home</a></li>
                                <li><a href="./home.php#occasion">Occasion</a></li>
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

    <!-- <div id="form-container"> -->
        <div id="js-scroll-content">
            <section class="main-banner" id="order">
                
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">

                                <fieldset>
                                <h1>Enquire Now!</h1>


                                <p> We would love to be a part of your special occasion. Enquire now and let us help you create the perfect event!</p>

                                    <form method="post" action="result.php">
                                    <div id="form-container">

                                    <p style="color:red;"><i><small> Items marked with * are required to be filled.</small></i></p>

                                    <h3>Event Details</h3>
                                    
                                    <div class="form-container">

                                    <p >
                                        <b><label for="occasion">Occasion*:</label></b>
                                        <select name="occasion" id="occasion" required style="width: 400px;">
                                            <option value="" disabled selected>Occasion</option>
                                            <option value="Wedding">Wedding</option>
                                            <option value="Birthday">Birthday</option>
                                            <option value="Corporate">Corporate</option>
                                        </select>
                                    </p>

                                    <p >
                                        <b><label for="date">Event Date*:</label></b>
                                        <input type="date" id="date" name="date" required style="width: 392px;"><br>
                                    </p>

                                    <p >
                                        <b><label for="time">Event Time*:</label></b>
                                        <input type="time" id="time" name="time" required style="width: 392px;"><br>
                                    </p>

                                    <p >
                                        <b><label for="address">Event Address*:</label></b>
                                        <br>
                                        <textarea id="address" name="address" required placeholder="Address" style="width: 400px;"></textarea>
                                        <b><label for="location"></label></b>
                                        <br>
                                        <select id="location" name="location" required style="width: 200px;">
                                            <option value="" disabled selected>Location*</option>
                                            <option value="KualaLumpur">Kuala Lumpur</option>
                                            <option value="Selangor">Selangor</option>
                                        </select>

                                    </p>

                                    <p >
                                        <b><label for="budget">Budget Per Pax (RM)*:</label></b>
                                        <input type="number" step="0.01" id="budget" name="budget" required placeholder="Budget per Pax" style="width: 320px;" oninput="calculateTotal();"><br>
                                    </p>

                                    <p >
                                        <b><label for="pax">Number of Pax*:</label></b>
                                        <input type="number" id="pax" name="pax" required placeholder="Number of Pax" style="width: 360px;" oninput="calculateTotal();"><br>
                                    </p>

                                    <p >
                                        <b><label for="total">Total Cost:</label></b>
                                        <span id="total"></span>
                                    </p>
                                    </div>

                                    <h3>Contact Details</h3>
                                    <div class="form-container">
                                    <p>
                                        <b><label for="pic">Contact Person*:</label></b>
                                        <input type="text" id="pic" name="pic" required placeholder="Contact Person" style="width: 350px;"><br>
                                    </p>

                                    <p>
                                        <b><label for="contact">Contact Number*:</label></b>
                                        <input type="text" id="contact" name="contact" required placeholder="Contact Number" style="width: 342px;"><br>
                                    </p>

                                    <p>
                                        <b><label for="company">Company Name*:</label></b>
                                        <input type="text" id="company" name="company" required placeholder="Company Name" style="width: 342px;"><br>
                                    </p>

                                    <p>
                                        <b><label for="email">Email*:</label></b>
                                        <input type="email" id="email" name="email" required placeholder="Email" style="width: 430px;"><br>
                                    </p>
                                    </div>

                                    <h3>Other Details</h3>
                                    <div class="form-container">
                                    <p>
                                        <b><label for="request">Special Request:</label></b>
                                        <br>
                                        <textarea id="request" name="request" placeholder="Special Request ..." style="width: 400px;"></textarea>
                                        <b><label for="request"></label></b>
                                        <br>

                                        <!-- <textarea id="request" name="request" placeholder="Special Request ..." style="width: 300px;"></textarea> -->
                                    </p>

                                    <p>
                                        <b><label for="promo">Promo code:</label></b>
                                        <input type="text" id="promo" name="promo" placeholder="Promo Code" style="width: 200px;"><br>
                                    </p>

                                    <!-- <p>
                                        <input type="checkbox" id="newsletter" name="newsletter">
                                        <label for="newsletter">Subscribe to our newsletter</label>
                                    </p>
                                    Note: In the event your chosen caterer is not available, we will assist to forward your request to other caterers.<br> -->
                                    </div>

                                    <h3> </h3>

                                    <!-- <div class="form-container"> -->
                                    <input type="submit" name="submit_form" value="Submit" style="width: 100%;">
                                    <!-- </div> -->
                                </form>

                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <div class="banner-img-wp">
                                    <div class="banner-img">
                                        <img src="assets/images/dishes1.jpg" alt="Image 1">
                                        <img src="assets/images/dishes2.jpg" alt="Image 2">
                                        <img src="assets/images/dishes3.jpg" alt="Image 3">
                                        <img src="assets/images/dishes4.jpg" alt="Image 4">
                                        <img src="assets/images/dishes5.jpg" alt="Image 5">
                                        <img src="assets/images/dishes6.jpg" alt="Image 6">
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
                                <p><img src="assets/images/instagram.png" alt="Logo" class="logo-img">  Feast With Us</p>

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

        </div>
    </div>

    <?php
        // ...

        if (isset($_GET['edit_occasion'])) {
            // Populate form fields with edited values
            $occasion = $_GET['edit_occasion'];
            $event_date = $_GET['edit_event_date'];
            $event_time = $_GET['edit_event_time'];
            $event_address = $_GET['edit_event_address'];
            $location = $_GET['edit_location'];
            $budget = $_GET['edit_budget'];
            $num_pax = $_GET['edit_num_pax'];
            $total = $_GET['edit_total'];
            $contact_person = $_GET['edit_contact_person'];
            $contact_number = $_GET['edit_contact_number'];
            $company = $_GET['edit_company'];
            $email = $_GET['edit_email'];
            $request = $_GET['edit_request'];
            $promo = $_GET['edit_promo'];

        }

    ?>


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

</body>

</html>