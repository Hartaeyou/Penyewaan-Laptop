@extends('layout.Admin.main')
@section('title', 'Unit')
@section('content')
<table class="table border mt-5">

    <a href="{{ route('viewAddUnit') }}" class="btn btn-primary mb-3 mt-2">Add Unit</a>
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
        <td>{{ $unit->category->name  }}</td>
        <td>{{ $unit->code }}</td> 
        <td>{{ $unit->name }}</td> 
        <td>{{ $unit->price }}</td> 
        <td>{{ $unit->status }}</td> 
        <td>{{ $unit->description }}</td>
        <td class="d-flex justify-content-center align-items-center">
            <a href="{{ route('viewEditUnit', $unit->id) }}" class="btn btn-warning mx-1">Edit</a>
            <a href="{{ route('deleteUnit', $unit->id) }}" class="btn btn-danger mx-1">delete</a>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection