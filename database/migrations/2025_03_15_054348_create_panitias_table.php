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
        Schema::create('panitias', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('nama');
            $table->string('section');
            $table->string('rektorat')->nullable();
            $table->integer('status')->default(0);
            $table->text('qr_code')->nullable();
            $table->text('foto')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panitias');
    }
};
