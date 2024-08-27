<?php

session_start(); // Start the session

include 'db-connection.php';  // Connect to the database

// Retrieve form data
$clientName = $_POST['client_name'];
$email = $_POST['email'];
$phoneNumber = $_POST['phone_number'];
$address = $_POST['address'];

// Check if cart items are set in the session
if (isset($_POST['quantity'])) {
    // Establish database connection
    $mysqli = new mysqli("localhost", "root", "", "htk");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $cartItems = $_SESSION['cartItems'];

    // Get the current date in the desired format
    $currentDate = date('y/m/d', strtotime('now')); // 'now' gets the current timestamp

    // Insert data into `accessories_order` table
    $insertOrderQuery = "INSERT INTO `accessories_order` (`client_name`, `email`, `phone_number`, `address`, `date`) VALUES (?, ?, ?, ?, ?)";
    $stmtOrder = $mysqli->prepare($insertOrderQuery);
    $stmtOrder->bind_param("sssss", $clientName, $email, $phoneNumber, $address, $currentDate);

    if ($stmtOrder->execute()) {
        // Get the ID of the last inserted row
        $last_inserted_accessories_order_id = $mysqli->insert_id;

        // Insert data into `accessories_order_details` table
        $insertDetailsQuery = "INSERT INTO `accessories_order_details` (`accessories_name`, `quantity`, `accessories_order_id`) VALUES (?, ?, ?)";
        $stmtDetails = $mysqli->prepare($insertDetailsQuery);
        $stmtDetails->bind_param("ssi", $accessoryName, $quantity, $last_inserted_accessories_order_id);

        foreach ($cartItems as $key => $item) {
            // Get the corresponding quantity from the form data if it exists
            $quantity = isset($_POST['quantity'][$key]) ? $_POST['quantity'][$key] : 1;

            // Access the object properties and insert into the details table
            $accessoryName = $item['accessory_name'];

            // Insert into accessories_order_details table
            if (!$stmtDetails->execute()) {
                // Display custom error message with detailed information
                showError("An error occurred while inserting details: " . $stmtDetails->error);
                exit; // Stop further execution
            }
        }
        // Close prepared statements
        $stmtOrder->close();
        $stmtDetails->close();

        // Close database connection
        $mysqli->close();

        // Everything executed successfully
        echo "success";
        // Unset the 'cartItems' session variable data
        unset($_SESSION['cartItems']);
    } else {
        echo "Error: Unable to insert order. Please try again later.";
    }
} else {
    echo "Error: No items in the cart.";
}

?>
