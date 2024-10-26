<div class="modal modal-lg fade" id="exampleModalDetail{{ $loanData->id }}" tabindex="-1"
    aria-labelledby="exampleModalLabelDetail{{ $loanData->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabelDetail">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="NameLoan" class="form-label">Nama Peminjam</label>
                        <input type="text" class="form-control" id="NameLoan" value="{{ Auth::user()->name }}"
                            name="NameLoan" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="LaptopName" class="form-label">Nama Laptop</label>
                        <input type="text" class="form-control" id="LaptopName" value="{{ $loanData->unit->name }}"
                            name="LaptopName" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="TanggalPinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="TanggalPinjam"
                            value="{{ $loanData->borrow_date }}" name="TanggalPinjam" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="TanggalKembaliAktual" class="form-label">Tanggal Kembali Aktual</label>
                        <input type="date" class="form-control" id="TanggalKembaliAktual"
                            value="{{ $loanData->return->return_date }}" name="TanggalKembaliAktual" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="hargaAktual" class="form-label">Harga Sewa</label>
                        <input type="text" class="form-control" id="hargaAktual"
                            value="{{ $loanData->deliver_price }}" name="hargaAktual" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="denda" class="form-label">Denda</label>
                        <input type="text" class="form-control" id="denda"
                            value="{{ $loanData->return->penalty_fee }}" name="denda" disabled>
                    </div>
                    <?php 
                        $total = $loanData->deliver_price + $loanData->return->penalty_fee;
                        echo "
                        <div class='mb-3'>
                            <label for='total' class='form-label'>Total</label>
                            <input type='text' class='form-control' id='total' value='$total' name='total' disabled>
                        </div>";
                    ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
