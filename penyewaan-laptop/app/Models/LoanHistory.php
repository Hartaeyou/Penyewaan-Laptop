<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanHistory extends Model
{
    protected $table ="loan_history";
    protected $fillable = ['user_id','loan_id','admin_id','action'];
}
