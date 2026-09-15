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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('roll_no')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            // $table->date  ('dob')->nullable();;
            // $table->integer('dob_day'); 
            // $table->integer('dob_month');
            // $table->integer('dob_year');
            $table->date('dob')->nullable();
            $table->string('mobile_no');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender');
            $table->string('department');
            $table->string('course');
            $table->string('photo')->nullable(); // ছবির পাথ সেভ করার জন্য
            $table->string('city');
            $table->text('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};