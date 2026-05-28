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
        Schema::create('undangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('kategori'); // pernikahan, khitanan, ulang_tahun, wisuda, dll
            $table->integer('harga');
            $table->text('deskripsi');
            $table->json('fitur')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('preview_url')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->boolean('is_populer')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('undangans');
    }
};
