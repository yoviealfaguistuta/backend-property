<div class="mb-3">
    <label>Kategori</label>
    <select name="kategori_id" class="form-control" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ old('kategori_id', $property->kategori_id ?? '') == $cat->id ? 'selected' : '' }}>
                {{ $cat->nama_kategori }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $property->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi', $property->deskripsi ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control" required>{{ old('alamat', $property->alamat ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Kabupaten Kota</label>
    <textarea name="kabupaten_kota" class="form-control" required>{{ old('kabupaten_kota', $property->kabupaten_kota ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Provinsi</label>
    <textarea name="provinsi" class="form-control" required>{{ old('provinsi', $property->provinsi ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Satuan Harga</label>
    <textarea name="satuan_harga" class="form-control" required>{{ old('satuan_harga', $property->satuan_harga ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control" value="{{ old('harga', $property->harga ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Upload Foto Gallery</label>
    <input type="file" name="foto_gallery[]" class="form-control" multiple>
</div>
<div class="form-group">
    <label>Tipe</label>
    <select name="tipe" class="form-control" required>
        <option value="sewa" {{ old('tipe', $property->tipe ?? '') == 'sewa' ? 'selected' : '' }}>Sewa</option>
        <option value="jual" {{ old('tipe', $property->tipe ?? '') == 'jual' ? 'selected' : '' }}>Jual</option>
        <option value="property_baru" {{ old('tipe', $property->tipe ?? '') == 'property_baru' ? 'selected' : '' }}>Property Baru</option>
    </select>
</div>

<div class="form-group">
    <label>Tersedia</label><br>
    <input type="checkbox" name="tersedia" value="1"
        {{ old('tersedia', $property->tersedia ?? true) ? 'checked' : '' }}>
</div>

<div class="form-group">
    <label>Kamar Tidur</label>
    <input type="number" name="kamar_tidur" class="form-control"
        value="{{ old('kamar_tidur', $property->kamar_tidur ?? '') }}">
</div>

<div class="form-group">
    <label>Kamar Mandi</label>
    <input type="number" name="kamar_mandi" class="form-control"
        value="{{ old('kamar_mandi', $property->kamar_mandi ?? '') }}">
</div>

<div class="form-group">
    <label>Luas Tanah (m²)</label>
    <input type="number" name="luas_tanah" class="form-control"
        value="{{ old('luas_tanah', $property->luas_tanah ?? '') }}">
</div>

<div class="form-group">
    <label>Luas Bangunan (m²)</label>
    <input type="number" name="luas_bangunan" class="form-control"
        value="{{ old('luas_bangunan', $property->luas_bangunan ?? '') }}">
</div>

<div class="form-group">
    <label>Sertifikat</label>
    <input type="text" name="sertifikat" class="form-control"
        value="{{ old('sertifikat', $property->sertifikat ?? '') }}">
</div>

<div class="form-group">
    <label>Daya Listrik (Watt)</label>
    <input type="number" name="daya_listrik" class="form-control"
        value="{{ old('daya_listrik', $property->daya_listrik ?? '') }}">
</div>

<div class="form-group">
    <label>Kondisi Perabotan</label>
    <input type="text" name="kondisi_perabotan" class="form-control"
        value="{{ old('kondisi_perabotan', $property->kondisi_perabotan ?? '') }}">
</div>

<div class="form-group">
    <label>Hadap</label>
    <input type="text" name="hadap" class="form-control"
        value="{{ old('hadap', $property->hadap ?? '') }}">
</div>

<div class="form-group">
    <label>Sumber Air</label>
    <input type="text" name="sumber_air" class="form-control"
        value="{{ old('sumber_air', $property->sumber_air ?? '') }}">
</div>

<div class="form-group">
    <label>Hook</label>
    <input type="text" name="hook" class="form-control"
        value="{{ old('hook', $property->hook ?? '') }}">
</div>

<div class="form-group">
    <label>Foto Gallery</label>
    <input type="file" name="foto_gallery[]" class="form-control" multiple>
    {{-- @if (!empty($property->foto_gallery))
        <div class="mt-2">
            @foreach (json_decode($property->foto_gallery, true) as $foto)
                <img src="{{ asset('storage/' . $foto) }}" alt="Foto" width="100" class="me-2 mb-2 rounded border">
            @endforeach
        </div>
    @endif --}}
</div>


{{-- @if (!empty($property->foto_gallery))
    <div class="row">
        @foreach ($property->foto_gallery as $foto)
            <div class="col-md-2">
                <img src="{{ asset($foto) }}" class="img-fluid rounded">
            </div>
        @endforeach
    </div>
@endif --}}
