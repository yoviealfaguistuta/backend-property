@include('layout.head')
<div class="container">
    <h2>Daftar Kategori Properti</h2>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $k)
                <tr>
                    <td>{{ $k->id }}</td>
                    <td>
                        <img src="{{ asset($k->gambar) }}" alt="{{ $k->nama_kategori }}" width="80">
                    </td>
                    <td>{{ $k->nama_kategori }}</td>
                    <td>{{ $k->deskripsi }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('layout.footer')