<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTK Interior Design Navbar</title>

    <!-- jquery link -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- CSS files -->
    <link rel="stylesheet" href="website-stylesheet/navbar-mobile.css?v=<?php echo time(); ?>">

    <!-- !-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <nav class="navbar-mobile">

        <section class="upper-section">
            <div class="logo">HTK Interior Design</div>
            <div><i class="fa-solid fa-bars"></i><i class="cancel-nav-btn fa-solid fa-xmark"></i></div>
        </section> <!--upper-section ends here -->

        <section class="sidebar">
            <ul>
            <li><a href="index.php">Home</a></li>
            <li id="mobile-residential-interior"><a href="#projects">Residential Interior </a><i class="fa-residential fa-solid fa-chevron-down"></i></li>
            <section class="lower-section lower-section-residential">
                        <div class="col"><div class="image-container"><img src="./images/residential-image.jpg" alt=""></div></div>

                        <div class="col">
                            <header style="font-weight:600;">Residential Interior</header>
                            <div class="underline"></div>
                            <div class="grid">
                                <p>Residential Interior Design</p>
                                <p>Master Bedroom Design</p>
                                <p>Luxurious Toilet Design</p>
                                <p>Kitchen Cabinet Design</p>
                                <p>Child Bedroom Design</p>
                                <p>Drawing Room Design</p>
                                <p>Family Living Room</p>
                                <p>Study Unit Design</p>
                                <p>Tv Unit Design</p>
                            </div>
                         </div>
                         
                        <div class="col">
                            <header style="font-weight:600;">Contact Us</header>
                            <div class="underline"></div>
                            <p><i class="fa-solid fa-phone"></i> 01710020301</p>
                            <p><i class="fa-solid fa-envelope"></i> htkkabir@gmail.com</p>
                        </div>
                    </section>
            <li id="mobile-commercial-interior"><a href="#projects">Commercial Interior</a> <i class="fa-commercial fa-solid fa-chevron-down"></i></li>
                <section class="lower-section lower-section-commercial">
                    <div class="col"><div class="image-container"><img src="./images/commercial-image.jpg" alt=""></div></div>
                    <div class="col">
                            <header style="font-weight:600;">Commercial Interior</header>
                            <div class="underline"></div>
                            <div class="grid">
                                <p>Corporate Office Wall Design</p>
                                <p>Conference Room Table</p>
                                <p>Corporate Office Cabinet</p>
                                <p>Restaurant Interior</p>
                                <p>Foot Court Interior</p>
                                <p>Office Interior</p>
                            </div>
                    </div>
                        <div class="col">
                            <header style="font-weight:600;">Contact Us</header>
                            <div class="underline"></div>
                            <p><i class="fa-solid fa-phone"></i> 01710020301</p>
                            <p><i class="fa-solid fa-envelope"></i> htkkabir@gmail.com</p>
                        </div>
                </section>
            <li><a href="display-accessories.php">Accessories</a></li>
            <li><button class="contact-form-btn">Contact Us</button></li>
            </ul>
        </section>
    </nav>



<script>
$(document).ready(function(){

    var isLowerSectionVisible = false;

    $("#mobile-residential-interior").click(function() {
        if (!isLowerSectionVisible) {
            $(".lower-section-residential").show(); // Show lower section
            $(".fa-residential").css("transform", "rotate(180deg)"); // Rotate icon
        } else {
            $(".lower-section-residential").hide(); // Hide lower section
            $(".fa-residential").css("transform", "rotate(0deg)"); // Rotate icon back
        }
        
        // Toggle the state
        isLowerSectionVisible = !isLowerSectionVisible;
    });

    var isLowerSectionVisible2 = false;

    $("#mobile-commercial-interior").click(function() {
        if (!isLowerSectionVisible2) {
            $(".lower-section-commercial").show(); // Show lower section
            $(".fa-commercial").css("transform", "rotate(180deg)"); // Rotate icon
        } else {
            $(".lower-section-commercial").hide(); // Hide lower section
            $(".fa-commercial").css("transform", "rotate(0deg)"); // Rotate icon back
        }
        
        // Toggle the state
        isLowerSectionVisible2 = !isLowerSectionVisible2;
    });

    $(".fa-bars").click(function() {
      $(".sidebar").css("top", "80px"); 
      $(".fa-bars").css("display", "none"); 
      $(".cancel-nav-btn").css("display", "block"); 
    });

    $(".cancel-nav-btn").click(function() {
      $(".sidebar").css("top", "-1000px"); 
      $(".cancel-nav-btn").css("display", "none"); 
      $(".fa-bars").css("display", "block"); 
    });


});
</script>


</body>
</html>