// public/js/buttonAdd.js

$(document).ready(function() {
    $('#submitButton').click(function() {
        // Make a POST AJAX request when the button is clicked
        $.ajax({
            type: 'POST',  // <-- Ensure this is set to 'POST'
            url: '/add',
            data: {
                // You can send data along with the request if needed
                // key: value
            },
            success: function(response) {
                // Handle the response from the server
                if (response.success) {
                    // Add a new row to the table with the received data
                    $('#dataTable tbody').append('<tr><td>' + response.id + '</td><td>' + response.data + '</td></tr>');
                } else {
                    console.error('Error: ' + response.message);
                }
            },
            error: function(error) {
                // Handle errors
                console.error(error);
            }
        });
    });
});
