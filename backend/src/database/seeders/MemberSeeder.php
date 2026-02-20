<?php

namespace Database\Seeders;
use App\Models\Member;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 3期生
        Member::create([
            'name' => '伊藤 理々杏',
            'nickname' => 'りりあ',
            'generation' => 3,
            'birthday' => '2002-10-08',
            'image_url' => null,
            'description' => '乃木坂46 3期生メンバー',
        ]);

        Member::create([
            'name' => '岩本 蓮加',
            'nickname' => 'れんか',
            'generation' => 3,
            'birthday' => '2004-02-02',
            'image_url' => null,
            'description' => '乃木坂46 3期生メンバー',
        ]);

        Member::create([
            'name' => '梅澤 美波',
            'nickname' => 'みなみ',
            'generation' => 3,
            'birthday' => '1999-01-06',
            'image_url' => null,
            'description' => '乃木坂46 3期生メンバー',
        ]);

        Member::create([
            'name' => '吉田 綾乃クリスティー',
            'nickname' => 'あやの',
            'generation' => 3,
            'birthday' => '1995-09-06',
            'image_url' => null,
            'description' => '乃木坂46 3期生メンバー',
        ]);

        // 4期生
        Member::create([
            'name' => '遠藤 さくら',
            'nickname' => 'さくら',
            'generation' => 4,
            'birthday' => '2001-10-03',
            'image_url' => null,
            'description' => '乃木坂46 4期生メンバー',
        ]);

        Member::create([
            'name' => '賀喜 遥香',
            'nickname' => 'はるか',
            'generation' => 4,
            'birthday' => '2001-08-08',
            'image_url' => null,
            'description' => '乃木坂46 4期生メンバー',
        ]);

        Member::create([
            'name' => '金川 紗耶',
            'nickname' => 'さや',
            'generation' => 4,
            'birthday' => '2001-10-31',
            'image_url' => null,
            'description' => '乃木坂46 4期生メンバー',
        ]);

        Member::create([
            'name' => '黒見 明香',
            'nickname' => 'はるか',
            'generation' => 4,
            'birthday' => '2004-01-19',
            'image_url' => null,
            'description' => '乃木坂46 4期生メンバー',
        ]);

        Member::create([
            'name' => '佐藤 璃果',
            'nickname' => 'りか',
            'generation' => 4,
            'birthday' => '2001-08-09',
            'image_url' => null,
            'description' => '乃木坂46 4期生メンバー',
        ]);

        Member::create([
            'name' => '柴田 柚菜',
            'nickname' => 'ゆな',
            'generation' => 4,
            'birthday' => '2003-03-03',
            'image_url' => null,
            'description' => '乃木坂46 4期生メンバー',
        ]);

        Member::create([
            'name' => '田村 真佑',
            'nickname' => 'まゆ',
            'generation' => 4,
            'birthday' => '1999-01-12',
            'image_url' => null,
            'description' => '乃木坂46 4期生メンバー',
        ]);

        Member::create([
            'name' => '筒井 あやめ',
            'nickname' => 'あやめ',
            'generation' => 4,
            'birthday' => '2004-06-08',
            'image_url' => null,
            'description' => '乃木坂46 4期生メンバー',
        ]);

        Member::create([
            'name' => '林 瑠奈',
            'nickname' => 'るな',
            'generation' => 4,
            'birthday' => '2003-10-02',
            'image_url' => null,
            'description' => '乃木坂46 4期生メンバー',
        ]);

        Member::create([
            'name' => '弓木 奈於',
            'nickname' => 'なお',
            'generation' => 4,
            'birthday' => '1999-02-03',
            'image_url' => null,
            'description' => '乃木坂46 4期生メンバー',
        ]);

        // 5期生
        Member::create([
            'name' => '五百城 茉央',
            'nickname' => 'まお',
            'generation' => 5,
            'birthday' => '2005-07-29',
            'image_url' => null,
            'description' => '乃木坂46 5期生メンバー',
        ]);

        Member::create([
            'name' => '池田 瑛紗',
            'nickname' => 'てれさ',
            'generation' => 5,
            'birthday' => '2002-05-12',
            'image_url' => null,
            'description' => '乃木坂46 5期生メンバー',
        ]);

        Member::create([
            'name' => '一ノ瀬 美空',
            'nickname' => 'みく',
            'generation' => 5,
            'birthday' => '2003-05-24',
            'image_url' => null,
            'description' => '乃木坂46 5期生メンバー',
        ]);

        Member::create([
            'name' => '井上 和',
            'nickname' => 'なぎ',
            'generation' => 5,
            'birthday' => '2005-02-17',
            'image_url' => null,
            'description' => '乃木坂46 5期生メンバー',
        ]);

        Member::create([
            'name' => '岡本 姫奈',
            'nickname' => 'ひな',
            'generation' => 5,
            'birthday' => '2003-12-17',
            'image_url' => null,
            'description' => '乃木坂46 5期生メンバー',
        ]);

        Member::create([
            'name' => '小川 彩',
            'nickname' => 'あや',
            'generation' => 5,
            'birthday' => '2007-06-27',
            'image_url' => null,
            'description' => '乃木坂46 5期生メンバー',
        ]);

        Member::create([
            'name' => '奥田 いろは',
            'nickname' => 'いろは',
            'generation' => 5,
            'birthday' => '2005-08-20',
            'image_url' => null,
            'description' => '乃木坂46 5期生メンバー',
        ]);

        Member::create([
            'name' => '川﨑 桜',
            'nickname' => 'さくら',
            'generation' => 5,
            'birthday' => '2003-04-17',
            'image_url' => null,
            'description' => '乃木坂46 5期生メンバー',
        ]);

        Member::create([
            'name' => '菅原 咲月',
            'nickname' => 'さつき',
            'generation' => 5,
            'birthday' => '2005-10-31',
            'image_url' => null,
            'description' => '乃木坂46 5期生メンバー',
        ]);

        Member::create([
            'name' => '冨里 奈央',
            'nickname' => 'なお',
            'generation' => 5,
            'birthday' => '2006-09-18',
            'image_url' => null,
            'description' => '乃木坂46 5期生メンバー',
        ]);

        Member::create([
            'name' => '中西 アルノ',
            'nickname' => 'アルノ',
            'generation' => 5,
            'birthday' => '2003-03-17',
            'image_url' => null,
            'description' => '乃木坂46 5期生メンバー',
        ]);

        // 6期生
        Member::create([
            'name' => '愛宕 心響',
            'nickname' => 'ここね',
            'generation' => 6,
            'birthday' => '2005-09-17',
            'image_url' => null,
            'description' => '乃木坂46 6期生メンバー',
        ]);

        Member::create([
            'name' => '大越 ひなの',
            'nickname' => 'ひなの',
            'generation' => 6,
            'birthday' => '2004-12-01',
            'image_url' => null,
            'description' => '乃木坂46 6期生メンバー',
        ]);

        Member::create([
            'name' => '小津 玲奈',
            'nickname' => 'れいな',
            'generation' => 6,
            'birthday' => '2007-04-17',
            'image_url' => null,
            'description' => '乃木坂46 6期生メンバー',
        ]);

        Member::create([
            'name' => '海邉 朱莉',
            'nickname' => 'あかり',
            'generation' => 6,
            'birthday' => '2007-02-14',
            'image_url' => null,
            'description' => '乃木坂46 6期生メンバー',
        ]);

        Member::create([
            'name' => '川端 晃菜',
            'nickname' => 'ひな',
            'generation' => 6,
            'birthday' => '2011-01-14',
            'image_url' => null,
            'description' => '乃木坂46 6期生メンバー',
        ]);

        Member::create([
            'name' => '鈴木 佑捺',
            'nickname' => 'ゆうな',
            'generation' => 6,
            'birthday' => '2006-05-18',
            'image_url' => null,
            'description' => '乃木坂46 6期生メンバー',
        ]);

        Member::create([
            'name' => '瀬戸口 心月',
            'nickname' => 'みつき',
            'generation' => 6,
            'birthday' => '2005-07-16',
            'image_url' => null,
            'description' => '乃木坂46 6期生メンバー',
        ]);

        Member::create([
            'name' => '長嶋 凛桜',
            'nickname' => 'りお',
            'generation' => 6,
            'birthday' => '2007-05-25',
            'image_url' => null,
            'description' => '乃木坂46 6期生メンバー',
        ]);

        Member::create([
            'name' => '増田 三莉音',
            'nickname' => 'みりね',
            'generation' => 6,
            'birthday' => '2009-11-01',
            'image_url' => null,
            'description' => '乃木坂46 6期生メンバー',
        ]);

        Member::create([
            'name' => '森平 麗心',
            'nickname' => 'うるみ',
            'generation' => 6,
            'birthday' => '2008-10-05',
            'image_url' => null,
            'description' => '乃木坂46 6期生メンバー',
        ]);

        Member::create([
            'name' => '矢田 萌華',
            'nickname' => 'もえか',
            'generation' => 6,
            'birthday' => '2008-01-27',
            'image_url' => null,
            'description' => '乃木坂46 6期生メンバー',
        ]);
    }
}
