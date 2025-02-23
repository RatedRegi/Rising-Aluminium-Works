<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class MasterCard extends Model
{
    protected $fillable = ['card_holder', 'card_number', 'month', 'year', 'cvv', 'balance', 'card_holder_address'];
    protected $table = 'mastercard';
  

}
