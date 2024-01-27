<!DOCTYPE html>
<html lang="en">

<?php

session_start();
require_once('db_connection.php');

$page_title = 'Catering';
// include('./includes/header.html');

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

        <div id="js-scroll-content">
            <section class="main-banner" id="order">
                
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="banner-text">


                                <fieldset>

                                <div id="form-container">
                                <h2>Order Confirmation</h2>
                                <p>Please review the Event and Contact details before you Confirm Order.</p>


                                <?php
                                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_form'])) {
                                    // Get the user's input.
                                    $occasion = $_POST['occasion'];
                                    $event_date = $_POST['date'];
                                    $event_time = $_POST['time'];
                                    $event_address = $_POST['address'];
                                    $location = $_POST['location'];
                                    $budget = $_POST['budget'];
                                    $num_pax = $_POST['pax'];

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
                                    // echo '<div><h3>Your order:</h3>';
                                    echo '<form method="post" action="process_form.php">';

                                    // Include hidden input fields to carry forward the form data
                                    echo '<input type="hidden" name="occasion" value="' . htmlspecialchars($occasion) . '">';
                                    echo '<input type="hidden" name="date" value="' . htmlspecialchars($event_date) . '">';
                                    echo '<input type="hidden" name="time" value="' . htmlspecialchars($event_time) . '">';
                                    echo '<input type="hidden" name="address" value="' . htmlspecialchars($event_address) . '">';
                                    echo '<input type="hidden" name="location" value="' . htmlspecialchars($location) . '">';
                                    echo '<input type="hidden" name="budget" value="' . htmlspecialchars($budget) . '">';
                                    echo '<input type="hidden" name="pax" value="' . htmlspecialchars($num_pax) . '">';
                                    echo '<input type="hidden" name="total" value="' . htmlspecialchars($total) . '">';
                                    echo '<input type="hidden" name="pic" value="' . htmlspecialchars($contact_person) . '">';
                                    echo '<input type="hidden" name="contact" value="' . htmlspecialchars($contact_number) . '">';
                                    echo '<input type="hidden" name="company" value="' . htmlspecialchars($company) . '">';
                                    echo '<input type="hidden" name="email" value="' . htmlspecialchars($email) . '">';
                                    echo '<input type="hidden" name="request" value="' . htmlspecialchars($request) . '">';
                                    echo '<input type="hidden" name="promo" value="' . htmlspecialchars($promo) . '">';

                                    // Display form in non-editable text
                                    // Display Event Details
                                    echo '<div style="padding: 20px;">';  // Add padding to the container div
                                    echo '<table style="width: 100%; border-collapse: collapse; border: 2px solid #ddd; margin-bottom: 20px;">';  // Set width to 100%, collapse the borders, and add some styling                                    echo '<p><b>Event Details:</p></b>';
                                    echo '<caption style="caption-side: top; text-align: left; font-weight: bold; font-size: 1.2em; margin-bottom: 10px;">Event Details:</caption>';  // Add caption styling
                                    
                                    echo '<tr style="background-color: #f2f2f2;">';
                                    echo "<tr><th style='padding: 5px;'>Ocassion</th><td style='padding: 5px;'><p>$occasion</p></td></tr>";  // Add padding to th and td
                                    echo "<tr><th style='padding: 5px;'>Event Date</th><td style='padding: 5px;'><p>$event_date</p></td></tr>";
                                    echo "<tr><th style='padding: 5px;'>Event Time</th><td style='padding: 5px;'><p>$event_time</p></td></tr>";
                                    echo "<tr><th style='padding: 5px;'>Event Address</th><td style='padding: 5px;'><p>$event_address</p></td></tr>";
                                    echo "<tr><th style='padding: 5px;'>Location</th><td style='padding: 5px;'><p>$location</p></td></tr>";
                                    echo "<tr><th style='padding: 5px;'>Budget Per Pax (RM)</th><td style='padding: 5px;'><p>$budget</p></td></tr>";
                                    echo "<tr><th style='padding: 5px;'>Number of Pax</th><td style='padding: 5px;'><p>$num_pax</p></td></tr>";
                                    echo "<tr><th style='padding: 5px;'>Total Cost (RM)</th><td style='padding: 5px;'><p>$total</p></td></tr>";
                                    echo "</table>";
                                    echo '</div>';  // Close the container div

                                    // Display Contact Details
                                    echo '<div style="padding: 20px;">';  // Add padding to the container div
                                    echo '<table style="width: 100%; border-collapse: collapse; border: 2px solid #ddd; margin-bottom: 20px;">';  // Set width to 100%, collapse the borders, and add some styling                                    echo '<p><b>Event Details:</p></b>';
                                    echo '<caption style="caption-side: top; text-align: left; font-weight: bold; font-size: 1.2em; margin-bottom: 10px;">Contact Details:</caption>';  // Add caption styling
                                    
                                    echo '<tr style="background-color: #f2f2f2;">';

                                    echo "<tr><th style='padding: 5px;'>Contact Person</th><td style='padding: 5px;'><p>$contact_person</p></td></tr>";  // Add padding to th and td
                                    echo "<tr><th style='padding: 5px;'>Contact Number</th><td style='padding: 5px;'><p>$contact_number</p></td></tr>";  // Add padding to th and td
                                    echo "<tr><th style='padding: 5px;'>Company Name</th><td style='padding: 5px;'><p>$company</p></td></tr>";  // Add padding to th and td
                                    echo "<tr><th style='padding: 5px;'>Email</th><td style='padding: 5px;'><p>$email</p></td></tr>";  // Add padding to th and td
                                    echo "</table>";
                                    echo '</div>';  // Close the container div

                                    echo '<div style="padding: 20px;">';  // Add padding to the container div
                                    echo '<table style="width: 100%; border-collapse: collapse; border: 2px solid #ddd; margin-bottom: 20px;">';  // Set width to 100%, collapse the borders, and add some styling                                    echo '<p><b>Event Details:</p></b>';
                                    
                                    echo '<tr style="background-color: #f2f2f2;">';

                                    echo "<tr><th style='padding: 5px;'>Special Request</th><td style='padding: 5px;'><p>$request</p></td></tr>";  // Add padding to th and td
                                    echo "<tr><th style='padding: 5px;'>Promo</th><td style='padding: 5px;'><p>$promo</p></td></tr>";
                                    echo "</table>";
                                    echo '</div>';  // Close the container div
                                    
                                    // Display "Edit" button
                                    echo '<form action="form.php" method="GET">';
                                    echo '<input type="hidden" name="edit_occasion" value="' . htmlspecialchars($occasion) . '">';
                                    echo '<input type="hidden" name="edit_event_date" value="' . htmlspecialchars($event_date) . '">';
                                    echo '<input type="hidden" name="edit_event_time" value="' . htmlspecialchars($event_time) . '">';
                                    echo '<input type="hidden" name="edit_event_address" value="' . htmlspecialchars($event_address) . '">';
                                    echo '<input type="hidden" name="edit_location" value="' . htmlspecialchars($location) . '">';
                                    echo '<input type="hidden" name="edit_budget" value="' . htmlspecialchars($budget) . '">';
                                    echo '<input type="hidden" name="edit_num_pax" value="' . htmlspecialchars($num_pax) . '">';
                                    echo '<input type="hidden" name="edit_total" value="' . htmlspecialchars($total) . '">';
                                    echo '<input type="hidden" name="edit_contact_person" value="' . htmlspecialchars($contact_person) . '">';
                                    echo '<input type="hidden" name="edit_contact_number" value="' . htmlspecialchars($contact_number) . '">';
                                    echo '<input type="hidden" name="edit_company" value="' . htmlspecialchars($company) . '">';
                                    echo '<input type="hidden" name="edit_email" value="' . htmlspecialchars($email) . '">';
                                    echo '<input type="hidden" name="edit_request" value="' . htmlspecialchars($request) . '">';
                                    echo '<input type="hidden" name="edit_promo" value="' . htmlspecialchars($promo) . '">';

                                    // echo '<p><button type="edit" name="btn_detail" class="btn btn-primary">Edit Order</button></p>';

                                    echo '<p><button type="button" onclick="goBack()" class="btn btn-primary">Edit Order</button></p>';
                                    echo '<script>';
                                    echo 'function goBack() {';
                                    echo '  window.history.back();';
                                    echo '}';
                                    echo '</script>';

                                    echo '<p><input type="submit" name="submit_result" value=" Confirm Order "></p>';
                                    echo '</form>';


                                    // echo '<form action="form.php"><p><button type="submit" name="btn_detail" class="btn btn-primary">Return to Form</button></p></form>';
                                    // echo '</form>';

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
                            
                                        // Repeat this for other fields...
                                    }
                            

                                }

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


</body>

            <div>
                <?php
                // include('./includes/footer.html');
                ?>
            </div>
</html>