<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use App\EventInfoTable;

class EventsController extends Controller
{
    function EventsIndex(){
        return view('Events');
    }

    function GetEventsData(){
        $result = json_encode(EventInfoTable::orderby('id','desc')->get());
        return $result;
       }
}
