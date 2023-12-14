<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category',
        'brand',
        'description',
        'quantity',
        'price',
        'product_image'
    ];


    public function reviewProductRelation() {
        return $this->hasMany(Review::class);
    }

    public function productOrderRelation() {
        return $this->belongsToMany(Order::class, 'order_products')->withPivot('quantity');
    }
}
