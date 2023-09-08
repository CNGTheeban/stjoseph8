<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Fees;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class dashboardController extends Controller
{
    protected $donationDetails;
    protected $feeDetails;

    public function __construct(Donation $donationDetails, Fees $feeDetails)
    {
        $this->donationDetails = $donationDetails;
        $this->feeDetails = $feeDetails;
    }

    //admin dashboard controller
    public function adminDashboard()
    {
        //General variables
        $currentYear = date('Y');
        $currentMonth = date('m Y');
        $today = date('d m Y');

        //Donation
        //get all donations list
        $donationData = $this->donationDetails->where('status', '1')->get();

        //get latest donation
        $latestDonation = $this->donationDetails->latest()->first();

        //get total donation - annually
        $donationTransactions = $this->donationDetails->all();

        //donation variables
        $annualDonationTotal = 0;
        $formattedAnnualDonationAmount = 0;
        
        $monthlyDonationTotal = 0;
        $formattedMontlyDonationAmount = 0;

        $todayDonationTotal = 0;
        $formattedTodayDonationAmount = 0;
        
        $overallDonationTotal = 0;
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

                $overallDonationTotal += $decryptedOverAllAmount;

            }
            $formattedOverallDonationAmount = number_format($overallDonationTotal, 0, '', ',');
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

        // //Fees
        // //get all fees list
        // $feeData = $this->feeDetails->where('fee_status', '1')->get();

        //get latest fees
        $latestFee = $this->feeDetails->orderBy('fee_created_at', 'desc')->limit(0,1);
        //dd($latestFee);
        //get total fees - annually
        // $feeTransactions = $this->feeDetails->all();

        // //fee variables
        // $annualFeeTotal = 0;
        // $formattedAnnualFeeAmount = 0;
         
        // $monthlyFeeTotal = 0;
        // $formattedMontlyFeeAmount = 0;
 
        // $todayFeeTotal = 0;
        // $formattedTodayFeeAmount = 0;
         
        // $overallFeeTotal = 0;
        // $formattedOverallFeeAmount = 0;
 
        // //get total donation - Annual
        // if(count($feeTransactions) != 0){
        //     foreach ($feeTransactions as $feeTransaction) {
        //         // Assuming 'amount' is the name of the encrypted amount column in the transactions table
        //         $decryptedFeeAmount = Crypt::decrypt($feeTransaction->fee_amount);
             
        //         // Assuming 'transaction_date' is the name of the date column in the transactions table
        //         $feeTransactionYear = date('Y', strtotime($feeTransaction->fee_created_at));
             
        //         if ($feeTransactionYear == $currentYear) {
        //             $annualFeeTotal += $decryptedFeeAmount;
        //         }
        //     }
        //     $formattedAnnualFeeAmount = number_format($annualFeeTotal, 0, '', ',');
        // }
 
        // //dd($annualFeeTotal);
        // //get total donation - monthly
        // if(count($feeTransactions) != 0){
        //     foreach ($feeTransactions as $feeTransaction) {
        //         // Assuming 'amount' is the name of the encrypted amount column in the transactions table
        //         $decryptedFeeAmount = Crypt::decrypt($feeTransaction->fee_amount);
             
        //         // Assuming 'transaction_date' is the name of the date column in the transactions table
        //         $feeTransactionMonth = date('m Y', strtotime($feeTransaction->fee_created_at));
             
        //         if ($feeTransactionMonth == $currentMonth) {
        //             $monthlyFeeTotal += $decryptedFeeAmount;
        //         }
        //     }
        //     $formattedMontlyFeeAmount = number_format($monthlyFeeTotal, 0, '', ',');
        // }
 
        // //get total donation - today
        // if(count($feeTransactions) != 0){
        //     foreach ($feeTransactions as $feeTransaction) {
        //         // Assuming 'amount' is the name of the encrypted amount column in the transactions table
        //         $decryptedFeeAmount = Crypt::decrypt($feeTransaction->fee_amount);
             
        //         // Assuming 'transaction_date' is the name of the date column in the transactions table
        //         $feeTransactionDay = date('d m Y', strtotime($feeTransaction->fee_created_at));
             
        //         if ($feeTransactionDay == $today) {
        //             $todayFeeTotal += $decryptedFeeAmount;
        //         }
        //     }
        //     $formattedTodayFeeAmount = number_format($todayFeeTotal, 0, '', ',');
        // }
 
        // //get total donation - overall
        // if(count($feeTransactions) != 0){
        //     foreach ($feeTransactions as $feeTransaction) {
        //         // Assuming 'amount' is the name of the encrypted amount column in the transactions table
        //         $decryptedOverAllFeeAmount = Crypt::decrypt($feeTransaction->fee_amount);
 
        //         $overallFeeTotal += $decryptedOverAllFeeAmount;
 
        //     }
        //     $formattedOverallFeeAmount = number_format($overallFeeTotal, 0, '', ',');
        //     // dd($formattedOverallAmount);
        // }
 
        // if(count($feeData) != 0){
        //     foreach($feeData as $fData)
        //     {
        //         try {
        //             $fData -> fee_studentid = decrypt($fData -> fee_studentid);
        //             $fData -> fee_term = decrypt($fData -> fee_term);
        //             $fData -> fee_purpose = decrypt($fData -> fee_purpose);
        //             $fData -> fee_amount = decrypt($fData -> fee_amount);
        //             $fData -> fee_status = decrypt($fData -> fee_status);
        //         } catch (DecryptException $e) {
        //             //
        //         }
        //     }
 
        //     try {
        //         $latestFee -> fee_studentid = Crypt::decrypt($latestFee->fee_studentid);
        //         $latestDee -> fee_amount = Crypt::decrypt($latestFee->fee_amount);
        //         // Use $decryptedData as needed
        //     } catch (DecryptException $e) {
        //         // Handle decryption failure
        //         // Log or report the error, or take appropriate action
        //     }
        // }

        $data = [
            'latestDonation' => $latestDonation,
            'donationData' => $donationData,
            'annualDonationTotal' => $formattedAnnualDonationAmount,
            'monthlyDonationTotal' => $formattedMontlyDonationAmount,
            'todayDonationTotal' => $formattedTodayDonationAmount,
            'overallDonationTotal' => $formattedOverallDonationAmount,
            'latestFee' => $latestFee,
            // 'feeData' => $feeData,
            // 'annualFeeTotal' => $formattedAnnualFeeAmount,
            // 'monthlyFeeTotal' => $formattedMontlyFeeAmount,
            // 'todayFeeTotal' => $formattedTodayFeeAmount,
            // 'overallFeeTotal' => $formattedOverallFeeAmount
        ];

        return view('index')->with('data', $data);
    }
}
