<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTK Interior Design</title>

    <!-- jquery link -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="module" src="Javascript/sweet alert.js"></script>
    <script src="Javascript/contact-form.js"></script>

    <!-- Sweet Alert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    <!-- CSS files -->
    <link rel="stylesheet" href="website-stylesheet/contact-form.css?v=<?php echo time(); ?>">

    <!-- !-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <main class="contact-form">
        <form id="client-contact-details-form" method="post">
        <div class="modal">
            <div class="modal-content">
                <section class="upper"><button id="cancel-form-btn"><i class="fa-solid fa-xmark"></i></button></section>
                <p>Got any ideas? We've got the skills.</p>
                <p>Let's team up!</p>
                <p>Tell us more about yourself and what you've got in mind.</p>
                <div class="grid">
                    <input type="text" name="name" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="E-mail Address">
                    <input type="tel" name="phone_number" placeholder="Phone Number" required>
                    <input type="text" name="company_name" placeholder="Company Name (Optional)">
                </div>
                <div class="grid">
                    <select name="work_type" required>
                        <option value="" selected disabled>Choose Option</option>
                        <option value="Residential Interior">Residential Interior</option>
                        <option value="Office Interior">Office Interior</option>
                        <option value="Commercial Interior">Commercial Interior</option>
                    </select>
                    <textarea name="message" cols="30" rows="5" placeholder="Write to us" required></textarea>
                </div>
                <section class="lower">
                <input id="client-contact-details-form-btn" type="submit" value="Send Request">
                </section>
            </div>
        </div>
        </form>
    </main>

<script type="module">
import {showError} from './Javascript/sweet alert.js';

$(document).ready(function() {
        
    $("#client-contact-details-form").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'process-contact-details.php',
            method:'post',
            data:$(this).serialize(),
            success: function (response) {
                    if (response.trim() === 'success') {
                        // Successfully updated, show success alert without buttons
                        Swal.fire({
                            icon: 'success',
                            title: 'Your request has been submitted!',
                            text: 'Thank You for choosing HTK Interior Design',
                            timer: 3000, // Close the alert after 3 seconds
                            showConfirmButton: false
                        }).then(() => {
                            // Redirect to the same URL after the timer expires
                            window.location.href = 'index.php';
                        });
                    } else {
                        // Handle errors or show an error alert
                        showError();
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
