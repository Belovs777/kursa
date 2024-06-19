<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pierakstu tabula</title>
    <!-- Import css style from css folder -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/tableEntry.css">
<!-- Add javascript for functionality -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('js/afterLoging.js') }}"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  
    <h1 class="heading1">Pierakstu tabula</h1>
    <a href="#" class="linkToday" id="today">Šodien</a>
    <a href="#" class="linkTomorow" id="tomorow">Rīt</a>
    @auth
        <!-- Logout button for user logout-->
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">Atslēgties</button>
        </form>
    @endauth
<!-- Table for records show -->
    <table class="tableEntry" id="dataTable"> 
        <thead class="thead-dark">
            <tr>
                <th>Vieta</th>
                <th>Sākuma laiks</th>
                <th>Beigu laiks</th>
                <th>Pieraksta datums</th>
                <th>Kravas automašīnas numurs</th>
                <th>Rediģēšana</th>
                <th>Dzēšana</th>
            </tr>
        </thead>
        <tbody>
            <!-- Table body text here -->
        </tbody>
    </table>
    <!-- Button for  modal open -->
<button type="button" class="modalOpen" data-bs-toggle="modal" data-bs-target="#modalEntry">
Veikt pierakstu 
</button>

<!-- Modal window -->
<div class="modal" id="modalEntry"  >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modalHeading " id="exampleModalLabel">Pieraksts</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Hidden input for post_id -->
      <input type="hidden" id="post_id" name="post_id" value="">
        @csrf
        <div class="form-group">
            <label class="modalLabel" for="place">Rampu izvēle:</label>
            <!-- Import javascript for show place in select -->
            <script src="{{ asset('js/selectShow.js') }}"></script>
            <select class="form-control" id="place"></select>
        </div>
        
        <div class="form-group">
            <label class="modalLabel" for="time">Laiks:</label>
            <input type="time" id="time" name="time" class="form-control">
            <div class="error-message" id="start_time_error" style="display: none; color: red;"></div>
        </div>
        
        <div class="form-group">
            <label class="modalLabel" for="date">Datums:</label>
            <input type="date" id="date" name="date" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="close" data-bs-dismiss="modal">Aizvērt</button>
        <button type="button" class="save">Saglabāt</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
