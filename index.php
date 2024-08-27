<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTK Interior Design Website</title>

       <!-- CSS files -->
       <link rel="stylesheet" href="website-stylesheet/body.css?v=<?php echo time(); ?>">
       <link rel="stylesheet" href="website-stylesheet/contact-form.css?v=<?php echo time(); ?>">

       <script src="https://unpkg.com/scrollreveal"></script>
       <script src="Javascript/scroll-reveal.js"></script>

</head>
<body>
    
    <?php  
        include "navbar-mobile.php";

        include "navbar.php";

        include "home.php";

        include "contact-form.php";

        include "services.php";

        include "about-us.php";

        include "projects.php";

        include "accessories.php";

        include "experience.php";

        include "process.php";

        include "contact-us.php";

        include "footer.php";
    ?>

</body>
</html>