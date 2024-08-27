<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTK Interior Design Website</title>

       <!-- CSS files -->
       <link rel="stylesheet" href="website-stylesheet/display-accessories.css?v=<?php echo time(); ?>">
       <link rel="stylesheet" href="website-stylesheet/pagination.css?v=<?php echo time(); ?>">
       <link rel="stylesheet" href="website-stylesheet/navbar.css?v=<?php echo time(); ?>">

        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="Javascript/pagination.js"></script>
        <script src="Javascript/add-to-cart.js"></script>

        <!-- !-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script>
        function truncateText(selector, maxWords) {
            const elements = document.querySelectorAll(selector);
            elements.forEach(element => {
                const words = element.innerText.split(' ');
                if (words.length > maxWords) {
                    element.innerText = words.slice(0, maxWords).join(' ') + '...';
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            truncateText('.dimension', 5); // Truncate to 5 words
        });
    </script>

</head>

<body>

      <?php

      // Start session
      session_start();

      // Define an empty array to store added items
      $cartItems = [];

      if (isset($_SESSION['cartItems'])) {
          $cartItems = $_SESSION['cartItems'];
      }

      include "navbar.php"; // Include your navbar file

      include "navbar-mobile.php"; // Include your navbar file

      // Database connection
      include "db-connection.php";

      // Pagination variables
      $limit = 6; // Number of accessories per page

      // Get current page
      if(isset($_GET['page'])){
          $page = $_GET['page'];
      } else {
          $page = 1;
      }

      // Calculate offset
      $offset = ($page - 1) * $limit;

      // Fetch accessories data from the database
      $sql = "SELECT * FROM accessories LIMIT $offset, $limit";
      $result = mysqli_query($mysqli, $sql);

      // Display accessories
      echo '<main class="accessories">';
      echo '<header style="margin-bottom:50px;">Order our Accessories from the comfort of your homes</header>';
      echo '<div class="checkout-btn-container"><button><a href="cart-checkout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Proceed to checkout</a></button></div>'; 
      echo '<div class="grid">';

      while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="col">';
          // Output the image data as base64 and specify the content type
          echo '<div class="image-container"><img src="data:image/jpeg;base64,'.base64_encode($row['accessory_image']).'" alt=""></div>';
          echo '<p>'.$row['accessory_name'].'</p>';
          echo '<p class="dimension">'.$row['dimension'].'</p>';
          echo '<p>৳ '.number_format($row['rate'], 0, '.', ',').'</p>';
          echo '<div class="order-btn-container"><button class="add-to-cart" data-name="' . $row['accessory_name'] . '" data-dimension="' . $row['dimension'] . '" data-rate="' . $row['rate'] . '" data-image="' . base64_encode($row['accessory_image']) . '">Add to cart</button></div>';
          echo '</div>';
      }

      echo '</div>';

      // Pagination
      $query = "SELECT COUNT(*) AS total FROM accessories";
      $result = mysqli_query($mysqli, $query);
      $data = mysqli_fetch_assoc($result);
      $total_pages = ceil($data['total'] / $limit);

      echo '<div class="pagination">';
      echo '<ul>';
      for ($i = 1; $i <= $total_pages; $i++) {
          echo '<li><a href="display-accessories.php?page='.$i.'">'.$i.'</a></li>';
      }
      echo '</ul>';
      echo '</div>';

      echo '</main>';

      // Close database connection
      mysqli_close($mysqli);

      // JavaScript: Send total pages to pagination function
      echo '<script>';
      echo 'var cartItems = ' . json_encode($cartItems) . ';';
      echo 'var totalPages = ' . $total_pages . ';';
      echo 'var currentPage = ' . $page . ';';
      echo 'createPagination(totalPages, currentPage);'; // Call pagination function with total pages and current page
      echo '</script>';

      ?>


</body>
</html>