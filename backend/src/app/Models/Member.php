<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // 一括代入許可カラム
    protected $fillable = [
        'name',
        'nickname',
        'generation',
        'birthday',
        'image_url',
        'description'
    ];

    /**
     * 1対1リレーション
     * Member は 1つの MemberStatus を持つ
     */
    public function status()
    {
        return $this->hasOne(MemberStatus::class);
    }

    /**
     * 多対多リレーション（お気に入り）
     * Member は 複数の User にお気に入りされる
     * 中間テーブル：favorites
     */
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    /**
     * 1対多リレーション
     * Member は 複数の診断結果を持つ
     */
    public function diagnosisResults()
    {
        return $this->hasMany(DiagnosisResult::class);
    }
}