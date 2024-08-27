<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTK Interior Design Navbar</title>

    <!-- jquery link -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   
    <!-- CSS files -->
    <link rel="stylesheet" href="website-stylesheet/navbar.css?v=<?php echo time(); ?>">

    <!-- !-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <nav class="navbar">
        <section class="upper-section">
        <span class="logo">HTK Interior Design</span>
        <section>
            <ul>
            <li><a href="index.php">Home</a></li>
            <li id="residential-interior"><a>Residential Interior </a><i class="fa-residential fa-solid fa-chevron-down"></i></li>
            <li id="commercial-interior"><a>Commercial Interior</a> <i class="fa-commercial fa-solid fa-chevron-down"></i></li>
            <li><a href="display-accessories.php">Accessories</a></li>
            <li><button class="contact-form-btn">Contact Us</button></li>
            </ul>
        </section>
        </section>
        <section class="lower-section lower-section-residential">
           <div class="col"><div class="image-container"><img src="./images/residential-image.jpg" alt=""></div></div>
           <div class="col">
                <header>Residential Interior</header>
                <div class="underline"></div>
                <div class="grid">
                    <p>Residential Interior Design</p>
                    <p>Master Bedroom Design</p>
                    <p>Luxurious Toilet Design</p>
                    <p>kitchen Cabinet Design</p>
                    <p>Child Bedroom Design</p>
                    <p>Drawing Room Design</p>
                    <p>Family Living Room</p>
                    <p>Study Unit Design</p>
                    <p>Tv Unit Design</p>
                </div>
            </div>
           <div class="col">
                <header>Contact Us</header>
                <div class="underline"></div>
                <p><i class="fa-solid fa-phone"></i> 01710020301</p>
                <p><i class="fa-solid fa-envelope"></i> htkkabir@gmail.com</p>
            </div>
        </section>
        <section class="lower-section lower-section-commercial">
           <div class="col"><div class="image-container"><img src="./images/commercial-image.jpg" alt=""></div></div>
           <div class="col">
                <header>Commercial Interior</header>
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
                <header>Contact Us</header>
                <div class="underline"></div>
                <p><i class="fa-solid fa-phone"></i> 01710020301</p>
                <p><i class="fa-solid fa-envelope"></i> htkkabir@gmail.com</p>
            </div>
        </section>
    </nav>


<script>
$(document).ready(function() {
    let isResidentialOpen = false;
    let isCommercialOpen = false;

    $("#residential-interior").click(function() {
        if (isResidentialOpen) {
            $(".lower-section-residential").css("top", "-600px");
            $(".fa-residential").css("transform", "rotate(0deg)");
        } else {
            $(".lower-section-residential").css("top", "80px");
            $(".fa-residential").css("transform", "rotate(180deg)");
        }
        isResidentialOpen = !isResidentialOpen;
    });

    $("#commercial-interior").click(function() {
        if (isCommercialOpen) {
            $(".lower-section-commercial").css("top", "-600px");
            $(".fa-commercial").css("transform", "rotate(0deg)");
        } else {
            $(".lower-section-commercial").css("top", "80px");
            $(".fa-commercial").css("transform", "rotate(180deg)");
        }
        isCommercialOpen = !isCommercialOpen;
    });
});

</script>


</body>
</html>