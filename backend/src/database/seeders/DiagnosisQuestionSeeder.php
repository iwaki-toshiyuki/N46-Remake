<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiagnosisQuestion;
use App\Models\DiagnosisChoice;

class DiagnosisQuestionSeeder extends Seeder
{
    /**
     * 推しメン診断の質問・選択肢を投入する
     *
     * 設計方針:
     * 各選択肢には indicator を設定し、
     * ユーザーがどの指標（visual/singing/dancing/variety/leadership）を
     * 重視しているかを判定できるようにする。
     *
     * 5問 × 4択 構成。
     * 各 indicator が全体で均等（各4回）出現するようバランスを調整している。
     *
     * indicator と member_statuses のカラム名を一致させることで、
     * コントローラー側で動的プロパティとして参照できる。
     */
    public function run(): void
    {
        $questions = [
            // Q1: ライブパフォーマンスへの着目点
            // → visual / singing / dancing / variety の4指標
            [
                'question_text' => 'ライブパフォーマンスで一番引き込まれるのは？',
                'choices' => [
                    ['choice_text' => '輝くような美しいビジュアル',        'indicator' => 'visual'],
                    ['choice_text' => '心に響く歌声と豊かな表現力',         'indicator' => 'singing'],
                    ['choice_text' => '力強さとキレのあるダンス',           'indicator' => 'dancing'],
                    ['choice_text' => 'MCでのトークの面白さ・場の盛り上げ', 'indicator' => 'variety'],
                ],
            ],

            // Q2: グループに必要な存在
            // → leadership / singing / dancing / visual の4指標
            [
                'question_text' => 'グループに欠かせない存在は？',
                'choices' => [
                    ['choice_text' => 'グループをまとめるリーダー',               'indicator' => 'leadership'],
                    ['choice_text' => '歌でグループの世界観を表現するボーカル',   'indicator' => 'singing'],
                    ['choice_text' => 'ステージを彩るパフォーマー',               'indicator' => 'dancing'],
                    ['choice_text' => '見た目でグループを引き立てるビジュアル担当', 'indicator' => 'visual'],
                ],
            ],

            // Q3: 推しの魅力
            // → visual / singing / variety / leadership の4指標
            [
                'question_text' => '推しのどんなところに一番グッとくる？',
                'choices' => [
                    ['choice_text' => '写真集やグラビアで魅せる美しさ',         'indicator' => 'visual'],
                    ['choice_text' => '音楽番組での圧巻の歌声',                 'indicator' => 'singing'],
                    ['choice_text' => 'バラエティ番組でのキャラクターの面白さ', 'indicator' => 'variety'],
                    ['choice_text' => 'メンバーへの気遣いや引っ張る力',         'indicator' => 'leadership'],
                ],
            ],

            // Q4: 友達へのアピールポイント
            // → dancing / singing / variety / leadership の4指標
            [
                'question_text' => '友達に一番アピールしたいアイドルの魅力は？',
                'choices' => [
                    ['choice_text' => '「ダンスがプロ級なんだよ！」',             'indicator' => 'dancing'],
                    ['choice_text' => '「歌が上手すぎて泣ける！」',               'indicator' => 'singing'],
                    ['choice_text' => '「バラエティで笑いがとれる！」',           'indicator' => 'variety'],
                    ['choice_text' => '「グループの精神的支柱なんだよ！」',       'indicator' => 'leadership'],
                ],
            ],

            // Q5: アイドルに求める輝き
            // → visual / leadership / dancing / variety の4指標
            [
                'question_text' => 'アイドルに求める一番の輝きは？',
                'choices' => [
                    ['choice_text' => '惹きつける圧倒的なビジュアル',   'indicator' => 'visual'],
                    ['choice_text' => 'グループを率いるカリスマ性',     'indicator' => 'leadership'],
                    ['choice_text' => '見る者を魅了するダンス',         'indicator' => 'dancing'],
                    ['choice_text' => '場を和ませるバラエティ力',       'indicator' => 'variety'],
                ],
            ],
        ];

        foreach ($questions as $q) {
            $question = DiagnosisQuestion::create([
                'question_text' => $q['question_text'],
            ]);

            foreach ($q['choices'] as $choice) {
                DiagnosisChoice::create([
                    'question_id' => $question->id,
                    'choice_text' => $choice['choice_text'],
                    'indicator'   => $choice['indicator'],
                ]);
            }
        }
    }
}
