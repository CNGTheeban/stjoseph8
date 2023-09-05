<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donation;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class dashboardController extends Controller
{
    protected $donationDetails;
    protected $user;

    public function __construct(User $user, Donation $donationDetails)
    {
        $this->donationDetails = $donationDetails;
        $this->user = $user;
    }

    //admin dashboard controller
    public function adminDashboard()
    {   
        $users = $this->user->where('status', '1')->get();
        foreach ($users as $u) {
            //dd($u->usertype);

            if($u->usertype == 'User'){
                //get all donations list
                $donationData = $this->donationDetails->where('status', '1')->get();

                //get latest donation
                $latestDonation = $this->donationDetails->latest()->first();

                //get total donation - annually
                $transactions = $this->donationDetails->all();
                $annualTotal = 0;
                $currentYear = date('Y');
                foreach ($transactions as $transaction) {
                    // Assuming 'amount' is the name of the encrypted amount column in the transactions table
                    $decryptedAmount = Crypt::decrypt($transaction->amount);
                
                    // Assuming 'transaction_date' is the name of the date column in the transactions table
                    $transactionYear = date('Y', strtotime($transaction->created_at));
                
                    if ($transactionYear == $currentYear) {
                        $annualTotal += $decryptedAmount;
                    }
                    $formattedAnnualAmount = number_format($annualTotal, 0, '', ',');
                }

                //get total donation - monthly
                $monthlyTotal = 0;
                $currentMonth = date('m Y');
                foreach ($transactions as $transaction) {
                    // Assuming 'amount' is the name of the encrypted amount column in the transactions table
                    $decryptedAmount = Crypt::decrypt($transaction->amount);
                
                    // Assuming 'transaction_date' is the name of the date column in the transactions table
                    $transactionMonth = date('m Y', strtotime($transaction->created_at));
                
                    if ($transactionMonth == $currentMonth) {
                        $monthlyTotal += $decryptedAmount;
                    }
                    $formattedMontlyAmount = number_format($monthlyTotal, 0, '', ',');
                }

                //get total donation - today
                $todayTotal = 0;
                $today = date('d m Y');
                foreach ($transactions as $transaction) {
                    // Assuming 'amount' is the name of the encrypted amount column in the transactions table
                    $decryptedAmount = Crypt::decrypt($transaction->amount);
                
                    // Assuming 'transaction_date' is the name of the date column in the transactions table
                    $transactionDay = date('d m Y', strtotime($transaction->created_at));
                
                    if ($transactionDay == $today) {
                        $todayTotal += $decryptedAmount;
                    }
                    $formattedTodayAmount = number_format($todayTotal, 0, '', ',');
                }

                //get total donation - overall
                $overallTotal = 0;
                foreach ($transactions as $transaction) {
                    // Assuming 'amount' is the name of the encrypted amount column in the transactions table
                    $decryptedAmount = Crypt::decrypt($transaction->amount);

                    $overallTotal += $decryptedAmount;

                    $formattedOverallAmount = number_format($overallTotal, 0, '', ',');
                }
                // dd($formattedOverallAmount);

                if(is_object($donationData)){
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
                }

                try {
                    $latestDonation -> firstName = Crypt::decrypt($latestDonation->firstName);
                    $latestDonation -> amount = Crypt::decrypt($latestDonation->amount);
                    // Use $decryptedData as needed
                } catch (DecryptException $e) {
                    // Handle decryption failure
                    // Log or report the error, or take appropriate action
                }

                $data = [
                    'latestDonation' => $latestDonation,
                    'donationData' => $donationData,
                    'annualTotal' => $formattedAnnualAmount,
                    'monthlyTotal' => $formattedMontlyAmount,
                    'todayTotal' => $formattedTodayAmount,
                    'overallTotal' => $formattedOverallAmount
                ];
                return view('index')->with('data', $data);
            }else{            
                return view('index');
            }
        }
    }
}
