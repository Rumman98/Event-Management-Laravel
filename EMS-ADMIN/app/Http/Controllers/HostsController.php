<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HostsController extends Controller
{
    function HostsIndex(){
        return view('Hosts');
    }
}
