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
        Schema::create('rsvps', function (Blueprint $table) {
            $table->id();
            $table->string('template_slug')->index(); // platinum-lite, serene-glow, dll
            $table->string('name');
            $table->enum('status', ['Hadir', 'Tidak Hadir', 'Masih Ragu']);
            $table->text('message')->nullable();
            $table->timestamps();

            // Index combo untuk query cepat per template
            $table->index(['template_slug', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rsvps');
    }
};
