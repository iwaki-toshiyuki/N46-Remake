<?php

namespace App\Http\Controllers;

use App\Models\DiagnosisQuestion;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // 診断質問と選択肢を取得するエンドポイント
    public function questions()
    {
        $questions = DiagnosisQuestion::with('choices')
            ->get();

        return response()->json($questions);
    }

    /**
     * 推しメン診断を実行するAPI
     *
     * フロントから送られてきた選択肢ID配列を元に、
     * 各メンバーへの加点を集計し、最もスコアの高いメンバーを返却する。
     *
     */
public function diagnose(Request $request)
{
    // ----------------------------------------
    // ① リクエストから選択肢ID配列を取得
    // ----------------------------------------
    $choiceIds = $request->input('choice_ids');

    // ----------------------------------------
    // ② バリデーション（最低限の入力チェック）
    // choice_ids が存在しない、または配列でない場合は400エラーを返す
    // ----------------------------------------
    if (!$choiceIds || !is_array($choiceIds)) {
        return response()->json(['error' => 'Invalid input'], 400);
    }

    // ----------------------------------------
    // ③ メンバーごとのスコアを保持する配列を初期化
    // 形式: [member_id => total_score]
    // ----------------------------------------
    $scores = [];

    // ----------------------------------------
    // ④ 選択されたchoiceをまとめて取得（N+1回避のためwhereIn使用）
    // ----------------------------------------
    $choices = DiagnosisChoice::whereIn('id', $choiceIds)->get();

    // ----------------------------------------
    // ⑤ 各choiceに紐づく member_id に score を加算
    // 同じメンバーが複数回加点される可能性があるため累積処理
    // ----------------------------------------
    foreach ($choices as $choice) {
        $memberId = $choice->member_id;

        // まだスコアが存在しない場合は0からスタート
        $scores[$memberId] = ($scores[$memberId] ?? 0) + $choice->score;
    }

    // ----------------------------------------
    // ⑥ スコアを降順でソート（高得点順）
    // ----------------------------------------
    arsort($scores);

    // ----------------------------------------
    // ⑦ 最もスコアが高いメンバーIDを取得
    // array_key_first はソート後の先頭キーを取得
    // ----------------------------------------
    $topMemberId = array_key_first($scores);

    // ----------------------------------------
    // ⑧ 対象メンバーを取得
    // ----------------------------------------
    $member = Member::find($topMemberId);

    // ----------------------------------------
    // ⑨ 結果をJSONで返却
    // member: 診断結果の推しメン
    // scores: 各メンバーのスコア（デバッグ/拡張用）
    // ----------------------------------------
    return response()->json([
        'member' => $member,
        'scores' => $scores
    ]);
}
}
