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
            'dancing' => 3,
            'singing' => 4,
            'variety' => 5,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 2, // 岩本 蓮加
            'visual' => 5,
            'dancing' => 4,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 3, // 梅澤 美波
            'visual' => 5,
            'dancing' => 5,
            'singing' => 4,
            'variety' => 4,
            'leadership' => 5,
        ]);

        MemberStatus::create([
            'member_id' => 4, // 吉田 綾乃クリスティー
            'visual' => 4,
            'dancing' => 5,
            'singing' => 3,
            'variety' => 3,
            'leadership' => 4,
        ]);

        // 4期生
        MemberStatus::create([
            'member_id' => 5, // 遠藤 さくら
            'visual' => 5,
            'dancing' => 4,
            'singing' => 5,
            'variety' => 4,
            'leadership' => 5,
        ]);

        MemberStatus::create([
            'member_id' => 6, // 賀喜 遥香
            'visual' => 5,
            'dancing' => 3,
            'singing' => 4,
            'variety' => 5,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 7, // 金川 紗耶
            'visual' => 4,
            'dancing' => 4,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 8, // 黒見 明香
            'visual' => 4,
            'dancing' => 5,
            'singing' => 4,
            'variety' => 3,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 9, // 佐藤 璃果
            'visual' => 3,
            'dancing' => 4,
            'singing' => 5,
            'variety' => 5,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 10, // 柴田 柚菜
            'visual' => 4,
            'dancing' => 3,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 2,
        ]);

        MemberStatus::create([
            'member_id' => 11, // 田村 真佑
            'visual' => 5,
            'dancing' => 4,
            'singing' => 4,
            'variety' => 3,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 12, // 筒井 あやめ
            'visual' => 4,
            'dancing' => 4,
            'singing' => 3,
            'variety' => 5,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 13, // 林 瑠奈
            'visual' => 3,
            'dancing' => 5,
            'singing' => 4,
            'variety' => 3,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 14, // 弓木 奈於
            'visual' => 4,
            'dancing' => 3,
            'singing' => 5,
            'variety' => 4,
            'leadership' => 3,
        ]);

        // 5期生
        MemberStatus::create([
            'member_id' => 15, // 五百城 茉央
            'visual' => 5,
            'dancing' => 4,
            'singing' => 4,
            'variety' => 5,
            'leadership' => 5,
        ]);

        MemberStatus::create([
            'member_id' => 16, // 池田 瑛紗
            'visual' => 4,
            'dancing' => 3,
            'singing' => 5,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 17, // 一ノ瀬 美空
            'visual' => 5,
            'dancing' => 4,
            'singing' => 4,
            'variety' => 3,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 18, // 井上 和
            'visual' => 4,
            'dancing' => 5,
            'singing' => 3,
            'variety' => 5,
            'leadership' => 5,
        ]);

        MemberStatus::create([
            'member_id' => 19, // 岡本 姫奈
            'visual' => 5,
            'dancing' => 4,
            'singing' => 4,
            'variety' => 4,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 20, // 小川 彩
            'visual' => 4,
            'dancing' => 3,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 21, // 奥田 いろは
            'visual' => 5,
            'dancing' => 5,
            'singing' => 4,
            'variety' => 3,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 22, // 川﨑 桜
            'visual' => 4,
            'dancing' => 4,
            'singing' => 5,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 23, // 菅原 咲月
            'visual' => 5,
            'dancing' => 3,
            'singing' => 4,
            'variety' => 5,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 24, // 冨里 奈央
            'visual' => 3,
            'dancing' => 4,
            'singing' => 5,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 25, // 中西 アルノ
            'visual' => 4,
            'dancing' => 5,
            'singing' => 4,
            'variety' => 3,
            'leadership' => 5,
        ]);

        // 6期生
        MemberStatus::create([
            'member_id' => 26, // 愛宕 心響
            'visual' => 4,
            'dancing' => 3,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 27, // 大越 ひなの
            'visual' => 5,
            'dancing' => 4,
            'singing' => 4,
            'variety' => 3,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 28, // 小津 玲奈
            'visual' => 4,
            'dancing' => 5,
            'singing' => 3,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 29, // 海邉 朱莉
            'visual' => 3,
            'dancing' => 4,
            'singing' => 4,
            'variety' => 5,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 30, // 川端 晃菜
            'visual' => 4,
            'dancing' => 3,
            'singing' => 5,
            'variety' => 4,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 31, // 鈴木 佑捺
            'visual' => 5,
            'dancing' => 4,
            'singing' => 3,
            'variety' => 3,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 32, // 瀬戸口 心月
            'visual' => 4,
            'dancing' => 5,
            'singing' => 4,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 33, // 長嶋 凛桜
            'visual' => 5,
            'dancing' => 4,
            'singing' => 3,
            'variety' => 5,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 34, // 増田 三莉音
            'visual' => 3,
            'dancing' => 3,
            'singing' => 4,
            'variety' => 4,
            'leadership' => 3,
        ]);

        MemberStatus::create([
            'member_id' => 35, // 森平 麗心
            'visual' => 4,
            'dancing' => 4,
            'singing' => 5,
            'variety' => 3,
            'leadership' => 4,
        ]);

        MemberStatus::create([
            'member_id' => 36, // 矢田 萌華
            'visual' => 5,
            'dancing' => 3,
            'singing' => 4,
            'variety' => 4,
            'leadership' => 5,
        ]);
    }
}
