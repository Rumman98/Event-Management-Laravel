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

        $checkUser = UserHostModel::where('phone_number','=', $phone_number)->where('password', '=', $password)->where('user_type', '=', 0)->count();
        $checkHost = UserHostModel::where('phone_number','=', $phone_number)->where('password', '=', $password)->where('user_type', '=', 1)->count();

        if($checkUser == 1)
        {
            $request->session()->put('phone_number',$phone_number);
            return 1;
        }
        else if($checkHost == 1)
        {
            $request->session()->put('phone_number',$phone_number);
            return 2;
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
