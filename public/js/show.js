$(document).ready(function () {
    $.ajax({
        url: '/showData',
        method: 'GET',
        success: function (response) {
            console.log('Full Response:', response);
            if (response && Array.isArray(response)) {
                
                let table = $('#dataTable tbody');

                response.forEach(function (row) {
                    console.log(row);
                    let newRow = '<tr><td>' + row.ramp_name + '</td>';
                    table.append(newRow);
                });
            } else {
                console.error('Invalid or missing data in the AJAX response.');
            }
        },
        error: function (error) {
            console.error('Error in AJAX request:', error);
        }
    });
});
