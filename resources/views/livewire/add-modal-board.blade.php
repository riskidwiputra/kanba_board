<div wire:ignore.self class="modal fade" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" id="add_modal_board">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;">

                <h5 class="modal-title" style="color:black">Create Board</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="insertBoard">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="text-dark" style="font-weight:500">Board Title</label>
                        <input wire:model="board_title" type="text" id="board_title"
                            class="form-control @error('board_title') is-invalid @enderror"
                            placeholder="Masukkan Board Title" value="">
                        @error('board_title')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('createBoard', ($response) => {
            $('#add_modal_board').modal('hide');
            if ($response == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Your Board has been Add',
                    timer: 5000
                })
            } else {
                Swal.fire(
                    'Erorr!',
                    'Something went wrong!',
                    'error'
                )
            }
        });
    });

</script>
