<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosisResult extends Model
{
    protected $fillable = [
        'user_id',
        'member_id',
        'score'
    ];

    /**
     * 診断結果は 1人のユーザーに属する
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 診断結果は 1人のメンバーに属する
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}