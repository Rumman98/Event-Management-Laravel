<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientReviewController extends Controller
{
    function ClientReviewIndex(){
        return view('ClientReview');
    }
}
