<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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

<?php
// $page_title = 'Admin Requests';
include('./includes/header.html');

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action == 'home') {
        // Redirect to admin.php logic here
        header("Location: home.php");
        exit();
    }
}

// Require the file with the getNodeResponse function
require 'node_request.php';

// Use the function
$nodeResponse = getNodeResponse();
echo "<p>Response from Node.js: $nodeResponse</p>";

?>


<body class="body-fixed">

    <div id="wrapper">
        <!-- Admin Container Section -->
        <div id="content">
            <!-- Admin Container Section -->
            <div id="admin-container" style="text-align: center;">
                <h2 style="margin-bottom: 25px;">Admin Login</h2>

                <form action="database.php" method="post">
                    <p style="text-align: center;">
                        <b><label for="username">Username:</label></b>
                        <input type="text" id="username" name="username" required style="width: 400px;"><br>
                    </p>
                    <p style="text-align: center;">
                        <b><label for="password">Password:</label></b>
                        <input type="password" id="password" name="password" required style="width: 405px;"><br>
                    </p>

                    <p style="text-align: center;">
                        <input type="submit" value="Login" style="width: 150px; ">
                    </p>
                </form>
            </div>
        </div>
    </div>

    <?php
include('./includes/footer.html');
?>

<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0; /* Remove default margin */
    }

    #wrapper {
    min-height: 25%;
    display: flex;
    flex-direction: column;
}

#content {
    flex: 1;
    /* Add additional styling for your content if needed */
}

#admin-container {
    text-align: center;
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ddd; /* Add a thin border */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: auto; /* Center the container horizontally */
    margin-top: 0; /* Remove margin-top */
    margin-bottom: 0; /* Remove margin-bottom */
    width: fit-content; /* Adjust the width as needed */
}


    fieldset {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 8px;
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
    }

    h3 {
        color: #007bff;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        font-weight: bold;
    }

    form {
        margin-top: 20px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    /* Add additional styling for your specific elements here */

    #footer {
        margin-top: auto;
    }

</style>

</body>

</html>
