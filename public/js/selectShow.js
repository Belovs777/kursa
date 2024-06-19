$(document).ready(function () {
//Ajax request to controller for option
    $.ajax({
        url: '/showData',
        method: 'GET',
        success: function (response) {
            console.log('Full Response:', response);
            if (response && Array.isArray(response)) {
                
                let select = $('#place');
//Foreach for make options with place name
                response.forEach(function (item) {
                    let option = '<option value="' + item.id + '">' + item.ramp_name + '</option>';
//Add select to html 
                    select.append(option);
                });
            } else {
//Return error if data can recived
                console.error('Invalid or missing data in the AJAX response.');
            }
        },
        error: function (error) {
            console.error('Error in AJAX request:', error);
        }
    });
});
