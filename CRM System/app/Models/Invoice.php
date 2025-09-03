<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected  $fillable = ['customer_id', 'title', 'description', 'due_amount', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
