
@if($loanData->status == "Approved" )
<button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loanData->id }}">
    Return
</button>
@else
<button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $loanData->id }}" disabled>
    Return
</button>
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $loanData->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $loanData->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda Ingin Mengembalikan Laptop?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <a href="{{ route('returnLaptop', $loanData->id) }}" type="button" class="btn btn-success">Iya</a>
            </div>
        </div>
    </div>
</div>
