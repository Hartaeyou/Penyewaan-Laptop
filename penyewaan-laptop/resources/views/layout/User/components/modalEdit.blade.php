<!-- Modal -->
<div class="modal modal-lg fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updateUser', Auth::user()->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            disabled value="{{ Auth::user()->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="Name" name="Name" placeholder="Name"
                            value="{{ Auth::user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="Phone" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" id="Phone" name="Phone" placeholder="Phone"
                            value="{{ Auth::user()->phone_number }}">
                    </div>
                    <div class="mb-3">
                        <label for="Address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="Address" name="Address" placeholder="Address"
                            value="{{ Auth::user()->address }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-bs-target="#exampleModalToggle"data-bs-toggle="modal">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('deleteUser', Auth::user()->id) }}" class="btn btn-danger">Delete</a>
            </div>
            </form>
        </div>
    </div>
</div>
