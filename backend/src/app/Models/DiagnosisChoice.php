<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosisChoice extends Model
{
    protected $fillable = [
        'question_id',
        'choice_text'
    ];

    /**
     * 逆側（多対1）
     * 選択肢は 1つの質問に属する
     */
    public function question()
    {
        return $this->belongsTo(DiagnosisQuestion::class, 'question_id');
    }
}