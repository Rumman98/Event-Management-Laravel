<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserHostModel;

class LoginController extends Controller
{
    function loginPage()
    {
        return view('login');
    }

    function OnLogin(Request $request)
    {
        $phone_number = $request->input('mobile');
        $password = $request->input('password');

        $checkUser = UserHostModel::where('phone_number','=', $phone_number)->where('password', '=', $password)->count();

        if($checkUser == 1)
        {
            $checkType = UserHostModel::where('phone_number', '=', $phone_number)->value('user_type');
            $request->session()->put('phone_number',$phone_number);
            return $phone_number;
        }
        else
        {
            return 0;
        }
    }

    function onLogout(Request $request)
    {
        $request->session()->flush();
        return redirect('login');
    }
}
