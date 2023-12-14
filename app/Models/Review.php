<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    
   

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'comment',
        'assessment',
        'user_id',
        'product_id'
    ];

    public function userRelation() {
        return $this->belongsTo(User::class);
    }

    public function productRelation() {
        return $this->belongsTo(Product::class);
    }
}

