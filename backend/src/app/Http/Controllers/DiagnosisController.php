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
    * 診断結果を計算するエンドポイント
    * POST /api/diagnosis
        * リクエスト例:
        * {
        *   "choice_ids": [1, 5, 9, 13, 17] // ユーザーが選択した選択肢のID
        * }
        * レスポンス例:
        * {
        *   "member": {
        *     "id": 3,
        *     "name": "梅澤 美波",
        *     "status": {
        *       "visual": 5,
        *       "singing": 4,
        *       "dancing": 5,
        *       "variety": 5,
        *       "leadership": 5
        *     }
        *   }
        * }
     */
    public function diagnose(Request $request)
{
    // -----------------------------
    // ① リクエスト検証
    // -----------------------------
    $choiceIds = $request->input('choice_ids');

    if (!$choiceIds || !is_array($choiceIds)) {
        return response()->json(['error' => 'Invalid input'], 400);
    }

    // -----------------------------
    // ② indicator を集計（ユーザーベクトル作成）
    // -----------------------------
    $choices = DiagnosisChoice::whereIn('id', $choiceIds)->get();

    $indicatorCounts = [
        'visual' => 0,
        'singing' => 0,
        'dancing' => 0,
        'variety' => 0,
        'leadership' => 0,
    ];

    foreach ($choices as $choice) {
        $indicatorCounts[$choice->indicator]++;
    }

    // ユーザーベクトル（順序固定）
    $userVector = array_values($indicatorCounts);

    // -----------------------------
    // ③ 全メンバー取得
    // -----------------------------
    $members = Member::with('status')->get();

    $scores = [];

    foreach ($members as $member) {

        if (!$member->status) {
            continue;
        }

        // メンバーベクトル
        $memberVector = [
            $member->status->visual,
            $member->status->singing,
            $member->status->dancing,
            $member->status->variety,
            $member->status->leadership,
        ];

        // -----------------------------
        // ④ コサイン類似度を計算
        // -----------------------------
        $similarity = $this->cosineSimilarity($userVector, $memberVector);

        $scores[$member->id] = $similarity;
    }

    if (empty($scores)) {
        return response()->json(['error' => 'No members found'], 500);
    }

    // -----------------------------
    // ⑤ スコア順にソート
    // -----------------------------
    arsort($scores);

    // 上位3名を取得
    $topThreeIds = array_slice(array_keys($scores), 0, 3);

    // -----------------------------
    // ⑥ 上位3名からランダム選出
    // -----------------------------
    $winnerId = $topThreeIds[array_rand($topThreeIds)];

    $winner = Member::with('status')->find($winnerId);

    return response()->json([
        'member' => $winner,
        ]);
    }

    /**
     * コサイン類似度を計算
     * 2つのベクトルの「方向の近さ」を返す（0〜1）
     */
    private function cosineSimilarity(array $a, array $b): float
{
    $dotProduct = 0; // 共通度
    $normA = 0;      // ユーザーの強さ
    $normB = 0;      // メンバーの強さ

    foreach ($a as $i => $value) {
        $dotProduct += $value * $b[$i];  // 内積
        $normA += $value ** 2;           // ユーザーの長さ
        $normB += $b[$i] ** 2;           // メンバーの長さ
    }

    // 長さが0のベクトルがある場合は類似度0とする
    if ($normA == 0 || $normB == 0) {
        return 0;
    }

    // コサイン類似度 = 内積 / (ユーザーの長さ * メンバーの長さ)
    return $dotProduct / (sqrt($normA) * sqrt($normB));
}
}
