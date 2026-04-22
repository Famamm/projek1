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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('activity');
            $table->text('description')->nullable();
            $table->foreignId('ajuan_cuti_keagamaan_id')->nullable()->constrained('ajuan_cuti_keagamaans')->onDelete('cascade');
            $table->foreignId('ajuan_cuti_semester_id')->nullable()->constrained('ajuan_cuti_semesters')->onDelete('cascade');
            $table->foreignId('ajuan_kegiatan_kampus_id')->nullable()->constrained('ajuan_cuti_kampuses')->onDelete('cascade');
            $table->foreignId('ajuan_kegiatan_mandiri_id')->nullable()->constrained('ajuan_mandiris')->onDelete('cascade');
            $table->foreignId('ajuan_urgent_id')->nullable()->constrained('ajuan_urgents')->onDelete('cascade');
            $table->foreignId('ajuan_extend_id')->nullable()->constrained('ajuan_extends')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
