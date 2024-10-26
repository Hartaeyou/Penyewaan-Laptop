<?php

namespace App\Http\Controllers\Peminjamanan;

use App\Models\Loan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryPeminjamanController extends Controller
{
    public function index()
    {
        $loanDatas = Loan::with('return') 
        ->where('user_id', auth()->user()->id) 
        ->get();
        return view('HistoryPinjaman.index',["loanDatas" => $loanDatas]);
    }
}
