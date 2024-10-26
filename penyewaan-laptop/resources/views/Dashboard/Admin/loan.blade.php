@extends('layout.Admin.main')
@section('title', 'Loan')
@section('content')
<table class="table border mt-5">
    <thead class="text-center">
        <tr>
            <th scope="col">No</th>
            <th scope="col">User</th>
            <th scope="col">Unit</th>
            <th scope="col">Borrow Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($loans as $key =>$unit)
        <tr>
        <th scope="row">{{ $key + 1 }}</th>
        <td>{{ $unit->user->name }}</td>
        <td>{{ $unit->unit->name }}</td> 
        <td>{{ $unit->unit->borrow_date }}</td>
        <td>{{ $unit->status }}</td> 
        <td class="d-flex justify-content-center align-items-center">
            <a href="{{ route('approveLoan', $unit->id) }}" class="btn btn-success mx-1">Aproved</a>
            <a href="{{ route('rejectedLoan', $unit->id) }}" class="btn btn-danger mx-1">Rejected</a>
            <a href="{{ route('viewReturnUnit', $unit->id) }}" class="btn btn-primary mx-1">Approve Return</a>
            <a href="{{ route('pdfView', $unit->id) }}" class="btn btn-primary mx-1">History</a>
        </td>
        
        </tr>
        @endforeach
    </tbody>
</table>
@endsection