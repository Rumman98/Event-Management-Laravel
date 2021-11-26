<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventInfoTable;

class EventController extends Controller
{
    function AddEvent(Request $request)
    {
        $eventName        =  $request->input('eventName');
        $eventDes         =  $request->input('eventDes');
        $eventType        =  $request->input('eventType');
        $eventTime        =  $request->input('eventTime');
        $eventDate        =  $request->input('eventDate');
        $eventVenue       =  $request->input('eventVenue');
        $eventRegFee      =  $request->input('eventRegFee');
        $eventRegLastDate =  $request->input('eventRegLastDate');

        $addEventResult = EventInfoTable::insert([
            'event_name'=> $eventName,
            'event_description'=> $eventDes,
            'event_type'=> $eventType,
            'event_time'=> $eventTime,
            'event_date'=> $eventDate,
            'event_venue'=> $eventVenue,
            'event_registration_fee'=> $eventRegFee,
            'event_reg_last_date'=> $eventRegLastDate
        ]);

        if($addEventResult == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }

    }
}
