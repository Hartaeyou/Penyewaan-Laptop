<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnLoan extends Model
{
    protected $table = "return";
    protected $fillable = [
        "loan_id",
        "return_date",
        "penalty_fee"
    ];
}
