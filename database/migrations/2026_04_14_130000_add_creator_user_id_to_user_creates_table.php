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
        Schema::table('user_creates', function (Blueprint $table) {
            $table->unsignedBigInteger('creator_user_id')->nullable()->after('password');
            $table->foreign('creator_user_id')->references('id')->on('user')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_creates', function (Blueprint $table) {
            $table->dropForeign(['creator_user_id']);
            $table->dropColumn('creator_user_id');
        });
    }
};