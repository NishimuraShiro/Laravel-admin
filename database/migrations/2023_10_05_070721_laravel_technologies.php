<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laravel_technologies', function (Blueprint $table) {
            $table->id('tech_id');
            $table->string('proficient_language', 255);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laravel_technologies');
    }
};