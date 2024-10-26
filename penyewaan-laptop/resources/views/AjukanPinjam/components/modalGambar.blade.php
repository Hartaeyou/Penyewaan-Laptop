<button style="background: transparent; border:none" type="button" class="btn btn-primary borderless"
    data-bs-toggle="modal" data-bs-target="#modalGambar{{ $unit->id }}">
    <img src="{{ asset('img/'.$unit->foto_product) }}" width="50px" alt="">
</button>

<!-- Modal -->
<div class="modal modal-lg fade" id="modalGambar{{ $unit->id }}" tabindex="-1"
    aria-labelledby="modalGambarLabel{{ $unit->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalGambarLabel{{ $unit->id }}">Gambar Laptop {{ $unit->name }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('img/'.$unit->foto_product) }}" alt="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
