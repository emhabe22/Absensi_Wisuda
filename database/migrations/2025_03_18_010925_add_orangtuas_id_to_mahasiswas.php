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
        Schema::table('mahasiswas', function (Blueprint $table) {
            if (!Schema::hasColumn('mahasiswas', 'orang_tua_id')) {
                $table->unsignedBigInteger('orang_tua_id')->nullable();
                $table->foreign('orang_tua_id')->references('id')->on('orang_tuas')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            if (Schema::hasColumn('mahasiswas', 'orang_tua_id')) {
                $table->dropForeign(['orang_tua_id']);
                $table->dropColumn('orang_tua_id');
            }
        });
    }
};
