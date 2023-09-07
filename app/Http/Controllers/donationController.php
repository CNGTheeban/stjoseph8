<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Http\Requests\DonationDataRequest;

class donationController extends Controller
{
    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }

    //add donation render
    public function index()
    {
        $donationdata = $this->donation->get();
        foreach($donationdata as $don)
        {
            try {
                $don -> firstName = base64_decode( $don -> firstName);
                $don -> lastName = base64_decode( $don -> lastName);
                $don -> email = base64_decode( $don -> email);
                $don -> contactno = base64_decode( $don -> contactno);
                $don -> donerRef = base64_decode( $don -> donerRef);
                $don -> amount = base64_decode( $don -> amount );
                $don -> created_at = $don ->created_at->format('m/d/Y');


            } catch (DecryptException $e) {
                //
            }
        }  
        // dd($donationdata);    
        return view('donationReport')->with('donData', $donationdata);
    }

    //paying donation
    public function donate(DonationDataRequest $request)
    {
        $data = [
            'firstName' => base64_encode($request->input('inputFirstName')),
            'lastName' => base64_encode($request->input('inputLastName')),
            'email' => base64_encode($request->input('inputEmail')),
            'contactno' => base64_encode($request->input('inputContactNo')),
            'donerRef' => base64_encode($request->input('inputDonRef')),
            'amount' => base64_encode($request->input('inputDonAmount')),
            'status' => "1",
        ];

        Donation::create($data);
        return redirect()->route('donation')->with('success', 'Donation sent successfully.');
    }
}
