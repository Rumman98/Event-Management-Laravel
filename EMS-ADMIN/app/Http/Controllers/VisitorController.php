<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;


class VisitorController extends Controller
{
    function VisitorIndex(){

        $visitordata= json_decode(VisitorModel::orderBy('id','desc')->get());
          return view('Visitors',['VisitorData'=>$visitordata]);
         }
}
