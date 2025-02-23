<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address_line',
        'city',
        'user_id',
        'province',
        'zip',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
}
