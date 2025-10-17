<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kategori_properties', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori'); // Contoh: Rumah, Apartemen, Kos-kosan
            $table->text('deskripsi')->nullable();
            $table->text('gambar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori_properties');
    }
};
