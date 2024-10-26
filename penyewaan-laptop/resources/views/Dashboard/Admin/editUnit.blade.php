@extends('layout.Admin.main')
@section('title', 'EditLoan')
@section('content')

<div class="container">
    <h1>Edit Unit</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('updateUnit', $units->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="unit_name">Name</label>
            <input type="text" name="name" value="{{ $units->name }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="unit_code">Code</label>
            <input type="text" name="code" value="{{ $units->code }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Description</label>
            <input type="text" name="description" value="{{ $units->description }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Price</label>
            <input type="number" name="price" value="{{ $units->price }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantity">Category</label>
            <input type="number" name="category_id" value="{{ $units->category_id }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="Available" {{ $units->status == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Unavailable" {{ $units->status == 'Unavailable' ? 'selected' : '' }}>Unavailable</option>
            </select>
        </div>
        <div class="form-group">
            <label for="inputGroupFile01">Upload</label>
            <input type="file" class="form-control" name="foto_product" id="inputGroupFile01">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection