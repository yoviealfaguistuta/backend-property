<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('admin')->nullOnDelete();
            $table->string('nama');
            $table->string('nib');
            $table->text('alamat');
            $table->text('foto_profile');
            $table->text('nama_perusahaan')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('telepon')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
