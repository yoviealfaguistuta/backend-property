@include('layout.head')
<div class="container">
    <h2>Edit Properti</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('properties.form')
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@include('layout.footer')