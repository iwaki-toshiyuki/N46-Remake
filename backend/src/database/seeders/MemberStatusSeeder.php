<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MemberStatus;

class MemberStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 3期生
        MemberStatus::create([
            'member_id' => 1, // 伊藤 理々杏
            'visual' => 4,
            'dancing' => 4,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 2, // 岩本 蓮加
            'visual' => 4,
            'dancing' => 4,
            'singing' => 3,
            'variety' => 3,
            'leadership' => 3,
        ]);

        // 4期生
        MemberStatus::create([
            'member_id' => 3, // 遠藤 さくら
            'visual' => 5,
            'dancing' => 5,
            'singing' => 4,
            'variety' => 3,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 4, // 賀喜 遥香
            'visual' => 5,
            'dancing' => 4,
            'singing' => 5,
            'variety' => 5,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 5, // 金川 紗耶
            'visual' => 4,
            'dancing' => 5,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 6, // 黒見 明香
            'visual' => 4,
            'dancing' => 3,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 7, // 柴田 柚菜
            'visual' => 4,
            'dancing' => 3,
            'singing' => 5,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 8, // 田村 真佑
            'visual' => 4,
            'dancing' => 4,
            'singing' => 3,
            'variety' => 5,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 9, // 筒井 あやめ
            'visual' => 4,
            'dancing' => 4,
            'singing' => 4,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 10, // 林 瑠奈
            'visual' => 4,
            'dancing' => 4,
            'singing' => 4,
            'variety' => 3,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 11, // 弓木 奈於
            'visual' => 4,
            'dancing' => 4,
            'singing' => 3,
            'variety' => 5,
            'leadership' => 3,
        ]);

        // 5期生
        MemberStatus::create([
            'member_id' => 12, // 五百城 茉央
            'visual' => 5,
            'dancing' => 3,
            'singing' => 3,
            'variety' => 3,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 13, // 池田 瑛紗
            'visual' => 4,
            'dancing' => 3,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 14, // 一ノ瀬 美空
            'visual' => 5,
            'dancing' => 5,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 15, // 井上 和
            'visual' => 4,
            'dancing' => 3,
            'singing' => 5,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 16, // 岡本 姫奈
            'visual' => 4,
            'dancing' => 5,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 17, // 小川 彩
            'visual' => 4,
            'dancing' => 5,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 18, // 奥田 いろは
            'visual' => 4,
            'dancing' => 3,
            'singing' => 5,
            'variety' => 3,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 19, // 川﨑 桜
            'visual' => 4,
            'dancing' => 5,
            'singing' => 3,
            'variety' => 3,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 20, // 菅原 咲月
            'visual' => 5,
            'dancing' => 4,
            'singing' => 4,
            'variety' => 5,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 21, // 冨里 奈央
            'visual' => 4,
            'dancing' => 3,
            'singing' => 3,
            'variety' => 3,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 22, // 中西 アルノ
            'visual' => 4,
            'dancing' => 4,
            'singing' => 5,
            'variety' => 5,
            'leadership' => 3,
        ]);

        // 6期生
        MemberStatus::create([
            'member_id' => 23, // 愛宕 心響
            'visual' => 4,
            'dancing' => 3,
            'singing' => 3,
            'variety' => 3,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 24, // 大越 ひなの
            'visual' => 4,
            'dancing' => 4,
            'singing' => 3,
            'variety' => 3,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 25, // 小津 玲奈
            'visual' => 4,
            'dancing' => 5,
            'singing' => 3,
            'variety' => 3,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 26, // 海邉 朱莉
            'visual' => 4,
            'dancing' => 3,
            'singing' => 5,
            'variety' => 3,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 27, // 川端 晃菜
            'visual' => 4,
            'dancing' => 4,
            'singing' => 3,
            'variety' => 3,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 28, // 鈴木 佑捺
            'visual' => 4,
            'dancing' => 3,
            'singing' => 5,
            'variety' => 3,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 29, // 瀬戸口 心月
            'visual' => 5,
            'dancing' => 5,
            'singing' => 4,
            'variety' => 3,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 30, // 長嶋 凛桜
            'visual' => 4,
            'dancing' => 5,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 31, // 増田 三莉音
            'visual' => 4,
            'dancing' => 3,
            'singing' => 3,
            'variety' => 5,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 32, // 森平 麗心
            'visual' => 4,
            'dancing' => 3,
            'singing' => 5,
            'variety' => 3,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 33, // 矢田 萌華
            'visual' => 4,
            'dancing' => 3,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 4,
        ]);
    }
}
