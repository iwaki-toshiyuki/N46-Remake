<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('member_statuses', function (Blueprint $table) {
            $table->id();

            // 外部キー（members.id）
            $table->foreignId('member_id')
                    ->unique() // 1対1なので必須
                    ->constrained()
                    ->onDelete('cascade');

            // ステータス項目（例: 歌唱力、ダンス、バラエティ、ビジュアル、リーダーシップなど）
            $table->integer('singing')->default(0);
            $table->integer('dancing')->default(0);
            $table->integer('variety')->default(0);
            $table->integer('visual')->default(0);
            $table->integer('leadership')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_statuses');
    }
};
