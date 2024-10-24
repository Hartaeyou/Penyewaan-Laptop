@extends('layout.Admin.main')
@section('title', 'Loan')
@section('content')
<div class='container'>
    <form action="{{ route('penaltyFee',$loan->id) }}" method="Post">
        @csrf
        <input type="hidden" name="price" value="{{ $loan->unit->price }}">
        <div class="mb-3">
            <label for="NameLoan" class="form-label">Nama Peminjam</label>
            <input type="text" class="form-control" id="NameLoan" value="{{ $loan->user->name }}" name="NameLoan" disabled>
        </div>
        <div class="mb-3">
            <label for="LaptopName" class="form-label">Nama Laptop</label>
            <input type="text" class="form-control" id="LaptopName" value="{{ $loan->unit->name }}" name="LaptopName" disabled>
        </div>
        <div class="mb-3">
            <label for="LaptopCategory" class="form-label">Kategori Laptop</label>
            <input type="text" class="form-control" id="LaptopCategory" value="{{ $loan->unit->category->name }}" name="LaptopCategory" disabled>
        </div>
        <div class="mb-3">
            <label for="LaptopCategory" class="form-label">Harga</label>
            <input type="text" class="form-control" id="LaptopCategory" value="{{ $loan->unit->price }}" name="LaptopCategory" disabled>
        </div>
        <div class="mb-3">
            <label for="tanggalPinjam" class="form-label">Tanggal Peminjaman</label>
            <input type="date" class="form-control" id="tanggalPinjam" value="{{ $loan->borrow_date }}" name="tanggalPinjam" disabled>
        </div>
        <div class="mb-3">
            <label for="dueDate" class="form-label">Tanggal Rencana Kembali</label>
            <input type="date" class="form-control" name="dueDate" id="dueDate" value="{{ $loan->due_date }}"  disabled>
        </div>
        <div class="mb-3">
            <label for="returnDate" class="form-label">Tanggal Pengembalian Aktual</label>
            <input type="date" class="form-control" id="returnDate" min={{ $loan->borrow_date }}  value="{{ $loan->return_date }}" name="returnDate" onchange="calculatePenalty()">
        </div>
        <button type="submit" class="btn btn-success mt-4 mb-4 mx-1">Approve Return</button>
    </form>
</div>
@endsection