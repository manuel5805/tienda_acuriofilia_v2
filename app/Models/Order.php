<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'total',
        'num_products',
        'address',
    ];

    public function userRelation() {
        return $this->belongsTo(User::class);
    }

    public function orderProductsRelation() {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot('quantity');
    }
}
