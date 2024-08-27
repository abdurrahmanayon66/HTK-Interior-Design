$(document).ready(function() {

    // Click event for Add to cart button
    $('.add-to-cart').on('click', function() {
        var name = $(this).data('name');
        var dimension = $(this).data('dimension');
        var rate = $(this).data('rate');
        var image = $(this).data('image');
        
            // Add item to cart
            cartItems.push({
                accessory_name: name,
                dimension: dimension,
                rate: rate,
                accessory_image: image
            });
            // Change button text to 'Added!'
            $(this).text('Added!');
            // Disable the button
            $(this).prop('disabled', true);

        // Update session variable
        $.ajax({
            url: 'update-cart.php',
            type: 'POST',
            data: {cartItems: cartItems},
            success: function(response) {
                console.log('Cart updated successfully');
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});