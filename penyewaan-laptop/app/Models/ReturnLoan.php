<?php

namespace App\Models;

use App\Models\Loan;
use App\Models\ReturnLoan;
use Illuminate\Database\Eloquent\Model;

class ReturnLoan extends Model
{
    protected $table = "return";
    protected $fillable = [
        "loan_id",
        "return_date",
        "penalty_fee",
        "admin_id",
    ];

    public function return()
{
    return $this->hasOne(ReturnLoan::class, 'loan_id');
}
public function loan()
{
    return $this->belongsTo(Loan::class, 'loan_id');
}
}
