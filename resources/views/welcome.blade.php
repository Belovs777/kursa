<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pierakstu tabula</title>
    <!-- Add css styles -->
    
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/tableFirstPage.css">
    <!-- Add javascript for functionality -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('js/firstPage.js') }}"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1 class="heading1">Pierakstu tabula</h1>
<!--Add to links  -->
    <a href="#" class="linkToday" id="today">Šodien</a>
    <a href="#" class="linkTomorow" id="tomorow">Rīt</a>
    <button type="button" id="loginButton" class="loginButton">Pieslēgties</button>
    <button type="button" id="registerButton" class="registerButton">Reģistrēties</button>
<!-- Make table for record -->
    <table class="tableEntry " id="dataTable"> 
        <thead class="thead-dark">
            <tr>
                <th>Vieta</th>
                <th>Sākuma laiks</th>
                <th>Beigu laiks</th>
                <th>Pieraksta datums</th>
                <th>Kravas automašīnas numurs</th>
            </tr>
        </thead>
        <tbody>
            <!-- Table content place -->
        </tbody>
    </table>
   
</body>
</html>
