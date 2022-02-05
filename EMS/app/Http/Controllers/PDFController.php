<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\EventRegistrationModel;
use Illuminate\Support\Facades\Session;
use App\UserHostModel;
class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $id =  $_GET['id'];

        $value = Session::get('phone_number');

        $user_info = UserHostModel::where('phone_number','=', $value)->get();

        $event_info = EventRegistrationModel
                ::join('eventinfotable', 'eventregistration.event_id', '=', 'eventinfotable.id')
                ->join('userhosttable', 'eventinfotable.event_creator_phone_no', '=', 'userhosttable.phone_number')
                ->where('eventinfotable.id', '=', $id)
                ->where('eventregistration.stutus', '=', 'Approved')
                ->where('eventregistration.user_phone_no','=', $value)
                ->get();

        $pdf = PDF::loadView('pdf', ['event_info' => $event_info, 'user_info' => $user_info]);

        return $pdf->download('InvitationCard.pdf');
    }
}
