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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 10)->unique();
            $table->string('nik')->unique();
            $table->string('nama', 50);
            $table->string('jurusan', 50);
            $table->string('email', 50)->unique();
            $table->string('no_hp', 15);
            $table->string('alamat', 100);
            $table->double('ipk',10);
            $table->string('foto', 100)->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
