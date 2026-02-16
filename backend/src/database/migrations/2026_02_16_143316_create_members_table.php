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
        Schema::create('members', function (Blueprint $table) {
            $table->id(); // 主キー
            $table->string('name', 50); // 名前
            $table->string('nickname', 100)->nullable(); // 愛称
            $table->integer('generation'); // 期生
            $table->date('birthday'); // 誕生日
            $table->string('image_url', 255)->nullable(); // 画像URL
            $table->text('description')->nullable(); // 説明文
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
