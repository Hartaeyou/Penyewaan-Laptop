@extends('layout.User.main')
@section('title', 'Peminjaman Laptop')
@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 200vh; height: auto">
            <div class="card-body">
                <h5 class="card-title text-center">Ajukan Peminjaman</h5>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <form action="{{ route('loan') }}">
                            <input type="search" class="form-control" name="search" id="inlineFormInputGroup"
                                placeholder="Search....">
                        </form>
                    </div>
                    <div class="col-md-8">
                    </div>
                </div>
                @include('AjukanPinjam.components.table')
            </div>
        </div>
    </div>
</div>

@endsection
