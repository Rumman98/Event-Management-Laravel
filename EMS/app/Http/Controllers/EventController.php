<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\EventInfoTable;
use App\UserHostModel;

class EventController extends Controller
{
    function AddEvent(Request $request)
    {
        $value            = Session::get('phone_number');
        $eventName        =  $request->input('eventName');
        $eventDes         =  $request->input('eventDes');
        $eventType        =  $request->input('eventType');
        $eventTime        =  $request->input('eventTime');
        $eventDate        =  $request->input('eventDate');
        $eventVenue       =  $request->input('eventVenue');
        $eventRegFee      =  $request->input('eventRegFee');
        $eventRegLastDate =  $request->input('eventRegLastDate');

        $addEventResult = EventInfoTable::insert([
            'event_name'             => $eventName,
            'event_description'      => $eventDes,
            'event_type'             => $eventType,
            'event_time'             => $eventTime,
            'event_date'             => $eventDate,
            'event_venue'            => $eventVenue,
            'event_registration_fee' => $eventRegFee,
            'event_reg_last_date'    => $eventRegLastDate,
            'event_creator_phone_no' => $value,
            'event_approval'         => 'Pending'
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

    function GetEventDetails()
    {
        $value            = Session::get('phone_number');
        $eventData        = json_encode(EventInfoTable::where('event_creator_phone_no', $value)->get());
        return $eventData;
    }

    function EventDetailsforEdit(Request $request)
    {
        $eventId          = $request->input('eventId');
        $value            = Session::get('phone_number');

        $details = EventInfoTable::where('id', '=', $eventId)->where('event_creator_phone_no', $value)->get();

        return $details;
    }

    function EventUpdate(Request $request)
    {
        $value            = Session::get('phone_number');
        $id               = $request->input('event_id');
        $EventName        = $request->input('EventName');
        $EventDes         = $request->input('EventDes');
        $EventType        = $request->input('EventType');
        $EventTime        = $request->input('EventTime');
        $EventDate        = $request->input('EventDate');
        $EventVenue       = $request->input('EventVenue');
        $EventRegAmount   = $request->input('EventRegAmount');
        $EventRegLastDate = $request->input('EventRegLastDate');

        $result = EventInfoTable::where('id', $id)->where('event_creator_phone_no', $value)->update([
            'event_name'             => $EventName,
            'event_description'      => $EventDes,
            'event_type'             => $EventType,
            'event_time'             => $EventTime,
            'event_date'             => $EventDate,
            'event_venue'            => $EventVenue,
            'event_registration_fee' => $EventRegAmount,
            'event_reg_last_date'    => $EventRegLastDate
        ]);

        if($result == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    function EventDelete(Request $request)
    {
        $id = $request->input('event_id');

        $result = EventInfoTable::where('id', $id)->delete();

        if($result == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    function RegisterEventPage()
    {
        $value = Session::get('phone_number');

        if($value == null)
        {
            return view('login');
        }
        else
        {
            $userData = UserHostModel::where('phone_number', $value)->get();


            return view('RegisterEvent', [
                'userData' => $userData
            ]);
        }
    }


    function EventDetailsforModal(Request $request)
    {
        $id = $request->input('eventDetailsid');

        $result = json_encode(EventInfoTable::where('id', $id)->get());

        return $result;

    }


    function EventSummary(){
        return view('EventSummary');
    }
}
