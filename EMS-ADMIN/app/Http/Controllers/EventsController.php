<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use App\EventInfoTable;

class EventsController extends Controller
{
    function EventsIndex(){
        return view('Events');
    }

    function GetEventsData(){
        $result = json_encode(EventInfoTable::orderby('id','desc')->get());
        return $result;
       }

       function GetEventDetails(Request $request){
        $id= $request->input('id');
        $result = json_encode(EventInfoTable::where('id','=',$id)->get());
        return $result;
       }


       function EventApprovalUpdate(Request $request){
        $id= $request->input('id');
        $event_approval= $request->input('event_approval');

        $result = EventInfoTable::where('id',$id)->update([
            'event_approval'=>$event_approval
        ]);

        if($result==true){
            return 1;
        }

        else{
            return 0;
        }
     }


     function EventDelete(Request $request){
        $id= $request->input('id');
        $result = EventInfoTable::where('id','=',$id)->delete();

        if($result==true){
            return 1;
        }

        else{
            return 0;
        }
     }
}
