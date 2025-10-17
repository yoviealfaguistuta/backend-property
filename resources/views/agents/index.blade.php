@include('layout.head')

        <div class="container">
            <h2>Agents List</h2>
            <a href="{{ route('agents.create') }}" class="btn btn-primary mb-3">+ Add Agent</a>
        
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Perusahaan</th>
                        <th>Aktif</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agents as $agent)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $agent->nama }}</td>
                        <td>{{ $agent->email }}</td>
                        <td>{{ $agent->telepon }}</td>
                        <td>{{ $agent->nama_perusahaan }}</td>
                        <td>{{ $agent->aktif ? '✅' : '❌' }}</td>
                        <td>
                            <a href="{{ route('agents.edit', $agent) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('agents.destroy', $agent) }}" method="POST" style="display:inline-block">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this agent?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
            {{ $agents->links() }}
        </div>
        
@include('layout.footer')