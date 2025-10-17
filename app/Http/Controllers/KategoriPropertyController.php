<?php

namespace App\Http\Controllers;

use App\Models\KategoriProperty;
use Illuminate\Http\Request;

class KategoriPropertyController extends Controller
{
    public function index()
    {
        $kategori = KategoriProperty::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file2 = $request->file('gambar');
            $filename2 = time() . '_' . $file2->getClientOriginalName();
            $file2->move(public_path('image_kategori'), $filename2);
            $validated['gambar'] = 'image_kategori/' . $filename2;
        }

        KategoriProperty::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => 'image_kategori/' . $filename2,
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(KategoriProperty $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    public function edit(KategoriProperty $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, KategoriProperty $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama_kategori', 'deskripsi']);

        if ($request->hasFile('gambar')) {

                $file2 = $request->file('gambar');
                $filename2 = time() . '_' . $file2->getClientOriginalName();
                $file2->move(public_path('image_kategori'), $filename2);
                $validated['gambar'] = 'image_kategori/' . $filename2;

            $data['gambar'] = 'image_kategori/' . $filename2;
        }

        $kategori->update($data);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(KategoriProperty $kategori)
    {
        if ($kategori->gambar && file_exists(public_path('storage/' . $kategori->gambar))) {
            unlink(public_path('storage/' . $kategori->gambar));
        }

        $kategori->delete();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
