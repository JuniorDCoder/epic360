<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'stripe_session_id', 'amount', 'status'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
