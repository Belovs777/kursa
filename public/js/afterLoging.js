//Add jquery libraly


  jQuery(document).ready(function($) {  
   
    $(document).ready(function() 
    { 
    //Function for delete link
        $('#dataTable').on('click', '#delete', function(e) {               
            e.preventDefault(); 
    //Get post_id from link delete
            var postId = $(this).data('post-id');
    //Send request to controller
            $.ajax({
        url: '/deletePost',
        type: 'GET',
        data: {
    //Send post_id to deletePost function
                    post_id: postId 
                },
                dataType: 'json',
                success: function(response) {
    //Make notifiaction for success record delete
         alert("Pieraksts ir veiksmīgi izdzēsts"); 
        },
        error: function(xhr, status, error) {
            console.error(error);
           
        }
    });
    });
        getRecords();    
        var row = "";
        $('#tomorow').click(function() {
        $.ajax({
            url: '/getFutureRecords',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                          
            row = ""; 
            $('#dataTable tbody').empty();
                $.each(data, function(index, record) {
                var startTime = record.start_time;
                var endTime = record.end_time;
                var date = record.date;
                var driverId = record.driver_id;
                var placeId = record.place_name;
                var user_id = record.driver_id; 
                var author = record.author;
                var post_id = record.post_id;
                
                // Izveidojam jaunu rindu tabulā ar iegūtajiem datiem
                var row = '<tr>';
                row += '<td>' + placeId + '</td>'; // Jūsu tabulā jābūt kolonnai, kur attēlot vietas ID
                row += '<td>' + startTime + '</td>';
                row += '<td>' + endTime + '</td>';
                row += '<td>' + date + '</td>';
                row += '<td>' + driverId + '</td>';
                if (user_id == author) {   
    
                    row += '<td>' + '<a href="#" class="linkEdit" id="edit" data-post-id ="' + post_id + '">Rediģēt</a>' + '</td>';
    row += '<td>' + '<a href="#" class="linkEdit" id="delete" data-post-id ="' + post_id + '">Dzēst</a>'+'</td>';
                }else {
                row+= '<td></td>';
                row += '<td></td>'; // Ja šis ieraksts nav pašreizējā lietotāja publicētais, izmantojam tukšu šūnu
            }
                row += '</tr>';
                
                // Pievienojam jauno rindu tabulai
                $('#dataTable tbody').append(row);
    
                // Pievienojam lauku zem rindas ar vietu informāciju
                //var placeField = '<tr><td colspan="5">' + placeId + '</td></tr>';
              //  $('#dataTable tbody').append(placeField);
            });
                // Attēlojiet datus savā tabulā vai veiciet citus nepieciešamos pasākumus
                console.log(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('AJAX pieprasījums neizdevās: ' + textStatus + ', ' + errorThrown);
            }
        });
    });
      $('#today').click(function() {
            getRecords();
        });
        function getRecords(){
            row = ""; 
            $('#dataTable tbody').empty();
            $.ajax({
        url: '/getRecords', // Laravel maršruts, kas atbilst kontroliera metodei
        type: 'GET',
        dataType: 'json',
        success: function(data) { console.log(data);
    //Add all records data to variables
            $.each(data, function(index, record) {
                var startTime = record.start_time;
                var endTime = record.end_time;
                var date = record.date;
                var driverId = record.driver_truck;
                var placeId = record.place_name;
                var user_id = record.driver_id; 
                var author = record.author;
                var post_id = record.post_id;
    //Make new line in table 
                var row = '<tr>';
        row += '<td>' + placeId + '</td>'; 
        row += '<td>' + startTime + '</td>';
        row += '<td>' + endTime + '</td>';
        row += '<td>' + date + '</td>';
        row += '<td>' + driverId + '</td>';
    //Make check if user_id and record author is same people
        if (user_id == author) {   
    //If is true add link for delete and edit record
        row += '<td>' + '<a href="#" class="linkEdit" id="edit" data-post-id ="' + post_id + '">Rediģēt</a>' + '</td>';
        row += '<td>' + '<a href="#" class="linkEdit" id="delete" data-post-id ="' + post_id + '">Dzēst</a>'+'</td>';
            }else {
    //If is false make empyty collums
                row += '<td></td>';
                row += '<td></td>'; 
            }
                row += '</tr>';
                
    //Make new line for table
                $('#dataTable tbody').append(row);
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('AJAX pieprasījums neizdevās: ' + textStatus + ', ' + errorThrown);
        }
    });
        }
    //Function after click to link edit
        $('#dataTable').on('click', '#edit', function(e) {               
            e.preventDefault(); 
    //Get selected record id 
            var postId = $(this).data('post-id');
            $.ajax({
        url: '/getPost',
        type: 'GET',
        data: {
    //Send record id to controller
                    post_id: postId 
                },
                dataType: 'json',
                success: function(response) {
    //Get record data and add to modal input fields
            $('#time').val(response.start_time);
            $('#date').val(response.date);
            $('#post_id').val(response.post_id);
            $('#place').val(response.place_id);
    //Open modal window with set data
            $('#modalEntry').modal('show');
        },
        error: function(xhr, status, error) {
            console.error(error); 
    //Alert for error if cant get data
            alert('Nevarēja iegūt ieraksta datus');
        }
    });
    });
    //Function save after button save click
        $('.save').click(function(e) {
            e.preventDefault(); 
    //Get data from modal window input fields
            var place_id = $('#place').val();
            var post_id = $('#post_id').val(); 
            var time = $('#time').val();
            var date = $('#date').val();
    //Send data to controller
            $.ajax({
        url: '/getPlaces',
        type: 'GET',
        data: {
    //Add all variable data 
                    place: place_id, 
                    time: time,
                    date: date, 
                    post_id: post_id
                },
                dataType: 'json',
                success: function(response) {
                    $('#start_time_error').hide().text('');

                    if (!response.available) {
                        $('#start_time_error').text(response.message).show();
                    } else {
                        // Apstrādājiet gadījumu, kad laiks ir pieejams
                    
            if (response.success) {
                window.location.href = '/dashboard';
    
    //Alert for if data saved success
                alert('Dati veiksmīgi saglabāti!');
            } else {
    //Alert for if data dont saved
    
                alert('Datu saglabāšana neizdevās!');
            }}
        },
        error: function(xhr, status, error) {
            console.error(error); 
    //Alert if problem in server and cant save data
    window.location.href = '/dashboard';
    
    //Alert for if data saved success
                alert('Dati veiksmīgi saglabāti!');
        }
    });
        });
    });
    });