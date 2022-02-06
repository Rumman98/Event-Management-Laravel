<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\UserHostModel;
use App\EventRegistrationModel;
use App\PhotoModel;

class ProfileController extends Controller
{
    function UserProfile()
    { 
        $value = Session::get('phone_number');

            $userData = UserHostModel::where('phone_number', '=', $value)->get();

            $userPhoto = PhotoModel::where('user_phone_no', '=', $value)->orderBy('id', 'desc')->take(1)->get();

            $registerdEvents = EventRegistrationModel
            ::join('eventinfotable', 'eventregistration.event_id', '=', 'eventinfotable.id')
            ->join('userhosttable', 'eventinfotable.event_creator_phone_no', '=', 'userhosttable.phone_number')
            ->where('user_phone_no', $value)
            ->get();


            
            return View('UserProfile',[
                'UserData'=>$userData,
                'RegisterdEvents'=> $registerdEvents,
                'userPhoto'=>$userPhoto,
                'value'=>$value
            ]);
    }
    function HostProfile()
    { 
        $value = Session::get('phone_number');


        $hostData = UserHostModel::where('phone_number', '=', $value)->get();
        $hostPhoto = PhotoModel::where('user_phone_no', '=', $value)->orderBy('id', 'desc')->take(1)->get();

        $hostRegisterdEvents = EventRegistrationModel
            ::join('eventinfotable', 'eventregistration.event_id', '=', 'eventinfotable.id')
            ->join('userhosttable', 'eventinfotable.event_creator_phone_no', '=', 'userhosttable.phone_number')
            ->where('user_phone_no', $value)
            ->get();
        
        return View('HostProfile',[
            'HostData'=>$hostData,
            'hostPhoto'=>$hostPhoto,
            'hostRegisterdEvents'=> $hostRegisterdEvents,
            'value'=>$value
            ]);
    }

    function ChangePasswordUser(Request $request)
    {
        $value = Session::get('phone_number');
        $mobile_no   = $request->input('mobile_no');
        $oldPass     = $request->input('oldPass');
        $newPass     = $request->input('newPass');
        $ConNewPass  = $request->input('ConNewPass');

        if($newPass == $ConNewPass)
        {
            $checkOldPass = UserHostModel::where('phone_number', '=', $value)->where('password', '=', $oldPass)->count();

            if($checkOldPass == 1)
            {
                $changePass = UserHostModel::where('phone_number', '=', $mobile_no)->update([
                    'password' => $newPass
                ]);
    
                if($changePass == true)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            else
            {
                return 2;
            }
        }
        else
        {
            return 3;
        }
    }

    function ChangePasswordHost(Request $request)
    {
        $value = Session::get('phone_number');
        $mobile_no   = $request->input('host_mobile_no');
        $oldPass     = $request->input('host_oldPass');
        $newPass     = $request->input('host_newPass');
        $ConNewPass  = $request->input('host_ConNewPass');

        if($newPass == $ConNewPass)
        {
            $checkOldPass = UserHostModel::where('phone_number', '=', $value)->where('password', '=', $oldPass)->count();

            if($checkOldPass == 1)
            {
                $changePass = UserHostModel::where('phone_number', '=', $mobile_no)->update([
                    'password' => $newPass
                ]);
    
                if($changePass == true)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            else
            {
                return 2;
            }
        }
        else
        {
            return 3;
        }
    }

    function UserDetails(Request $request)
    {
        $id = $request->input('user_id');

        $details = UserHostModel::where('id', '=', $id)->get();

        return $details;
    }

    function UpdateUserDetails(Request $request)
    {
        $id       = $request->input('user_id');
        $name     = $request->input('Name');
        $email    = $request->input('Email');
        $address  = $request->input('Address');

        $result = UserHostModel::where('id',$id)->update([
            'name'=>$name,
            'email'=>$email,
            'address'=>$address
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

    function UserProfilePhotoUpdate(Request $request)
    {

        $value = Session::get('phone_number');
        $photoPath = $request->file('photo')->store('public');
        $photoName = (explode('/',$photoPath))[1];

        $host = $_SERVER['HTTP_HOST'];
        $location = "http://".$host."/storage/".$photoName;

        $result = PhotoModel::insert([
            'photo_location'=>$location,
            'user_phone_no'=>$value
        ]);

        return 1;
    }

    function HostDetails(Request $request)
    {
        $id = $request->input('user_id');

        $details = UserHostModel::where('id', '=', $id)->get();

        return $details;
    }

    function UpdateHostDetails(Request $request)
    {
        $id      = $request->input('hostId');
        $name    = $request->input('HostName');
        $email   = $request->input('HostEmail');
        $address = $request->input('HostAddress');

        $result = UserHostModel::where('id',$id)->update([
            'name'=>$name,
            'email'=>$email,
            'address'=>$address
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

    function HostProfilePhotoUpdate(Request $request)
    {
        $value = Session::get('phone_number');
        $photoPath = $request->file('photo')->store('public');
        $photoName = (explode('/',$photoPath))[1];

        $host = $_SERVER['HTTP_HOST'];
        $location = "http://".$host."/storage/".$photoName;

        $result = PhotoModel::insert([
            'photo_location'=>$location,
            'user_phone_no'=>$value
        ]);

        return 1;
    }
}
