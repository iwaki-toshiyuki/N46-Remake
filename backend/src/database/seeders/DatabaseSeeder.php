<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // ① Member は毎回呼んでOK（createなら増える）
    $this->call(MemberSeeder::class);

    // ② MemberStatus は空のときだけ実行
    if (\App\Models\MemberStatus::count() === 0) {
        $this->call(MemberStatusSeeder::class);
    }

    // ③ 診断質問も空のときだけの方が安全
    if (\App\Models\DiagnosisQuestion::count() === 0) {
        $this->call(DiagnosisQuestionSeeder::class);
    }
}
}
