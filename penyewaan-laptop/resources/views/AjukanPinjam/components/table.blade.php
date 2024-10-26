<table class="table border mt-5">
    <thead>
        <tr>
            <th scope="col">Nomor</th>
            <th scope="col">Kategori</th>
            <th scope="col">Kode</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga Sewa</th>
            <th>Gambar</th>
            <th scope="col">Status</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Units as $key =>$unit)
        <tr>
        <th scope="row">{{ $key + 1 }}</th>
        <td>{{  $unit->category->name  }}</td> 
        <td>{{ $unit->code }}</td> 
        <td>{{ $unit->name }}</td> 
        <td>{{ $unit->price }}</td> 
        <td>
            @include('AjukanPinjam.components.modalGambar')
        </td>
        <td>{{ $unit->status }}</td> 
        <td>{{ $unit->description }}</td> 
        <td>@include('AjukanPinjam.components.modal')</td>
        </tr>
        @endforeach
    </tbody>
</table>
