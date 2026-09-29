<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * 2026/09/29時点で卒業したメンバーを本番DBから削除する
 *
 * 本番（Render）は起動時に migrate --force のみ実行され、Seeder は実行されないため、
 * Seeder からの削除とあわせて、既存データの削除をマイグレーションで行う。
 * member_statuses / favorites / diagnosis_results は onDelete('cascade') により一緒に削除される。
 */
return new class extends Migration
{
    // 削除対象のメンバー（down で復元するためのデータも保持）
    private array $members = [
        [
            'member' => [
                'name' => '梅澤 美波',
                'nickname' => 'みなみ',
                'generation' => 3,
                'birthday' => '1999-01-06',
                'description' => '乃木坂46 3期生メンバー',
            ],
            'status' => ['visual' => 5, 'dancing' => 5, 'singing' => 4, 'variety' => 5, 'leadership' => 5],
        ],
        [
            'member' => [
                'name' => '吉田 綾乃クリスティー',
                'nickname' => 'あやの',
                'generation' => 3,
                'birthday' => '1995-09-06',
                'description' => '乃木坂46 3期生メンバー',
            ],
            'status' => ['visual' => 4, 'dancing' => 3, 'singing' => 3, 'variety' => 3, 'leadership' => 3],
        ],
        [
            'member' => [
                'name' => '佐藤 璃果',
                'nickname' => 'りか',
                'generation' => 4,
                'birthday' => '2001-08-09',
                'description' => '乃木坂46 4期生メンバー',
            ],
            'status' => ['visual' => 4, 'dancing' => 3, 'singing' => 3, 'variety' => 3, 'leadership' => 3],
        ],
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 存在する場合のみ削除される（新規環境では何もしない）
        DB::table('members')
            ->whereIn('name', array_column(array_column($this->members, 'member'), 'name'))
            ->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 削除したメンバーとステータスを復元する（お気に入り・診断結果は復元できない）
        foreach ($this->members as $data) {
            if (DB::table('members')->where('name', $data['member']['name'])->exists()) {
                continue;
            }

            $now = now();
            $memberId = DB::table('members')->insertGetId(
                $data['member'] + ['image_url' => null, 'created_at' => $now, 'updated_at' => $now]
            );

            DB::table('member_statuses')->insert(
                $data['status'] + ['member_id' => $memberId, 'created_at' => $now, 'updated_at' => $now]
            );
        }
    }
};
