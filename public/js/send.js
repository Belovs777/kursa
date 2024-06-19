// send.js

document.getElementById('submitForm').addEventListener('click', function() {
    // Get the input value
    var email = document.getElementById('email').value;

    // Make the Ajax request
    axios.post('/ajax-submit', {
        email: email,
        // Other data if needed
    })
    .then(function(response) {
        console.log(response.data.message);
        // Handle the response as needed
    })
    .catch(function(error) {
        console.error('Error:', error);
        // Handle errors if necessary
    });
});