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
        Schema::table('notifications', function (Blueprint $table) {
            // Hanya mengubah kolom 'resep_id' menjadi nullable
            $table->foreignId('resep_id')->nullable()->constrained('reseps')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            // Mengembalikan kolom 'resep_id' menjadi tidak nullable
            $table->foreignId('resep_id')->constrained('reseps')->onDelete('cascade')->change();
        });
    }
};
