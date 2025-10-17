@include('layout.head')

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <h2>Edit Kategori</h2>
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $kategori->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Gambar Sekarang</label><br>
            <img src="{{ asset('storage/' . $kategori->gambar) }}" width="120" class="mb-2">
        </div>
        <div class="mb-3">
            <label>Ganti Gambar (Opsional)</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@include('layout.footer')