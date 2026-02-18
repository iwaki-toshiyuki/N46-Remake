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
        // ダミーデータの作成
        Member::create([
            'name' => '遠藤 さくら',
            'nickname' => 'さく',
            'generation' => 4,
            'birthday' => '2001-10-03',
            'image_url' => null,
            'description' => '4期のセンター',
        ]);
    }
}
