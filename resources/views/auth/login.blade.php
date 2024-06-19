<x-guest-layout>
    <x-authentication-card>
   

        <x-validation-errors class="mb-4" />
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/loging.css">

<h1 class="headingLog" >Pierakstīšanās pierakstu sistēmai </h1> <br>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <!--<x-label for="email" value="{{ __('Email') }}" /> -->
                <label class="logLabel">Automašīnas reģistrācijas numurs</label>
                <x-input id="email" class="logInput" type="text" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="form-group">
               <!-- <x-label for="password" value="{{ __('Password') }}" /> --> 
               <label class="logLabel">Parole</label>
                <x-input id="password" class="logInput" type="password" name="password" required autocomplete="current-password" />
            </div>

           

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    
                @endif

                <x-button class="logButton">
                    {{ __('Pieslēgties') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>