<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserHostModel;

class HostsController extends Controller
{
    function HostsIndex(){
        return view('Hosts');
    }

    function GetHostsData(){
        $result = json_encode(UserHostModel::orderby('id','desc')->where('user_type', 1)->get());
        return $result;
       }

       function HostDelete(Request $request){
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
