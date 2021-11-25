<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\UserHostModel;

class ProfileController extends Controller
{
    function UserProfile()
    { 
        $value = Session::get('phone_number');

            $userData = UserHostModel::where('phone_number', '=', $value)->get();
            return View('UserProfile',[
                'UserData'=>$userData,
                'value'=>$value
            ]);
    }
    function HostProfile()
    { 
        $value = Session::get('phone_number');

            $hostData = UserHostModel::where('phone_number', '=', $value)->get();
            return View('HostProfile',[
                'HostData'=>$hostData,
                'value'=>$value
            ]);
    }

    function ChangePasswordUser(Request $request)
    {
        $mobile_no   = $request->input('mobile_no');
        $oldPass     = $request->input('oldPass');
        $newPass     = $request->input('newPass');
        $ConNewPass  = $request->input('ConNewPass');

        if($newPass == $ConNewPass)
        {
            $checkOldPass = UserHostModel::where('phone_number', '=', $mobile_no)->where('password', '=', $oldPass)->count();

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
        $mobile_no   = $request->input('host_mobile_no');
        $oldPass     = $request->input('host_oldPass');
        $newPass     = $request->input('host_newPass');
        $ConNewPass  = $request->input('host_ConNewPass');

        if($newPass == $ConNewPass)
        {
            $checkOldPass = UserHostModel::where('phone_number', '=', $mobile_no)->where('password', '=', $oldPass)->count();

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

    function HostDetails(Request $request)
    {
        $id = $request->input('user_id');

        $details = UserHostModel::where('id', '=', $id)->get();

        return $details;
    }

    function UpdateHostDetails(Request $request)
    {
        $id = $request->input('hostId');
        $name = $request->input('HostName');
        $email = $request->input('HostEmail');
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
}
