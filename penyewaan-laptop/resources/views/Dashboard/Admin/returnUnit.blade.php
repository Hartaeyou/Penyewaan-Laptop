@extends('layout.Admin.main')
@section('title', 'Loan')
@section('content')
<div class='container'>
    <form action="{{ route('penaltyFee', $loan->id) }}" method="Post">
        @csrf
        <input type="hidden" name="unit" value="{{ $loan->unit_id }}">
        <input type="hidden" name="price" value="{{ $loan->unit->price }}">
        <div class="mb-3">
            <label for="NameLoan" class="form-label">Nama Peminjam</label>
            <input type="text" class="form-control" id="NameLoan" value="{{ $loan->user->name }}" name="NameLoan" readonly>
        </div>
        <div class="mb-3">
            <label for="LaptopName" class="form-label">Nama Laptop</label>
            <input type="text" class="form-control" id="LaptopName" value="{{ $loan->unit->name }}" name="LaptopName" readonly>
        </div>
        <div class="mb-3">
            <label for="LaptopCategory" class="form-label">Kategori Laptop</label>
            <input type="text" class="form-control" id="LaptopCategory" value="{{ $loan->unit->category->name }}" name="LaptopCategory" readonly>
        </div>
        <div class="mb-3">
            <label for="LaptopPrice" class="form-label">Harga</label>
            <input type="text" class="form-control" id="LaptopPrice" value="{{ $loan->unit->price }}" name="LaptopPrice" readonly>
        </div>
        <div class="mb-3">
            <label for="tanggalPinjam" class="form-label">Tanggal Peminjaman</label>
            <input type="date" class="form-control" id="tanggalPinjam" value="{{ $loan->borrow_date }}" name="tanggalPinjam" readonly>
        </div>
        <div class="mb-3">
            <label for="dueDate" class="form-label">Tanggal Rencana Kembali</label>
            <input type="date" class="form-control" name="dueDate" id="dueDate" value="{{ $loan->due_date }}" readonly>
        </div>
        <div class="mb-3">
            <label for="returnDate" class="form-label">Tanggal Pengembalian Aktual</label>
            <input type="date" class="form-control" id="returnDate" name="returnDate" readonly onchange="calculatePenalty() ">
        </div>
        <button type="submit" class="btn btn-success mt-4 mb-4 mx-1">Approve Return</button>
    </form>
</div>

<script>
    // Fungsi untuk mengatur tanggal hari ini ke input returnDate
    window.onload = function() {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('returnDate').value = today;
    };
</script>
@endsection
