 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/register.css">
</head>
<body>
<div class="container mt-5">
        <h1 class="heading1">Reģistrēties sistēmā</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('register') }}">
                    @csrf <!-- CSRF token -->

                    <div class="form-group">
                        <label for="name">Vārds</label>
                        <input id="name" type="text" name="name" class="form-control" placeholder="Vārds">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Auto reģistrācijas numurs</label>
                        <input id="email" type="text" name="email" class="form-control" placeholder="Auto reģistrācijas numurs">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Parole</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Parole">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Apstipriniet paroli</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Apstipriniet paroli">
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Reģistrēties</button>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>
