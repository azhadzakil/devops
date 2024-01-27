<!DOCTYPE html>
<!-- Doc name: details.php -->

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
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

<body>
<?php

session_start();
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
}

if ($username !== 'admin' || $password !== 'admin') {
    header('Location: admin.php');
    exit();
}

$page_title = 'Order Details - Admin';
//include('./includes/header.html');

// Require the file with the getNodeResponse function
require 'node_request.php';

// Use the function
$nodeResponse = getNodeResponse();
echo "<p>Response from Node.js: $nodeResponse</p>";

?>


<div id="result-container">
<?php
			if (isset($_POST['order_id'])) {
				$order_id = $_POST['order_id'];
				// create query to retrieve details for the selected order_id
				$sql = "SELECT * from orders where order_id='$order_id'";

				// run the query
				$result = mysqli_query($conn, $sql);

				// check if there is data or not
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						// Set variables based on the fetched data
						$occasion = $row['occasion'];
						$event_date = $row['event_date'];
						$event_time = $row['event_time'];
						$event_address = $row['event_address'];
						$location = $row['location'];
						$budget = $row['budget'];
						$num_pax = $row['num_pax'];
						$total = $row['total'];
						$contact_person = $row['contact_person'];
						$contact_number = $row['contact_number'];
						$company = $row['company'];
						$email = $row['email'];
						$request = $row['request'];
						$promo = $row['promo'];
					}
				}
			}
			?>


    <fieldset>
        <h2>Order Details</h2>

        <?php


        // Include the display.php to show the details
        include('./includes/display.php');
        ?>

        <form action="database.php" method="post">
            <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
            <input type="hidden" name="password" value="<?php echo htmlspecialchars($password); ?>">
            <p>
                <input type="submit" value="Back">
            </p>
        </form>

		<form action="home.php" method="post">
            <p>
                <input type="submit" value="Return to Home">
            </p>
        </form>

        <?php
        // Close the database connection
        mysqli_close($conn);
        ?>
    </fieldset>
	
</div>



</body>

<style>
	#result-container {
    width: 50%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

</style>

<?php
include('./includes/footer.html');
?>

</html>