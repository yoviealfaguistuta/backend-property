@include('layout.head')
<div class="container">
    <h2>Add Agent</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('agents.update', $agent) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('agents.form', ['agent' => $agent])
    <button type="submit" class="btn btn-primary mt-3">Update</button>
    <a href="{{ route('agents.index') }}" class="btn btn-secondary mt-3">Cancel</a>
</form>
@include('layout.footer')