$(document).ready(function() {
    $('form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'http://localhost/IWP/Login/check_login.php',
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
            }
        });
    });
});