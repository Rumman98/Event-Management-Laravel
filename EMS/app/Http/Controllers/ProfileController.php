<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserHostModel;

class ProfileController extends Controller
{
    function UserHostProfile($mobile_number)
    { 
        $userData = UserHostModel::where('phone_number', '=', $mobile_number)->get();
        return View('UserProfile',[
            'UserData'=>$userData
        ]); 
    }
}
