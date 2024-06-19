<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class driver_truck extends Model
{
    protected $table = 'driver_trucks';

    protected $fillable = [
       'id', 'truck_registration_number', 'password',
    ];

    // Papildu metodes, ja nepieciešams
}
