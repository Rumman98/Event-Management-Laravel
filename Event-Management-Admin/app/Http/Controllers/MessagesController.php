<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    function MessagesIndex(){
        return view('Messages');
    }
}
