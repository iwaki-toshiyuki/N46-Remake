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
        Schema::create('diagnosis_choices', function (Blueprint $table) {
            $table->id();

            // 外部キー（diagnosis_questions.id）
            $table->foreignId('question_id')
                ->constrained('diagnosis_questions')
                ->onDelete('cascade');

            // 選択肢のテキスト
            $table->string('choice_text', 255);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosis_choices');
    }
};
