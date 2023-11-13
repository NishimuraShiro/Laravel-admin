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
        Schema::table('laravel_forms', function (Blueprint $table) {
            $table->timestamps(); //作成日時カラム（created_at）、更新日時カラム（updated_at）の追加
            // 以下の２行を省略したら、15行目になる
            // $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes(); // 論理削除（データ削除しても復元可能）deleted_atカラムの追加
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laravel_forms', function (Blueprint $table) {
            // マイグレーションファイルのロールバック時にカラムを削除
            $table->dropTimestamps();
            $table->dropSoftDeletes();
        });
    }
};