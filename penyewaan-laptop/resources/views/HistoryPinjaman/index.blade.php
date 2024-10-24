@extends('layout.User.main')
@section('title', 'History Peminjaman')
@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 200vh; height: auto">
            <div class="card-body">
                <h5 class="card-title text-center">History Peminjaman</h5>
                @include('HistoryPinjaman.components.table')
            </div>
        </div>
    </div>
</div>


@endsection
