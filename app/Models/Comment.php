<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'parent_comment_id',
        'img_comment',
    ];


    public function userRelation() {
        return $this->belongsTo(User::class);
    }

    public function inquiryRelation() {
        return $this->belongsTo(inquiry::class);
    }
}
