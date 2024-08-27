<?php
// Include the database connection script
include 'db-connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables to store form data
    $name = $email = $phone_number = $company_name = $work_type = $message = "";

    // Check if name, phone number, and message fields are not empty (required fields)
    if (!empty($_POST["name"]) && !empty($_POST["phone_number"]) && !empty($_POST["message"])) {
        // Sanitize and store form data in variables
        $name = $mysqli->real_escape_string($_POST["name"]);
        $email = $mysqli->real_escape_string($_POST["email"]);
        $phone_number = $mysqli->real_escape_string($_POST["phone_number"]);
        $company_name = isset($_POST["company_name"]) ? $mysqli->real_escape_string($_POST["company_name"]) : NULL;
        $work_type = isset($_POST["work_type"]) ? $mysqli->real_escape_string($_POST["work_type"]) : NULL;
        $message = $mysqli->real_escape_string($_POST["message"]);

        // Get the current date in the desired format
        $currentDate = date('y/m/d', strtotime('now')); // 'now' gets the current timestamp

        // Prepare and execute SQL query to insert data into the database
        $sql = "INSERT INTO customer_request (name, email, phone_number, company_name, work_type, message, date) VALUES ('$name', '$email', '$phone_number', '$company_name', '$work_type', '$message', '$currentDate')";
        if ($mysqli->query($sql) === TRUE) {
            // If insertion is successful, send success response
            echo "success";
        } else {
            // If insertion fails, send error response
            echo "error: " . $mysqli->error;
        }
    } else {
        // If required fields are empty, send error response
        echo "error: Required fields are empty";
    }
} else {
    // If the form is not submitted via POST method, send error response
    echo "error: Form not submitted";
}

// Close database connection
$mysqli->close();
?>
