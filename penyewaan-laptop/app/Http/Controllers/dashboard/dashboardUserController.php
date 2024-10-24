<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Loan;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboardUserController extends Controller
{
    public function dashboardUser ()
    {
        $loans = Loan::where("user_id", auth()->user()->id)
                            ->where('status', 'Approved')
                            ->count();

        $laptop = Unit::where("status", "Available")->count();
        return view('Dashboard.User.dashboard' , compact('laptop'), compact('loans'));
    }
}
