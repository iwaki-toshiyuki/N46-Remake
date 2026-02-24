<?php

namespace App\Http\Controllers;

use App\Models\DiagnosisChoice;
use App\Models\DiagnosisQuestion;
use App\Models\Member;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    /**
     * 診断質問と選択肢を取得するエンドポイント
     *
     * GET /api/diagnosis/questions
     */
    public function questions()
    {
        $questions = DiagnosisQuestion::with('choices')->get();

        return response()->json($questions);
    }

    /**
     * 推しメン診断を実行するAPI
     *
     * POST /api/diagnosis
     * body: { "choice_ids": number[] }
     *
     * ロジック概要:
     * 1. 選択された choice_ids から各 indicator の選択回数を集計する
     * 2. 全メンバーの member_statuses を取得し、
     *    「ユーザーが重視した指標のスコアが高いメンバー」ほど高得点になるよう計算する
     * 3. 最高得点のメンバーを結果として返す
     *
     * スコア計算式:
     *   member_score += member_status[indicator] × user_preference_count[indicator]
     * → ユーザーが選んだ指標を、そのメンバーがどれだけ得意としているかの積の合計
     */
    public function diagnose(Request $request)
    {
        // ----------------------------------------
        // ① リクエストから選択肢ID配列を取得・バリデーション
        // ----------------------------------------
        $choiceIds = $request->input('choice_ids');

        if (!$choiceIds || !is_array($choiceIds)) {
            return response()->json(['error' => 'Invalid input'], 400);
        }

        // ----------------------------------------
        // ② 選択された choice から indicator を集計
        // 例: ['visual' => 2, 'singing' => 1, ...]
        // N+1を避けるために whereIn でまとめて取得
        // ----------------------------------------
        $choices = DiagnosisChoice::whereIn('id', $choiceIds)->get();

        /** @var array<string, int> $indicatorCounts */
        $indicatorCounts = [];
        foreach ($choices as $choice) {
            $ind = $choice->indicator;
            $indicatorCounts[$ind] = ($indicatorCounts[$ind] ?? 0) + 1;
        }

        // ----------------------------------------
        // ③ 全メンバーと member_statuses を一括取得（N+1回避）
        // ----------------------------------------
        $members = Member::with('status')->get();

        // ----------------------------------------
        // ④ 各メンバーのスコアを計算
        // ユーザーが重視した指標 × そのメンバーの指標値 の合計
        // member_statuses のカラム名は indicator の値と一致している
        // ----------------------------------------
        /** @var array<int, int> $scores */
        $scores = [];
        foreach ($members as $member) {
            // status が未設定のメンバーはスキップ
            if (!$member->status) {
                continue;
            }

            $score = 0;
            foreach ($indicatorCounts as $indicator => $count) {
                // member_status の動的プロパティで指標値を取得
                $score += ($member->status->{$indicator} ?? 0) * $count;
            }

            $scores[$member->id] = $score;
        }

        // スコアが存在しない場合はエラーを返す
        if (empty($scores)) {
            return response()->json(['error' => 'No members found'], 500);
        }

        // ----------------------------------------
        // ⑤ 最もスコアが高いメンバーを選出
        // ----------------------------------------
        arsort($scores);
        $topMemberId = array_key_first($scores);
        $member = Member::with('status')->find($topMemberId);

        return response()->json([
            'member' => $member,
        ]);
    }
}
