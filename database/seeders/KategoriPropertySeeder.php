<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriPropertySeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            [
                'nama_kategori' => 'Rumah',
                'deskripsi' => 'Hunian nyaman untuk keluarga dengan berbagai tipe dan lokasi strategis.',
                'gambar' => 'https://cdn-icons-png.flaticon.com/512/602/602271.png',
            ],
            [
                'nama_kategori' => 'Tanah',
                'deskripsi' => 'Lahan strategis untuk investasi, pertanian, atau pembangunan properti.',
                'gambar' => 'https://cdn-icons-png.flaticon.com/512/8055/8055560.png',
            ],
            [
                'nama_kategori' => 'Apartemen',
                'deskripsi' => 'Tempat tinggal modern di pusat kota dengan fasilitas lengkap.',
                'gambar' => 'https://cdn-icons-png.flaticon.com/512/602/602211.png',
            ],
            [
                'nama_kategori' => 'Ruko',
                'deskripsi' => 'Bangunan multifungsi untuk usaha sekaligus tempat tinggal.',
                'gambar' => 'https://cdn-icons-png.flaticon.com/512/869/869636.png',
            ],
            [
                'nama_kategori' => 'Perkantoran',
                'deskripsi' => 'Gedung atau ruang kantor siap pakai untuk bisnis profesional.',
                'gambar' => 'https://cdn-icons-png.flaticon.com/512/2703/2703312.png',
            ],
            [
                'nama_kategori' => 'Gudang',
                'deskripsi' => 'Tempat penyimpanan barang dengan akses logistik yang mudah.',
                'gambar' => 'https://cdn-icons-png.flaticon.com/512/1350/1350237.png',
            ],
            [
                'nama_kategori' => 'Ruang Usaha',
                'deskripsi' => 'Ruang komersial untuk berbagai jenis usaha.',
                'gambar' => 'https://cdn-icons-png.flaticon.com/512/2275/2275973.png',
            ],
            [
                'nama_kategori' => 'Pabrik',
                'deskripsi' => 'Bangunan industri untuk kegiatan produksi skala besar.',
                'gambar' => 'https://cdn-icons-png.flaticon.com/512/1293/1293447.png',
            ],
            [
                'nama_kategori' => 'Hotel',
                'deskripsi' => 'Properti akomodasi untuk bisnis perhotelan dan penginapan.',
                'gambar' => 'https://cdn-icons-png.flaticon.com/512/422/422920.png',
            ],
            [
                'nama_kategori' => 'Kost',
                'deskripsi' => 'Hunian sementara dengan fasilitas lengkap untuk mahasiswa atau pekerja.',
                'gambar' => 'https://cdn-icons-png.flaticon.com/512/12218/12218356.png',
            ],
            [
                'nama_kategori' => 'Villa',
                'deskripsi' => 'Tempat menginap mewah dengan pemandangan indah dan suasana tenang.',
                'gambar' => 'https://cdn-icons-png.flaticon.com/512/4614/4614737.png',
            ],
        ];

        DB::table('kategori_properties')->insert($kategori);
    }
}
