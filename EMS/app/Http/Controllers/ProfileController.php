<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\UserHostModel;

class ProfileController extends Controller
{
    function UserHostProfile($mobile_number)
    { 
        $value = Session::get('phone_number');

        if($value == $mobile_number)
        {
            $userData = UserHostModel::where('phone_number', '=', $mobile_number)->get();
            return View('UserProfile',[
                'UserData'=>$userData
            ]);
        }
        else
        {
            $userData = UserHostModel::where('phone_number', '=', $value)->get();
            return View('UserProfile',[
                'UserData'=>$userData
            ]);
        }
    }
}
