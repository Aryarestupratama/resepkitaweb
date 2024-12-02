<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('playlists', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('name');
        $table->timestamps();
    });

    Schema::create('playlist_resep', function (Blueprint $table) {
        $table->id();
        $table->foreignId('playlist_id')->constrained()->onDelete('cascade');
        $table->foreignId('resep_id')->constrained()->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlists');
    }
};
