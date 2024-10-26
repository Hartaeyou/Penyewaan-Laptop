<table class="table border mt-5">
    <thead>
        <tr>
            <th scope="col">Nomor</th>
            <th scope="col">Loan ID</th>
            <th scope="col">Kode Laptop</th>
            <th scope="col">Tanggal Peminjaman</th>
            <th scope="col">Tanggal Pengembalian</th>
            <th scope="col">Harga Disewa</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($loanDatas as $key => $loanData)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $loanData->id }}</td>
            <td>{{ $loanData->unit->code }}</td>
            <td>{{ $loanData->borrow_date }}</td>
            <td>{{ $loanData->due_date }}</td>
            <td>{{ $loanData->deliver_price }}</td>
            <td>{{ $loanData->status }}</td>
            <td>@include('HistoryPinjaman.components.modal')
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
