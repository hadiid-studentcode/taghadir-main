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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('guru_id')->references('id')->on('guru')->onDelete('cascade')->onUpdate('cascade');
            $table->date('date');
            $table->time('waktu_masuk');
            $table->time('waktu_keluar')->nullable();
            $table->enum('status', ['Hadir', 'Izin', 'Sakit', 'Mangkir'])->nullable();
            $table->float('poin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
