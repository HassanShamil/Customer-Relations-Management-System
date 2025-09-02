<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = ['customer_id', 'title', 'content', 'estimate', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
