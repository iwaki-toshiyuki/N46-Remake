<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\DiagnosisQuestionController;
use App\Models\Member;
use App\Models\DiagnosisQuestion;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ヘルスチェック用のエンドポイント
Route::get('/health', function () {
    return ['status' => 'ok'];
});

// Supabase スリープ防止用のpingエンドポイント
// 外部cronサービス（cron-job.org など）から10分おきに叩く
Route::get('/ping', function () {
    try {
        \Illuminate\Support\Facades\DB::selectOne('SELECT 1');
        return response()->json(['status' => 'ok']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error'], 500);
    }
});

// メンバー関連のAPIエンドポイント
//Route::apiResource('members', MemberController::class);

// メンバーの一覧を取得するエンドポイント
Route::get('/members', function () {
    return \App\Models\Member::all();
});

// メンバーの詳細を取得するエンドポイント
Route::get('/members/{id}', [MemberController::class, 'show']);

// お気に入り登録のエンドポイント
Route::get('/diagnosis/questions', [DiagnosisController::class, 'questions']);

// 診断結果を保存するエンドポイント
Route::post('/diagnosis', [DiagnosisController::class, 'diagnose']);
