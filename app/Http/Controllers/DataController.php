<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\time;
use App\Models\place;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function deletePost (Request $request){
        $post = Time::findOrFail($request -> post_id);
        
 // Delete entry
        $post->delete();
//Return success message if post is delete
    }
    public function getPost (Request $request){
    $post_id = $request->post_id; 
    $record = Time::find($post_id); 
    return [
        'start_time' => $record->start_time,
        'date' => $record->date,
        'place_id' => $record->place_id,
        'post_id' => $post_id
    ];
    }
    public function getPlaces(Request $request)
    {
          // Validējam ienākošos datus, ja nepieciešams
          $validatedData = $request->validate([
            'time' => 'required',
            'date' => 'required|date',
        ]);
        $start_time_seconds = strtotime($request->time);

// Get end time after 45 minutes
$end_time_seconds = $start_time_seconds + (45 * 60);
$date= $request->date; 
$place_id = $request->place;
$start_time = $request->time;
// convert back to format "H:i"
$end_time = date('H:i', $end_time_seconds);
        $post_id = $request->post_id; 
        $conflictingBooking = Time::where('place_id', $place_id)
        ->where('date', $date)
        ->where(function($query) use ($start_time, $end_time) {
            $query->whereBetween('start_time', [$start_time, $end_time])
                  ->orWhereBetween('end_time', [$start_time, $end_time])
                  ->orWhere(function($q) use ($start_time, $end_time) {
                      $q->where('start_time', '<', $start_time)
                        ->where('end_time', '>', $end_time);
                  });
        })
        ->exists();

        if ($conflictingBooking) {
            return response()->json(['available' => false, 'message' => 'Šis sākuma laiks jau ir aizņemts.']);
        } else {
          //  return response()->json(['available' => true, 'message' => 'Šis sākuma laiks ir pieejams.']);
        
//check or record exists
        if ($post_id > 0 ){
//Get record data and update record
        $record = Time::find($post_id);
        $record->start_time = $request->time;
        $record->end_time = $end_time; 
        $record->date = $request->date;
        $record->place_id = $request->place;
        $record->save();
        } 
//Else if record dont exist
        else {
//Get user id and add to variable
    $driver_id = Auth::id();
//Save record to database with all variables
    $data = new Time();
    $data->start_time = $request->time;
    $data->end_time = $end_time;
    $data->date = $request->date;
    $data->driver_id = $driver_id; 
    $data->place_id = $request->place; 

    $data->save();
        }
    }
// Return success respone with message
    }

    public function getRecords()
{
    $today = Carbon::today();
// Return only today records
    $recordsToday = Time::whereDate('date', $today)->get()->map(function ($record) {
// Find place with place_id
        $place = Place::find($record->place_id);
        $driver = User::find($record->driver_id);
        $driverEmail = $driver ? $driver->email : null;

// If place is found return place name if not return null
        $placeName = $place ? $place->ramp_name : null;
        $driver_id = Auth::id();
        $driverss = ($record->driver_id);
        $post_id = $record->id; 
// Make object and return all data form today record
        return [
            'start_time' => $record->start_time,
            'end_time' => $record->end_time,
            'date' => $record->date,
            'driver_truck' => $driverEmail,
            'place_name' => $placeName, 
            'driver_id' => $driver_id, 
            'author' => $driverss, 
            'post_id' => $post_id
        ];
    });
//Return json data with record object
    return response()->json($recordsToday);
}
//Function for get future records
public function getFutureRecords()
{
// Get tomorrow date 
    $tomorrow = date('Y-m-d', strtotime('+1 day'));
//Return only tomorrow records
    $futureRecords = Time::whereDate('date', '=', $tomorrow)->get()->map(function ($record) {
// Find place with place_id
        $place = Place::find($record->place_id);
        $driver = User::find($record->driver_id);
        $driverEmail = $driver ? $driver->email : null;

// If place is found return place name if not return null
        $placeName = $place ? $place->ramp_name : null;
        $driver_id = Auth::id();
        $driverss = ($record->driver_id);
        $post_id = $record->id; 
//Make new object with future records
        return [
            'start_time' => $record->start_time,
            'end_time' => $record->end_time,
            'date' => $record->date,
            'driver_id' => $driverEmail,
            'place_name' => $placeName,
            'driver_id' => $driver_id, 
            'author' => $driverss, 
            'post_id' => $post_id
        ];
    });
//Return json with future record 
    return response()->json($futureRecords);
}

}
