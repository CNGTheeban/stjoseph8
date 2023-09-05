<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayController extends Controller
{
    //add fee render
    public function index()
    {
        return view('feePayments');
    }

    //add donation render
    public function addDonation()
    {
        return view('addDonation');
    }

    //add fee render
    public function addFee()
    {
        return view('addFee');
    }
}
