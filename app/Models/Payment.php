<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function user()
    {
        return $this->hasOneThrough(User::class, Order::class);
    }
}
