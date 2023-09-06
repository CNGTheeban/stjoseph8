<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fees;

class reportController extends Controller
{
    protected $fees;

    public function __construct(Fees $fees)
    {
        $this->fees = $fees;
    }

    //fee report
    public function feeReport()
    {
        
    }
}
