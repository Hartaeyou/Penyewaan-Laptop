@extends('layout.Admin.main')
@section('title', 'addUnit')
@section('content')
<div class="container">
    <h1>Add New Unit</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('addUnit') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="unit_name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="unit_code">Code</label>
                <input type="text" name="code" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category">Description</label>
                <input type="text" name="description" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category">Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantity">Category</label>
                <input type="number" name="category_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="inputGroupFile01">Upload</label>
                <input type="file" class="form-control" name="foto_product" id="inputGroupFile01">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
</div>
@endsection