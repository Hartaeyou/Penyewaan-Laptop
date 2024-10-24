@extends('layout.Admin.main')
@section('title', 'dahboardUnit')
@section('content')
<table class="table border mt-5">
    <a href="{{ route('viewAddUnit') }}" class="btn btn-primary mb-3">Add Unit</a>
    <thead class="text-center">
        <tr>
            <th scope="col">Nomor</th>
            <th scope="col">Kategori</th>
            <th scope="col">Kode</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga Sewa</th>
            <th scope="col">Status</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($units as $key =>$unit)
        <tr>
        <th scope="row">{{ $key + 1 }}</th>
        <td>{{ $unit->category->name  }}</td> <!-- Display category name -->
        <td>{{ $unit->code }}</td> <!-- Assuming this is the code -->
        <td>{{ $unit->name }}</td> <!-- Assuming this is the name -->
        <td>{{ $unit->price }}</td> <!-- Assuming this is the price -->
        <td>{{ $unit->status }}</td> <!-- Assuming this is the status -->
        <td>{{ $unit->description }}</td> <!-- Assuming this is the description -->
        <td class="d-flex justify-content-center align-items-center">
            <a href="#" class="btn btn-warning mx-1">Edit</a>
            <a href="{{ route('deleteUnit', $units->id) }}" class="btn btn-danger mx-1">delete</a>
        </td>
        
        </tr>
        @endforeach
    </tbody>
</table>
@endsection