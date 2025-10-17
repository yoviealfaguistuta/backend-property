<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProperty extends Model
{
    use HasFactory;

    protected $table = 'kategori_properties';
    protected $fillable = ['nama_kategori', 'deskripsi', 'gambar'];
}
