<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiagnosisQuestion;
use App\Models\DiagnosisChoice;

class DiagnosisQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            [
                'question_text' => '休日の過ごし方は？',
                'choices' => [
                    ['text' => '家でのんびり', 'member_id' => 1, 'score' => 10],
                    ['text' => '友達と外出', 'member_id' => 2, 'score' => 10],
                    ['text' => '新しいことに挑戦', 'member_id' => 3, 'score' => 10],
                ]
            ],
            [
                'question_text' => 'あなたの性格は？',
                'choices' => [
                    ['text' => 'マイペース', 'member_id' => 1, 'score' => 10],
                    ['text' => '明るいムードメーカー', 'member_id' => 2, 'score' => 10],
                    ['text' => '努力家', 'member_id' => 3, 'score' => 10],
                ]
            ]
        ];

        foreach ($questions as $index => $q) {
            $question = DiagnosisQuestion::create([
                'question_text' => $q['question_text'],
            ]);

            foreach ($q['choices'] as $choice) {
                DiagnosisChoice::create([
                    'question_id' => $question->id,
                    'choice_text' => $choice['text'],
                ]);
            }
        }
    }
}