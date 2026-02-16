<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
        'member_id'
    ];

    /**
     * Favorite は 1人の User に属する
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Favorite は 1人の Member に属する
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}