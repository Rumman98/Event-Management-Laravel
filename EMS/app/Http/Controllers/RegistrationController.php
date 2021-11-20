<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserHostModel;

class RegistrationController extends Controller
{
    function UserRegistration(Request $request)
    {
        $member_type = $request->input('member_type');
        $name = $request->input('name');
        $email = $request->input('email');
        $mobileNo = $request->input('mobileNo');
        $address = $request->input('address');
        $password = $request->input('password');

        $status = UserHostModel::insert([
            'name'=>$name,
            'phone_number'=>$mobileNo,
            'email'=>$email,
            'address'=>$address,
            'password'=>$password,
            'user_type'=> $member_type
        ]);

        if($status == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }

    }
}
