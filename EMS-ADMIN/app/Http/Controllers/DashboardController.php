<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventInfoTable;
use App\EventRegistrationModel;
use App\UserHostModel;

class DashboardController extends Controller
{
    function DashboardIndex(){
        $TotalUsers = UserHostModel::where('user_type', 0)->count();
        $TotalHosts = UserHostModel::where('user_type', 1)->count();
        $TotalEvents=EventInfoTable::count();
        return view('Dashboard',[
            'TotalUsers'=>$TotalUsers,
             'TotalHosts'=>$TotalHosts,
             'TotalEvents'=>$TotalEvents
           ]);
    }
}
