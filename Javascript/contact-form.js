$(document).ready(function() {

    $('.contact-form-btn').click(function() {
        $('.contact-form').css('display', 'flex');
    });
    
    $('#cancel-form-btn').click(function(e) {
        e.preventDefault();
        $('.contact-form').css('display', 'none');
    });

});