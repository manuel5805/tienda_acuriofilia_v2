<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $table = 'inquirys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'state',
        'title',
        'user_id',
        'category',
        'description',
        'img_inquiry'
    ];


    public function userRelation() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function commentRelation() {
        return $this->hasMany(Comment::class);
    }
}
