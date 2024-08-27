<?php

 // Start session to access cart items
 session_start();

 // Check if cartItems is set in the session
// Check if cartItems is set in the session
if(isset($_SESSION['cartItems'])) {
    // Retrieve cart items from the session
    $cartItems = $_SESSION['cartItems'];

    // Initialize variables for subtotal and total
    $subtotal = 0;
    $vatPercentage = 0.18; // VAT rate (18%)
    $vat = 0;
    $total = 0;

    // Calculate subtotal
    foreach($cartItems as $item) {
        // Add the quantity * rate of each item to the subtotal
        $subtotal += $item['rate'];
    }

    // Calculate VAT
    $vat = $subtotal * $vatPercentage;

    // Calculate total
    $total = $subtotal + $vat;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTK Interior Design</title>

    <!-- jquery link -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="Javascript/checkout-form.js"></script>
    <script type="module" src="./Javascript/sweet alert.js"></script>

    <!-- CSS files -->
    <link rel="stylesheet" href="website-stylesheet/cart-checkout.css?v=<?php echo time(); ?>">

    <!-- !-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <?php
    include 'navbar.php'; 
    include 'navbar-mobile.php'; 
    ?>

    <main class="cart-checkout">
        <div class="grid">

            <header><p>Shopping Cart</p></header>

            <form method="post" id="cart-checkout-form">

            <?php

            if(isset($_SESSION['cartItems'])) {
               $cartItems = $_SESSION['cartItems'];

               foreach($cartItems as $item) {
                echo '<div class="row">';
                echo '<div>'; // Opening tag for product details and image
                echo '<img src="data:image/jpeg;base64,'.$item['accessory_image'].'" alt="">';
                echo '<div class="product-details">';
                echo '<p id="accessory-name">'.$item['accessory_name'].'</p>';
                echo '<p>'.$item['dimension'].'</p>';
                echo '</div>';
                echo '</div>'; // Closing tag for product details and image
                echo '<div class="input-btn-container">';
                echo '<button class="add"><i class="fa-solid fa-plus"></i></button>';
                echo '<input type="text" name="quantity[]" class="quantity" value="1" min="1" readonly>';
                echo '<button class="minus"><i class="fa-solid fa-minus"></i></button>';
                echo '</div>';
                echo '<div class="amount">৳ '.number_format($item['rate'], 0, '.', ',').'</div>';
                echo '<div class="btn-container"><button class="remove-accessories-btn" type="button"><i class="fa-solid fa-trash-can"></i></button></div>';
                echo '</div>';
            }
            

                if(!empty($cartItems)){

                echo '<div class="bill-container">
                    <div>
                        <p>Subtotal</p>
                        <p class="subtotal">৳' . number_format($subtotal, 2) . '</p>
                    </div>
                    <div>
                        <p>VAT (18%)</p>
                        <p class="vat">৳' . number_format($vat, 2) . '</p>
                    </div>
                    <div>
                        <p>Total</p>
                        <p class="total">৳' . number_format($total, 2) . '</p>
                    </div>
                </div>';
            
                echo '<div style="display:flex;justify-content:center;">
                    <input class="checkout-btn" type="button" value="Checkout">
                </div>';

                }

            }

            if(empty($cartItems)){

            echo '<div class="error-image-container">
            <img src="icons/empty-cart.png" alt="">
            </div>

            <h1 class="error-message">Oops! Your cart is empty.</h1>';
            }

            ?>


            <main class="client-details-form">
            <div class="modal">
                <div class="modal-content">
                    <section class="upper"><button id="cancel-checkout-btn"><i class="fa-solid fa-xmark"></i></button></section>
                    <p>HTK Interior Design</p>
                    <p class="form-header">Personal Details</p>
                    <div class="grid">
                        <input type="text" name="client_name" placeholder="Full Name" required>
                        <input type="email" name="email" placeholder="E-mail Address">
                        <input type="tel" name="phone_number" placeholder="Phone Number" required>
                        <input type="text" name="address" placeholder="Full Address" required>
                    </div>
                    <section class="lower">
                    <input class="confirm-order-btn" type="submit" value="Confirm Order">
                    </section>
                </div>
            </div>
            </main>

            </form>

        </div>
    </main>

<script type="module">
import {showError} from './Javascript/sweet alert.js';

$(document).ready(function() {
        
        $('.confirm-order-btn').click(function(e) {
        e.preventDefault(); // Prevent the default action of the button
        
        // Serialize form data
        var formData = $("#cart-checkout-form").serialize();
        
        // Send the form data using AJAX
        $.ajax({
            type: 'POST',
            url: 'process-checkout.php',
            data: formData,
            success: function(response) {
                if (response.trim() === 'success') {
                            // Successfully updated, show success alert without buttons
                            Swal.fire({
                                    icon: 'success',
                                    title: 'Your order has been placed!',
                                    text: 'Thank You for choosing HTK Interior Design',
                                    timer: 5000, // Close the alert after 3 seconds
                                    showConfirmButton: false
                                }).then(() => {
                                // Redirect to the same URL after the timer expires
                                window.location.href = 'index.php';
                            });
                        } else {
                            // Handle errors or show an error alert
                            showError(message);
                        }
                    },
                    error: function (error) {
                        // Handle AJAX errors or show an error alert
                        showError();
                    }
        });
    });

});

</script>

</body>
</html>
