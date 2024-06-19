<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\place;

class showPlace extends Controller
{ public function showData()
    {
    $data = place::all(['ramp_name','id']); // Retrieve data from the database
    return response()->json($data);
}}
