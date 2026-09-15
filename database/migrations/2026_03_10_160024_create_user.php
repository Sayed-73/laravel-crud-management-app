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
     
    Schema::create('user', function (Blueprint $table) {
    $table->id();
    $table->string('full_name');
    $table->string('mobile_no');
    $table->string('email')->unique();
    $table->string('official_email')->unique();
    $table->string('password');
    $table->string('responsible_person')->nullable(); // এটিকে nullable করুন
    $table->string('department');
    $table->string('voip_user_name');
    $table->string('company_name');
    $table->string('extension_number');
    $table->string('status')->default('Inactive'); // এখানে ডিফল্ট মান দিন
    $table->timestamps();
});
}
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
