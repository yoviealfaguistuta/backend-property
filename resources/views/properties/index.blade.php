@include('layout.head')
<div class="container">
    <h2>Daftar Properti</h2>
    <a href="{{ route('properties.create') }}" class="btn btn-primary mb-3">Tambah Properti</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Harga</th>
                <th>Tipe</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $p)
                <tr>
                    <td>{{ $p->title }}</td>
                    <td>Rp {{ number_format($p->harga, 0, ',', '.') }} / {{ $p->satuan_harga }}</td>
                    <td>{{ ucfirst($p->tipe) }}</td>
                    <td>{{ $p->kategori->nama ?? '-' }}</td>
                    <td>
                        <a href="{{ route('properties.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('properties.destroy', $p->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('layout.footer')