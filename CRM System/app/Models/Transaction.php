<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected  $fillable = ['invoice_id','customer_id', 'amount', 'paid_at'];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    public function Invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
