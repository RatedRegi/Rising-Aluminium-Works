<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image_url',
        'category_id'
    ];
   
    public function scopeFilter($query, array $filters){
        if(!empty($filters['search'])){
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if(!empty($filters['category_id'])){
            $query->where('category_id', 'like', '%'.$filters['category_id'].'%');
        }
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
}
