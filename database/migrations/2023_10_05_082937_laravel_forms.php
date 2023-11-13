<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laravel_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('mail', 255);
            $table->unsignedInteger('age');
            $table->foreignId('tech_id')->constrained('laravel_technologies', 'tech_id');
            // 16行目は以下の2行を省略したものであります。16行目単体で実行したらエラーは出ないが、2行で実行するとエラーが出る。
            // $table->unsignedBigInteger('tech_id');
            // $table->foreign('tech_id')->references('tech_id')->on('laravel_technologies');

            // $table->string('birthplace', 255);　//追加カラム
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laravel_forms');
    }
};