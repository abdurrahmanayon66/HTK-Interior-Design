$(document).ready(function() {
    // Plus button click event
    $(document).on('click', '.add', function(e) {
        e.preventDefault();
        var input = $(this).siblings('.quantity');
        var newValue = parseInt(input.val()) + 1;
        input.val(newValue);
        updateTotals(); // Update totals when quantity changes
    });

    // Minus button click event
    $(document).on('click', '.minus', function(e) {
        e.preventDefault();
        var input = $(this).siblings('.quantity');
        var newValue = parseInt(input.val()) - 1;
        if (newValue >= 1) {
            input.val(newValue);
            updateTotals(); // Update totals when quantity changes
        }
    });

    // Trash button click event to remove item from cart
    $(document).on('click', '.remove-accessories-btn', function(e) {
        e.preventDefault();
        var row = $(this).closest('.row');
        var accessoryName = row.find('#accessory-name').text(); // Get the unique name of the accessory

        row.remove();

        // Remove the item from the session data using AJAX
        $.ajax({
            type: 'POST',
            url: 'remove-accessory.php',
            data: { accessoryName: accessoryName }, // Pass the name of the accessory
            success: function(response) {
                if (response === 'success') {
                    updateTotals();
                    window.location.href = 'cart-checkout.php';
                } else {
                    alert('Error removing item from cart. Please try again.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while processing the request. Please try again later.');
            }
        });
    });

    // Function to update subtotal, VAT, and total
    function updateTotals() {
        var subtotal = 0;
        var vatPercentage = 0.18; // VAT rate (18%)
        var vat = 0;
        var total = 0;

        // Loop through each row in the cart
        $('.row').each(function() {
            var quantity = parseInt($(this).find('.quantity').val());
            var rateString = $(this).find('.amount').text(); // Get the text containing the rate
            var rate = parseFloat(rateString.replace(/[^0-9.-]+/g, "")); // Remove non-numeric characters and parse as float

            // Add the quantity * rate of each item to the subtotal
            subtotal += quantity * rate;
        });

        // Calculate VAT
        vat = subtotal * vatPercentage;

        // Calculate total
        total = subtotal + vat;

        // Update the subtotal, VAT, and total in the DOM
        $('.subtotal').text('৳ ' + subtotal.toLocaleString('en-US', {maximumFractionDigits: 2}));
        $('.vat').text('৳ ' + vat.toLocaleString('en-US', {maximumFractionDigits: 2}));
        $('.total').text('৳ ' + total.toLocaleString('en-US', {maximumFractionDigits: 2}));
    }

    $('.checkout-btn').click(function() {
        $('.client-details-form').show();
    });
    
    $('#cancel-checkout-btn').click(function(e) {
        e.preventDefault();
        $('.client-details-form').hide();
    });
});
