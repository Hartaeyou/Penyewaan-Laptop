@extends('layout.User.main')
@section('title', 'Dashboard')
@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-center" style="flex-direction: column">
        <div class="greetings">
            <h1 class="text-center">Selamat Datang <span class="text-primary">{{ Auth::user()->name }}!</span></h1>
            <h4 class="text-center">Di Halaman Dashboard</h4>
        </div>
        <div class="row mt-lg-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body bg-success">
                        <div class="float-left">
                            <h3 class="value-widget text-light">{{ $laptop }}</h3>
                            <label class="title-widget text-light">Laptop Tersedia</label>
                        </div>
                        <div class="float-right">
                            <i class="mdi mdi-cash-usd-outline mdi-48px"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-danger">
                    <div class="card-body">
                        <div class="float-left">
                            <h3 class="value-widget text-light">{{ $loans }}</h3>
                            <label class="title-widget text-light">Laptop yang dipinjam</label>
                        </div>
                        <div class="float-right">
                            <i class="mdi mdi-cash-usd-outline mdi-48px"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
