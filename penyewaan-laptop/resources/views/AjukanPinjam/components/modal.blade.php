<!-- Button trigger modal -->

@if($unit->status == "Not Available" )
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $unit->id }}" disabled>
    Pesan 
</button>
@else
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $unit->id }}" >
    Pesan 
</button>
@endif

<!-- Modal -->
<div class="modal modal-lg fade" id="exampleModal{{ $unit->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $unit->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel{{ $unit->id }}">Peminjaman Laptop {{ $unit -> name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="NameLoan" class="form-label">Nama Peminjam</label>
                    <input type="text" class="form-control" id="NameLoan" value="{{ Auth::user()->name }}" name="NameLoan" disabled>
                </div>
                <div class="mb-3">
                    <label for="LaptopName" class="form-label">Nama Laptop</label>
                    <input type="text" class="form-control" id="LaptopName" value="{{ $unit -> name }}" name="LaptopName" disabled>
                </div>
                <div class="mb-3">
                    <label for="LaptopCategory" class="form-label">Kategori Laptop</label>
                    <input type="text" class="form-control" id="LaptopCategory" value="{{ $unit->category->name }}" name="LaptopCategory" disabled>
                </div>
                <div class="mb-3">
                    <label for="LaptopCode" class="form-label">Kode Laptop</label>
                    <input type="text" class="form-control" id="LaptopCode" value="{{ $unit->code }}" name="LaptopCode" disabled>
                </div>
                <form action="{{ route('peminjaman', Auth::user()->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}"
                        name="Loaner">
                    <input type="hidden" name="unit_id" class="form-control" value="{{ $unit->id }}"
                        name="LaptopLoan">
                    <div class="mb-3">
                        <label for="tanggalPinjam" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" id="tanggalPinjam{{ $unit->id }}" name="tanggalPinjam" onchange="setMinReturnDate({{ $unit->id }})">
                    </div>
                    <div class="mb-3">
                        <label for="tanggalKembali" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="tanggalKembali{{ $unit->id }}" name="tanggalKembali">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function setMinReturnDate(unitId) {
        const tanggalPinjam = document.getElementById('tanggalPinjam' + unitId).value;
        console.log(tanggalPinjam)
        const tanggalKembaliInput = document.getElementById('tanggalKembali' + unitId);

        // Jika tanggal peminjaman dipilih
        if (tanggalPinjam) {
            // Set minimum tanggal pengembalian ke tanggal peminjaman
            tanggalKembaliInput.setAttribute('min', tanggalPinjam);
            // Jika tanggal pengembalian sudah lebih awal dari tanggal peminjaman, reset nilai
            if (tanggalKembaliInput.value && tanggalKembaliInput.value < tanggalPinjam) {
                tanggalKembaliInput.value = '';
            }
        } else {
            // Jika tanggal peminjaman tidak dipilih, hapus batasan tanggal pengembalian
            tanggalKembaliInput.removeAttribute('min');
        }
    }
</script>