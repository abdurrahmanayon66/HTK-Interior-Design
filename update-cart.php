<?php
session_start();

if (isset($_POST['cartItems'])) {
    $_SESSION['cartItems'] = $_POST['cartItems'];
    echo 'Cart updated successfully';
} else {
    echo 'Error: No data received';
}
?>