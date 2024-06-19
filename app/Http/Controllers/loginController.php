<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\driver_truck;

use function Ramsey\Uuid\v1;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('truck_registration_number', 'password');

        // Atrodam lietotāju pēc reģistrācijas numura
       if( $user = driver_truck::where('truck_registration_number', $credentials['truck_registration_number'])->first()){
        $request->session()->put('id', $user->id);
        
                    // Jaunas sesijas iestatīšana, lai novērstu sesiju pārslēgšanos
                    session()->regenerate();
        
                    // Pāradresējam uz kādu citu lapu pēc pieslēgšanās
                    return redirect()->route('welcome')->with('success', 'Login successful');
       }

        // Pārbaudam vai lietotājs eksistē un vai parole ir pareiza
      /*  if ($user && password_verify($credentials['password'], $user->password)) {
            // Ja parole ir pareiza, iestatām lietotāja sesiju
            $request->session()->put('id', $user->id);
dd($request);
            // Jaunas sesijas iestatīšana, lai novērstu sesiju pārslēgšanos
            session()->regenerate();

            // Pāradresējam uz kādu citu lapu pēc pieslēgšanās
            return redirect()->route('welcome')->with('success', 'Login successful');
        } else {
            // Ja lietotājs nav atrasts vai parole ir nepareiza, atgriežam kļūdas ziņojumu
            return redirect()->back()->with('error', 'Invalid credentials');
        }*/
    }

    // Papildu metodes, ja nepieciešams
}
