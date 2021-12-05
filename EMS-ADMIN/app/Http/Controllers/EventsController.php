<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    function EventsIndex(){
        return view('Events');
    }
}
