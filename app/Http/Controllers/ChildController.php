<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChildController extends Controller
{
    //add children render
    public function addChild()
    {
        return view('addchild');
    }
    
    //edit children render
    public function editChild()
    {
        return view('editchild');
    }
}
