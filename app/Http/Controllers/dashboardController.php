<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Fees;
use App\Models\User;
use App\Models\UserVerify;
use App\Models\Student;
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
        //get all Fees list
        $FeesData = Fees::where('fee_status', '1')->get();


        //get latest donation
        $latestDonation = $this->donationDetails->latest()->first();
        //get latest Fees
        $latestFees = Fees::orderBy('fee_created_at', 'desc')->first();


        //get total donation - annually
        $donationTransactions = $this->donationDetails->all();
        //get total fees - annually
        $feesTransactions = Fees::all();


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

         //fees variables
         $annualfeesTotal = 0;
         $formattedAnnualfeesAmount = 0;
         
         $monthlyfeesTotal = 0;
         $formattedMontlyfeesAmount = 0;
 
         $todayfeesTotal = 0;
         $formattedTodayfeesAmount = 0;
         
         $overallfeesTotal = 0;
         $formattedOverallfeesAmount = 0;

        //get total donation - Annual
        if(count($donationTransactions) != 0){
            foreach ($donationTransactions as $donationTransaction) {
                // Assuming 'amount' is the name of the encrypted amount column in the transactions table
                $decryptedDonationAmount = base64_decode($donationTransaction->amount);
            
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
                $decryptedDonationAmount = base64_decode($donationTransaction->amount);
            
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
                $decryptedDonationAmount = base64_decode($donationTransaction->amount);
            
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
                $decryptedOverAllAmount = base64_decode($donationTransaction->amount);

                $overallTotal += $decryptedOverAllAmount;

            }
            $formattedOverallDonationAmount = number_format($overallTotal, 0, '', ',');
            // dd($formattedOverallAmount);
        }

        if(count($donationData) != 0){
            foreach($donationData as $donData)
            {
                try {
                    $donData -> firstName = base64_decode($donData -> firstName);
                    $donData -> lastName = base64_decode($donData -> lastName);
                    $donData -> email = base64_decode($donData -> email);
                    $donData -> contactno = base64_decode($donData -> contactno);
                    $donData -> amount = base64_decode($donData -> amount);

                } catch (DecryptException $e) {
                    //
                }
            }

            try {
                $latestDonation -> firstName = base64_decode($latestDonation->firstName);
                $latestDonation -> amount = base64_decode($latestDonation->amount);
                // Use $decryptedData as needed
            } catch (DecryptException $e) {
                // Handle decryption failure
                // Log or report the error, or take appropriate action
            }
        }

         //get total fees - Annual,Monthly,Day
         if(count($feesTransactions) != 0){
            foreach ($feesTransactions as $feesTransaction) {
                // Assuming 'amount' is the name of the encrypted amount column in the transactions table
                $decryptedFeesAmount = $feesTransaction->fee_amount;
                // Assuming 'transaction_date' is the name of the date column in the transactions table
                $feeTransactionYear = date('Y', strtotime($feesTransaction->fee_created_at));
                $feeTransactionMonth = date('m Y', strtotime($feesTransaction->fee_created_at));
                $feeTransactionDay = date('d m Y', strtotime($feesTransaction->fee_created_at));
        
               
                if ($feeTransactionYear == $currentYear) {
                    $annualfeesTotal += $decryptedFeesAmount;
                }
                if ($feeTransactionMonth == $currentMonth) {
                    $monthlyfeesTotal += $decryptedFeesAmount;
                }
                if ($feeTransactionDay == $today) {
                    $todayfeesTotal += $decryptedFeesAmount;
                }
                  // Assuming 'amount' is the name of the encrypted amount column in the transactions table
                  $decryptedOverAllFeesAmount = $feesTransaction->fee_amount;

                  $overallfeesTotal += $decryptedOverAllFeesAmount;
            }
            $formattedAnnualfeesAmount = number_format($annualfeesTotal, 0, '', ',');
            $formattedMontlyfeesAmount = number_format($monthlyfeesTotal, 0, '', ',');
            $formattedTodayfeesAmount = number_format($todayfeesTotal, 0, '', ',');
            $formattedOverallfeesAmount = number_format($overallfeesTotal, 0, '', ',');
        }

        //get parents count
        
        //get active parents list
        $activeParents = UserVerify::get();

        //get inactive parents list
        $inActiveParents = User::get();


        //get Students count
        //get active students list
        $activeStudents = Student::where('student_status', 1)->get();
        //get inactive students list
        $inActiveStudents = Student::where('student_status', 0)->get();


        $data = [
            'latestDonation' => $latestDonation,
            'donationData' => $donationData,
            'annualTotal' => $formattedAnnualDonationAmount,
            'monthlyTotal' => $formattedMontlyDonationAmount,
            'todayTotal' => $formattedTodayDonationAmount,
            'overallTotal' => $formattedOverallDonationAmount,
            'latestFees' => $latestFees,
            'annualFeesTotal' => $formattedAnnualfeesAmount,
            'monthlyFeesTotal' => $formattedMontlyfeesAmount,
            'todayFeesTotal' => $formattedTodayfeesAmount,
            'overallfeesTotal' => $formattedOverallfeesAmount,
            'activeParents' => $activeParents,
            'inActiveParents' => $inActiveParents,
            'activeStudents' => $activeStudents,
            'inActiveStudents' => $inActiveStudents
        ];

        return view('index')->with('data', $data);
    }
}
