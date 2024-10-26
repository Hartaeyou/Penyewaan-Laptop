<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\User;
use App\Models\ReturnLoan;
use Illuminate\Database\Eloquent\Model;
class Loan extends Model
{
    protected $table = 'loans';

    protected $fillable = [
        'user_id',
        'unit_id',
        'borrow_date',
        'due_date',
        'deliver_price',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function return()
    {
        return $this->hasOne(ReturnLoan::class, 'loan_id',);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
