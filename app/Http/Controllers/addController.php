<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class addController extends Controller
{ public function processButtonClick(Request $request)
    {
        // Your processing logic here

        // Simulate data retrieval (replace with your actual data)
        $data = [
            'id' => 1,
            'data' => 'New Data',
        ];

        return response()->json(['success' => true, 'id' => $data['id'], 'data' => $data['data']]);
    }}
