<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\EventInfoTable;
use App\UserHostModel;
use App\EventRegistrationModel;

class EventController extends Controller
{
    function AddEvent(Request $request)
    {
        $value            = Session::get('phone_number');
        $eventName        =  $request->input('eventName');
        $eventDes         =  $request->input('eventDes');
        $eventType        =  $request->input('eventType');
        $eventPayMethod   =  $request->input('eventPayMethod');
        $eventPayAccNo    =  $request->input('eventPayAccNo');
        $eventTime        =  $request->input('eventTime');
        $eventDate        =  $request->input('eventDate');
        $eventVenue       =  $request->input('eventVenue');
        $eventRegFee      =  $request->input('eventRegFee');
        $eventRegLastDate =  $request->input('eventRegLastDate');

        $addEventResult = EventInfoTable::insert([
            'event_name'             => $eventName,
            'event_description'      => $eventDes,
            'event_type'             => $eventType,
            'event_payment_method'   => $eventPayMethod,
            'event_pay_acc_no'       => $eventPayAccNo,
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
        $EventPayMethod   = $request->input('EventPayMethod');
        $EventPayAccNo    = $request->input('EventPayAccNo');
        $EventTime        = $request->input('EventTime');
        $EventDate        = $request->input('EventDate');
        $EventVenue       = $request->input('EventVenue');
        $EventRegAmount   = $request->input('EventRegAmount');
        $EventRegLastDate = $request->input('EventRegLastDate');

        $result = EventInfoTable::where('id', $id)->where('event_creator_phone_no', $value)->update([
            'event_name'             => $EventName,
            'event_description'      => $EventDes,
            'event_type'             => $EventType,
            'event_payment_method'   => $EventPayMethod,
            'event_pay_acc_no'       => $EventPayAccNo,
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

        $event_info = EventInfoTable
        ::join('userhosttable', 'eventinfotable.event_creator_phone_no', '=', 'userhosttable.phone_number')
        ->where('eventinfotable.id', $id)
        ->get();

        $result = json_encode($event_info);

        return $result;

    }


    function EventSummary()
    {
        $eid =  $_GET['event-id'];

        $eventInfo = EventInfoTable::where('id', $eid)->get();     
        
        $eventMemberDetails = EventRegistrationModel
        ::join('eventinfotable', 'eventregistration.event_id', '=', 'eventinfotable.id')
        ->where('event_id', $eid)
        ->get();

        return view('EventSummary',[
            'EventInfo'=>$eventInfo,
            'EventMemberDetails'=>$eventMemberDetails
        ]);
    }

    function UserRegistrationOnEvent(Request $request)
    {

        $value = Session::get('phone_number');

        $user_name      = $request->input('user_name');
        $user_phone_no  = $request->input('user_phone_no');
        $event_name     = $request->input('event_name');
        $event_type     = $request->input('event_type');
        $event_date     = $request->input('event_date');
        $event_id       = $request->input('event_id');
        $user_acc_no    = $request->input('user_acc_no');
        $transaction_no = $request->input('transaction_no');
        $status         = 'pending';

        $check_host = EventInfoTable::where('event_creator_phone_no',$user_phone_no)->where('id', $event_id)->count();
        if($check_host != 1)
        {
            $transaction_check = EventRegistrationModel::where('transaction_no','=', $transaction_no)->count();

            if($transaction_check == 1)
            {
                return 2;
            }
            else
            {
                $result = EventRegistrationModel::insert([
                    'user_name'     =>$user_name,
                    'user_phone_no' =>$user_phone_no,
                    'event_name'    =>$event_name,
                    'event_type'    =>$event_type,
                    'event_date'    =>$event_date,
                    'event_id'      =>$event_id,
                    'user_acc_no'   =>$user_acc_no,
                    'transaction_no'=>$transaction_no,
                    'stutus'        =>$status
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
        }
        else
        {
            return 3;
        }
    }

    function userStatus(Request $request)
    {
        $phone_no = $request->input('phone_no');
        $transaction_no = $request->input('transaction_no');

        $userStatus = EventRegistrationModel::where('user_phone_no', $phone_no)->where('transaction_no', $transaction_no)->get();

        return $userStatus;
    }

    function updateUserStatus(Request $request)
    {
        $user_phone_no = $request->input('user_phone_no');
        $transaction_no = $request->input('transaction_no');
        $userStatus = $request->input('userStatus');

        $result = EventRegistrationModel::where('user_phone_no', $user_phone_no)->where('transaction_no', $transaction_no)->update(['stutus'=>$userStatus]);

        if($result == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
