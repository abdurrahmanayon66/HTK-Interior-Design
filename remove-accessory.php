<?php
session_start(); // Start the session

// Check if accessoryName is set in the POST data
if(isset($_POST['accessoryName'])) {
    $accessoryName = $_POST['accessoryName'];

    // Check if cartItems session variable is set and not empty
    if(isset($_SESSION['cartItems']) && !empty($_SESSION['cartItems'])) {
        // Loop through cart items to find the item with matching name
        foreach ($_SESSION['cartItems'] as $index => $item) {
            if ($item['accessory_name'] === $accessoryName) {
                // Remove the item from the session data
                unset($_SESSION['cartItems'][$index]);

                // Respond with success
                echo 'success';
                exit; // Stop further processing
            }
        }
    }
}

// Respond with error if accessoryName is not set in the POST data or if item was not found
echo 'error';
?>
