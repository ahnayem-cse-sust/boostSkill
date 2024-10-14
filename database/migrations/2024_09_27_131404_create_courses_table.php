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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('course_category_id')->nullable();
            $table->string('course_type')->nullable();
            $table->string('course_level')->nullable();
            $table->string('teacher_id')->nullable();
            $table->string('total_hours')->nullable();
            $table->string('details')->nullable();
            $table->string('status')->nullable();
            $table->string('price')->nullable();
            $table->string('discount_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
