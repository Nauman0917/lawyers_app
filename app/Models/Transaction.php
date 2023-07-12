<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'user_id',
        'payment_id',
        'transaction_type',
        'amount',
        'date',
        'status',

    ];
}
