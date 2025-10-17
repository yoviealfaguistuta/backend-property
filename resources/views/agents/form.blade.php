<div class="row">
    <div class="col-md-6">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $agent->nama ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label>NIB</label>
        <input type="text" name="nib" class="form-control" value="{{ old('nib', $agent->nib ?? '') }}" required>
    </div>
    <div class="col-md-12 mt-2">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required>{{ old('alamat', $agent->alamat ?? '') }}</textarea>
    </div>
    <div class="col-md-6 mt-2">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $agent->email ?? '') }}">
    </div>
    <div class="col-md-6 mt-2">
        <label>Telepon</label>
        <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $agent->telepon ?? '') }}">
    </div>
    <div class="col-md-6 mt-2">
        <label>Nama Perusahaan</label>
        <input type="text" name="nama_perusahaan" class="form-control" value="{{ old('nama_perusahaan', $agent->nama_perusahaan ?? '') }}">
    </div>
    <div class="col-md-6 mt-2">
        <label>Foto Profile</label>
        <input type="file" name="foto_profile" class="form-control">
        @if(isset($agent) && $agent->foto_profile)
            <img src="{{ asset($agent->foto_profile) }}" class="mt-2" width="100">
        @endif
    </div>
    <div class="col-md-6 mt-2">
        <label>Foto Tambahan</label>
        <input type="file" name="foto" class="form-control">
        @if(isset($agent) && $agent->foto)
            <img src="{{ asset($agent->foto) }}" class="mt-2" width="100">
        @endif
    </div>
    <div class="col-md-6 mt-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="aktif" value="1" {{ old('aktif', $agent->aktif ?? true) ? 'checked' : '' }}>
            <label class="form-check-label">Aktif</label>
        </div>
    </div>
</div>