<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Complaint;
use App\Citizen;

class ComplainController extends Controller
{
    public function status($request)
    {
            $complaint = Complaint::findOrFail($request);
    }
}
