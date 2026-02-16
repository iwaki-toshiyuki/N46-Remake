<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberStatus extends Model
{
    protected $fillable = [
        'member_id',
        'singing',
        'dancing',
        'variety',
        'visual',
        'leadership'
    ];

    /**
     * 逆側（1対1）
     * MemberStatus は 1つの Member に属する
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}