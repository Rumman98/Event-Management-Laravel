<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserHostModel;

class UsersController extends Controller
{
    function UsersIndex(){
        return view('Users');
    }

    function GetUserData(){
        $result = json_encode(UserHostModel::orderby('id','desc')->where('user_type', 0)->get());
        return $result;
       }

       function UserDelete(Request $request){
        $id= $request->input('id');
        $result = UserHostModel::where('id','=',$id)->delete();

        if($result==true){
            return 1;
        }

        else{
            return 0;
        }
     }
}
