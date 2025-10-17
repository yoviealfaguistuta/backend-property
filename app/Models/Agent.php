<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nib',
        'alamat',
        'foto_profile',
        'nama_perusahaan',
        'email',
        'telepon',
        'foto',
        'aktif'
    ];
}
