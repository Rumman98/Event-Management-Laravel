<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function Index()
    {
        return view('Home');
    }

    function RunningEventPage()
    {
        return view('RunningEventsPage');
    }

    function AllGalaryPage()
    {
        return view('AllGallery');
    }

    function RegistrationPage()
    {
        return view('registration');
    }
}
