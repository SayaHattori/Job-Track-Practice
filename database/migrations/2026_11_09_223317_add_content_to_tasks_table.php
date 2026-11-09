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
        Schema::table('tasks', function (Blueprint $table) {
            // tasks テーブルに string型の content カラムを追加する
            $table->string('content')->after('id'); // id カラムの後に追加（省略可能）
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // ロールバックした時にカラムを削除できるようにする
            $table->dropColumn('content');
        });
    }
};
