<!DOCTYPE html>
<!-- Doc name: database.php -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
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

<style>
    #admin-container {
    width: 80%;
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

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    thead {
        background-color: #f0f0f0;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        font-weight: bold;
    }

    button {
        padding: 8px 12px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    form {
        margin: 0;
    }

    p {
        margin: 20px 0;
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

</style>


<?php
session_start();
require_once('db_connection.php');

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Check if username and password are "admin"
if ($username !== 'admin' || $password !== 'admin') {
    header('Location: admin.php');
    exit();
} else {
    // Start session and store username
    $_SESSION['admin_username'] = $username;
}

$page_title = 'Admin Requests';
// include('./includes/header.html');

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
<div id="admin-container">

    <fieldset>
        <h2>Admin Requests</h2>

        <form action="details.php" method="post">

            <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
            <input type="hidden" name="password" value="<?php echo htmlspecialchars($password); ?>">

            <table border="1">
                <thead>
                    <tr >
                        <th style="text-align: center;">Order ID</th>
                        <th style="text-align: center;">Contact Person</th>
                        <th style="text-align: center;">Contact No</th>
                        <th style="text-align: center;">No of Pax</th>
                        <th style="text-align: center;">Event Date</th>
                        <th style="text-align: center;">Location</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    $sql = "SELECT * FROM orders";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td style="text-align: center;"><div class=""><?php echo $row['order_id']; ?></div></td>
                                <td><div class=""><?php echo $row['contact_person']; ?></div></td>
                                <td><div class=""><?php echo $row['contact_number']; ?></div></td>
                                <td style="text-align: center;"><div class=""><?php echo $row['num_pax']; ?></div></td>
                                <td style="text-align: center;"><div class=""><?php echo $row['event_date']; ?></div></td>
                                <td style="text-align: center;"><div class=""><?php echo $row['location']; ?></div></td>

                                <td >
                                    <form action="details.php" method="post">
                                        <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
                                        <input type="hidden" name="password" value="<?php echo htmlspecialchars($password); ?>">
                                        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                        <button type="submit" name="btn_detail" class="btn btn-primary">Details</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>


            </table>

        </form>

        <form action="">
            <p>
                <button type="submit" name="btn_detail" class="btn btn-primary" value="home">Return to Home</button>
            </p>
        </form>

    </fieldset>

</div>
</body>

<script>
    function updateRequest(requestId) {
        // Add your update request logic here
        alert('Update request with ID ' + requestId);
    }
</script>

<?php
include('./includes/footer.html');
?>

</html>