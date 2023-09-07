<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class dashboardController extends Controller
{
    protected $donationDetails;

    public function __construct(Donation $donationDetails)
    {
        $this->donationDetails = $donationDetails;
    }

    //admin dashboard controller
    public function adminDashboard()
    {
        //get all donations list
        $donationData = $this->donationDetails->where('status', '1')->get();

        //get latest donation
        $latestDonation = $this->donationDetails->latest()->first();

        //get total donation - annually
        $donationTransactions = $this->donationDetails->all();

        //General variables
        $currentYear = date('Y');
        $currentMonth = date('m Y');
        $today = date('d m Y');


        //donation variables
        $annualDonationTotal = 0;
        $formattedAnnualDonationAmount = 0;
        
        $monthlyDonationTotal = 0;
        $formattedMontlyDonationAmount = 0;

        $todayDonationTotal = 0;
        $formattedTodayDonationAmount = 0;
        
        $overallTotal = 0;
        $formattedOverallDonationAmount = 0;

        //get total donation - Annual
        if(count($donationTransactions) != 0){
            foreach ($donationTransactions as $donationTransaction) {
                // Assuming 'amount' is the name of the encrypted amount column in the transactions table
                $decryptedDonationAmount = Crypt::decrypt($donationTransaction->amount);
            
                // Assuming 'transaction_date' is the name of the date column in the transactions table
                $donationTransactionYear = date('Y', strtotime($donationTransaction->created_at));
            
                if ($donationTransactionYear == $currentYear) {
                    $annualDonationTotal += $decryptedDonationAmount;
                }
            }
            $formattedAnnualDonationAmount = number_format($annualDonationTotal, 0, '', ',');
        }

        //dd($annualDonationTotal);
        //get total donation - monthly
        if(count($donationTransactions) != 0){
            foreach ($donationTransactions as $donationTransaction) {
                // Assuming 'amount' is the name of the encrypted amount column in the transactions table
                $decryptedDonationAmount = Crypt::decrypt($donationTransaction->amount);
            
                // Assuming 'transaction_date' is the name of the date column in the transactions table
                $donationTransactionMonth = date('m Y', strtotime($donationTransaction->created_at));
            
                if ($donationTransactionMonth == $currentMonth) {
                    $monthlyDonationTotal += $decryptedDonationAmount;
                }
            }
            $formattedMontlyDonationAmount = number_format($monthlyDonationTotal, 0, '', ',');
        }

        //get total donation - today
        if(count($donationTransactions) != 0){
            foreach ($donationTransactions as $donationTransaction) {
                // Assuming 'amount' is the name of the encrypted amount column in the transactions table
                $decryptedDonationAmount = Crypt::decrypt($donationTransaction->amount);
            
                // Assuming 'transaction_date' is the name of the date column in the transactions table
                $donationTransactionDay = date('d m Y', strtotime($donationTransaction->created_at));
            
                if ($donationTransactionDay == $today) {
                    $todayDonationTotal += $decryptedDonationAmount;
                }
            }
            $formattedTodayDonationAmount = number_format($todayDonationTotal, 0, '', ',');
        }

        //get total donation - overall
        if(count($donationTransactions) != 0){
            foreach ($donationTransactions as $donationTransaction) {
                // Assuming 'amount' is the name of the encrypted amount column in the transactions table
                $decryptedOverAllAmount = Crypt::decrypt($donationTransaction->amount);

                $overallTotal += $decryptedOverAllAmount;

            }
            $formattedOverallDonationAmount = number_format($overallTotal, 0, '', ',');
            // dd($formattedOverallAmount);
        }

        if(count($donationData) != 0){
            foreach($donationData as $donData)
            {
                try {
                    $donData -> firstName = decrypt($donData -> firstName);
                    $donData -> lastName = decrypt($donData -> lastName);
                    $donData -> email = decrypt($donData -> email);
                    $donData -> contactno = decrypt($donData -> contactno);
                    $donData -> amount = decrypt($donData -> amount);

                } catch (DecryptException $e) {
                    //
                }
            }

            try {
                $latestDonation -> firstName = Crypt::decrypt($latestDonation->firstName);
                $latestDonation -> amount = Crypt::decrypt($latestDonation->amount);
                // Use $decryptedData as needed
            } catch (DecryptException $e) {
                // Handle decryption failure
                // Log or report the error, or take appropriate action
            }
        }

        $data = [
            'latestDonation' => $latestDonation,
            'donationData' => $donationData,
            'annualTotal' => $formattedAnnualDonationAmount,
            'monthlyTotal' => $formattedMontlyDonationAmount,
            'todayTotal' => $formattedTodayDonationAmount,
            'overallTotal' => $formattedOverallDonationAmount
        ];

        return view('index')->with('data', $data);
    }
}
