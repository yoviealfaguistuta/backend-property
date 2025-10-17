<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->nullable()->constrained('admin')->nullOnDelete();
            $table->foreignId('agent_id')->nullable()->constrained('agents')->nullOnDelete();
            $table->foreignId('kategori_id')->constrained('kategori_properties')->cascadeOnDelete();
            $table->string('title');
            $table->text('deskripsi');
            $table->string('alamat');
            $table->string('kabupaten_kota');
            $table->string('provinsi');
            $table->decimal('harga', 15, 2);
            $table->string('satuan_harga'); // e.g., "per bulan", "per tahun"
            $table->string('whatsapp')->nullable(); // Nomor WA pemilik/agent
            $table->boolean('tersedia')->default(true);
            $table->enum('tipe', ['sewa', 'jual', 'property_baru']);
            $table->integer('kamar_tidur')->nullable();
            $table->integer('kamar_mandi')->nullable();
            $table->integer('luas_tanah')->nullable();
            $table->integer('luas_bangunan')->nullable();
            $table->string('sertifikat')->nullable();
            $table->integer('daya_listrik')->nullable();
            $table->integer('kamar_tidur_pembantu')->nullable();
            $table->integer('jumlah_lantai')->nullable();
            $table->string('kondisi_perabotan')->nullable();
            $table->string('hadap')->nullable();
            $table->string('sumber_air')->nullable();
            $table->string('hook')->nullable();
            $table->json('foto_gallery')->nullable(); // bisa menyimpan banyak foto dalam array JSON
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
