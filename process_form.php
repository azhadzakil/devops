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
    <title>Review Order</title>
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


    <div id="js-scroll-content">
            <section class="main-banner" id="order">
                
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="result-container">

                                    <fieldset>
                                    <div id="form-container1">

                                        <h2>Order Received</h2>

                                        <?php
                                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                            // Get the user's input.
                                            $occasion = $_POST['occasion'];
                                            $event_date = $_POST['date'];
                                            $event_time = $_POST['time'];
                                            $event_address = $_POST['address'];
                                            $location = $_POST['location'];
                                            $budget = $_POST['budget'];
                                            $num_pax = $_POST['pax'];
                                            $total = $_POST['total'];

                                            $contact_person = $_POST['pic'];
                                            $contact_number = $_POST['contact'];
                                            $company = $_POST['company'];
                                            $email = $_POST['email'];

                                            $request = $_POST['request'];
                                            $promo = $_POST['promo'];

                                            // Validate the input.
                                            if (
                                                empty($occasion) || empty($event_date) || empty($event_time) || empty($event_address) || empty($location) ||
                                                empty($budget) || empty($num_pax) || empty($contact_person) || empty($contact_number) || empty($company) || empty($email)
                                            ) {
                                                // Display an error message and exit the program.
                                                echo 'All fields are required.';
                                                exit;
                                            }

                                            $total = $budget * $num_pax;

                                            if ($promo === "HNY2024") {
                                                $total = $total-($total*0.1);
                                            }

                                            // Output the results to the user.
                                            echo '<p><b>Successful</b></p>';
                                            echo '<p>Your order has been recorded.</p>';

                                            echo '<form action="form.php"><p><button type="submit" name="btn_detail" class="btn btn-primary">Return to Form </button></p></form>';

                                            echo '<form action="home.php"><p><button type="submit" name="btn_detail" class="btn btn-primary">Return to Home</button></p></form>';

                                        }

                                        // 2. insert data into table users - using SQL statement
                                        $sql = "INSERT INTO orders(occasion, event_date, event_time, event_address, location, budget, num_pax, total, contact_person, contact_number, company, email, request, promo) 
                                            VALUES ('$occasion', '$event_date', '$event_time', '$event_address', '$location', '$budget', '$num_pax', '$total', '$contact_person', '$contact_number', '$company', '$email', '$request', '$promo')";

                                        // execute/run the sql statement
                                        if (mysqli_query($conn, $sql)) {
                                            $_SESSION['msg_create'] = "New order has been successfully entered"; 
                                            // echo "New order has been successfully entered";
                                        } else {
                                            echo "Failed to save order " . mysqli_error($conn);
                                        }

                                        // 3. close the db connection
                                        mysqli_close($conn);


                                        ?>

                                    </div>
                                    </fieldset>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>



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


<?php
// include('./includes/footer.html');
?>

</html>