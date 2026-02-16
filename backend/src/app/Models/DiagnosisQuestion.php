<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosisQuestion extends Model
{
    protected $fillable = [
        'question_text'
    ];

    /**
     * 1対多リレーション
     * 1つの質問は複数の選択肢を持つ
     */
    public function choices()
    {
        return $this->hasMany(DiagnosisChoice::class, 'question_id');
    }
}