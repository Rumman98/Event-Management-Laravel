<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventInfoTable;

class HomeController extends Controller
{
    function Index()
    {
        return view('Home');
    }

    function RunningEventPage()
    {
        $eventData = EventInfoTable::get();

        return view('RunningEventsPage', ['eventData'=>$eventData]);
    }

    function AllGalaryPage()
    {
        return view('AllGallery');
    }

    function ContactPage() 
    {
        return view('Contact');
    }

    
}
