<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Agent;
use App\Models\KategoriProperty;
use Illuminate\Http\Request;


class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->get();
        
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        $agents = Agent::all();
        $categories = KategoriProperty::all();
        return view('properties.create', compact('agents', 'categories'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori_properties,id',
            'agent_id' => 'nullable|exists:agents,id',
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'kabupaten_kota' => 'required|string',
            'provinsi' => 'required|string',
            'harga' => 'required|numeric',
            'satuan_harga' => 'required|string',
            'whatsapp' => 'nullable|string',
            'tersedia' => 'boolean',
            'tipe' => 'required|in:sewa,jual,property_baru',
            'kamar_tidur' => 'nullable|integer',
            'kamar_mandi' => 'nullable|integer',
            'luas_tanah' => 'nullable|integer',
            'luas_bangunan' => 'nullable|integer',
            'sertifikat' => 'nullable|string',
            'daya_listrik' => 'nullable|integer',
            'kamar_tidur_pembantu' => 'nullable|integer',
            'jumlah_lantai' => 'nullable|integer',
            'kondisi_perabotan' => 'nullable|string',
            'hadap' => 'nullable|string',
            'sumber_air' => 'nullable|string',
            'hook' => 'nullable|string',
            'foto_gallery.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload multiple photos
        $galleryPaths = [];
        if ($request->hasFile('foto_gallery')) {
            foreach ($request->file('foto_gallery') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('image_properties'), $filename);
                $galleryPaths[] = 'image_properties/' . $filename;
            }
        }

        $validated['foto_gallery'] = $galleryPaths;
        // $validated['user_id'] = auth()->id();
        

        Property::create($validated);

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    public function edit(Property $property)
    {
        $agents = Agent::all();
        $categories = KategoriProperty::all();
        return view('properties.edit', compact('property', 'agents', 'categories'));
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori_properties,id',
            'agent_id' => 'nullable|exists:agents,id',
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'kabupaten_kota' => 'required|string',
            'provinsi' => 'required|string',
            'harga' => 'required|numeric',
            'satuan_harga' => 'required|string',
            'whatsapp' => 'nullable|string',
            'tersedia' => 'boolean',
            'tipe' => 'required|in:sewa,jual,property_baru',
            'kamar_tidur' => 'nullable|integer',
            'kamar_mandi' => 'nullable|integer',
            'luas_tanah' => 'nullable|integer',
            'luas_bangunan' => 'nullable|integer',
            'sertifikat' => 'nullable|string',
            'daya_listrik' => 'nullable|integer',
            'kamar_tidur_pembantu' => 'nullable|integer',
            'jumlah_lantai' => 'nullable|integer',
            'kondisi_perabotan' => 'nullable|string',
            'hadap' => 'nullable|string',
            'sumber_air' => 'nullable|string',
            'hook' => 'nullable|string',
            'foto_gallery.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $galleryPaths = $property->foto_gallery ?? [];

        if ($request->hasFile('foto_gallery')) {
            foreach ($request->file('foto_gallery') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('properties'), $filename);
                $galleryPaths[] = 'properties/' . $filename;
            }
        }

        $validated['foto_gallery'] = $galleryPaths;
        $property->update($validated);

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        // Hapus semua foto dari folder public
        if ($property->foto_gallery) {
            foreach ($property->foto_gallery as $foto) {
                $path = public_path($foto);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
