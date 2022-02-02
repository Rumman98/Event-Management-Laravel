<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\EventRegistrationModel;
use App\UserHostModel;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $id =  $_GET['id'];

        $info = EventRegistrationModel::where('event_id', '=', $id)->get();

        $pdf = PDF::loadView('pdf', ['info' => $info]);

        return $pdf->download('InvitationCard.pdf');
    }
}
