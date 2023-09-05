<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Http\Requests\DonationDataRequest;

class donationController extends Controller
{
    //add donation render
    public function index()
    {
        return view('addDonation');
    }

    //paying donation
    public function donate(DonationDataRequest $request)
    {
        $data = [
            'firstName' => encrypt($request->input('inputFirstName')),
            'lastName' => encrypt($request->input('inputLastName')),
            'email' => encrypt($request->input('inputEmail')),
            'contactno' => encrypt($request->input('inputContactNo')),
            'donerRef' => encrypt($request->input('inputDonRef')),
            'amount' => encrypt($request->input('inputDonAmount')),
            'status' => "1",
        ];

        Donation::create($data);
        return redirect()->route('donation')->with('success', 'Donation sent successfully.');
    }
}
