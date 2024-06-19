<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

   // resources/js/buttonAdd.js

   $(document).ready(function() {
    // Add click event listener to the button
    $('#submitButton').click(function() {
        // Make an AJAX request when the button is clicked
        $.ajax({
            type: 'POST',
            url: '/process-button-click',
            data: {
                // You can send data along with the request if needed
                // key: value
            },
            success: function(response) {
                // Handle the response from the server
                console.log(response);
            },
            error: function(error) {
                // Handle errors
                console.log(error);
            }
        });
    });
});

