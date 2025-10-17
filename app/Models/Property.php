<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kategori_id',
        'agent_id',
        'title',
        'deskripsi',
        'alamat',
        'kabupaten_kota',
        'provinsi',
        'harga',
        'satuan_harga',
        'whatsapp',
        'tersedia',
        'tipe',
        'kamar_tidur',
        'kamar_mandi',
        'luas_tanah',
        'luas_bangunan',
        'sertifikat',
        'daya_listrik',
        'kamar_tidur_pembantu',
        'jumlah_lantai',
        'kondisi_perabotan',
        'hadap',
        'sumber_air',
        'hook',
        'foto_gallery',
    ];

    protected $casts = [
        'foto_gallery' => 'array',
        'tersedia' => 'boolean',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriProperty::class, 'kategori_id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
