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
    // すでにマイグレーションが存在する場合は、カラムが存在しないときのみ追加する
    if (!Schema::hasColumn('diagnosis_choices', 'indicator')) {
        Schema::table('diagnosis_choices', function (Blueprint $table) {
            $table->string('indicator')->after('choice_text');
            });
        }
    }

public function down(): void
    {
    // カラムが存在する場合のみ削除する
    if (Schema::hasColumn('diagnosis_choices', 'indicator')) {
        Schema::table('diagnosis_choices', function (Blueprint $table) {
            $table->dropColumn('indicator');
            });
        }
    }
};
