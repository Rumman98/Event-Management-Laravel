<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventInfoTable;
use App\VisitorModel;

class HomeController extends Controller
{
    function Index()
    {
        $UserIP=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address'=>$UserIP,'visit_time'=>$timeDate]);

        $HomeEventData = EventInfoTable::where('event_approval', 'Approved')
        ->orderBy('id','DESC')
        ->limit(3)
        ->get();

        return view('Home',['HomeEventData'=>$HomeEventData]);
    }

    function RunningEventPage()
    {
        $eventData = EventInfoTable::where('event_approval', 'Approved')->orderBy('id','DESC')->get();

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
