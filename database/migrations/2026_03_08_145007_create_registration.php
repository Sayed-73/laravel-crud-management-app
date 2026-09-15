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
        
     Schema::create('registration', function (Blueprint $table) {
        $table->id();
        $table->string('student_id')->nullable();
        $table->string('first_name');
        $table->string('middle_name')->nullable();
        $table->string('last_name');
        $table->string('gender');
        $table->date('dob');
        $table->string('email')->unique();
        $table->string('phone');
        $table->string('program_applied');
        $table->string('campus');
        $table->string('program_year');
        $table->timestamps();
    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration');
    }
};
