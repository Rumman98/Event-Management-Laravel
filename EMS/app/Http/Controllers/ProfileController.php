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
                'UserData'=>$userData
            ]);
    }
    function HostProfile()
    { 
        $value = Session::get('phone_number');

            $hostData = UserHostModel::where('phone_number', '=', $value)->get();
            return View('HostProfile',[
                'HostData'=>$hostData
            ]);
    }
}
