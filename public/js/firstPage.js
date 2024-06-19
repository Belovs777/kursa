
jQuery(document).ready(function($) {  
   
    $(document).ready(function() 
    { 
        getRecords();
    //function after loginButton click 
        $('.loginButton').on('click', function() {    
        window.location.href = '/login';
    });
    //function after register button click
    $('.registerButton').on('click', function() {    
        window.location.href = '/register';
    });
        
        var row = "";
    //Function after click tomorow link
        $('#tomorow').click(function() {
        $.ajax({
            url: '/getFutureRecords',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                          
            row = ""; 
    //Make table empty before add new record
            $('#dataTable tbody').empty();
                $.each(data, function(index, record) {
    //Make variables from response
                var startTime = record.start_time;
                var endTime = record.end_time;
                var date = record.date;
                var driverId = record.driver_id;
                var placeId = record.place_name;
    //Add data to new row
                var row = '<tr>';
                row += '<td>' + placeId + '</td>';
                row += '<td>' + startTime + '</td>';
                row += '<td>' + endTime + '</td>';
                row += '<td>' + date + '</td>';
                row += '<td>' + driverId + '</td>';
                row += '</tr>';
                
    //Make new row 
                $('#dataTable tbody').append(row);
            });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('AJAX pieprasījums neizdevās: ' + textStatus + ', ' + errorThrown);
            }
        });
    });
    //Function after click to link today
        $('#today').click(function() {
            getRecords();
        });
        function getRecords(){
            row = ""; 
    //Make table empty before add new record
            $('#dataTable tbody').empty();
            $.ajax({
        url: '/getRecords', 
        type: 'GET',
        dataType: 'json',
        success: function(data) { console.log(data);
    //Add response data to variables
            $.each(data, function(index, record) {
                var startTime = record.start_time;
                var endTime = record.end_time;
                var date = record.date;
                var driverId = record.driver_truck;
                var placeId = record.place_name;
                var user_id = record.user_id; 
                var author = record.author;
    //Add data to new row
                var row = '<tr>';
                row += '<td>' + placeId + '</td>'; // Jūsu tabulā jābūt kolonnai, kur attēlot vietas ID
                row += '<td>' + startTime + '</td>';
                row += '<td>' + endTime + '</td>';
                row += '<td>' + date + '</td>';
                row += '<td>' + driverId + '</td>';
                row += '</tr>';
    
    //Add new row in table
                $('#dataTable tbody').append(row);
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('AJAX pieprasījums neizdevās: ' + textStatus + ', ' + errorThrown);
                    }
                });
            }
        });
    });