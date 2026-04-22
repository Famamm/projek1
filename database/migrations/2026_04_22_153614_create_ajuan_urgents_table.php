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
        Schema::create('ajuan_urgents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained()->onDelete('cascade');
            $table->dateTime('tanggal_ajuan');
            $table->dateTime('tanggal_berangkat');
            $table->dateTime('tanggal_kembali');
            $table->string('tujuan');
            $table->string('alamat_tujuan');
            $table->enum('kendaraan', ['pribadi', 'umum']);
            $table->string('contact_person');
            $table->foreignId('pengasuh_id')->nullable()->constrained('pengasuhs')->onDelete('set null');
            $table->foreignId('pengelola_id')->nullable()->constrained('pengelolas')->onDelete('set null');
            $table->foreignId('admin_id')->nullable()->constrained('admin')->onDelete('set null');
            $table->date('verifikasi_pengasuh')->nullable();
            $table->date('verifikasi_pengelola')->nullable();
            $table->date('verifikasi_admin')->nullable();
            $table->string('bukti_verifikasi')->nullable();
            $table->enum('status', ['diajukan', 'diverifikasi_pengasuh', 'diverifikasi_pengelola', 'diverifikasi_admin', 'rejected'])->default('diajukan');
            $table->enum('jenis', ['normal', 'extend'])->default('normal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajuan_urgents');
    }
};
