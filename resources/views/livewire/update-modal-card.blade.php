<div wire:ignore.self class="modal fade" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" id="update_modal_card">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: center;">

                <h5 class="modal-title" style="color:black">Update Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="insertCard">
                <div class="modal-body">
                    {{-- <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label >Title</label>
                                <input type="text"  wire:model="title" name="title"    class="form-control   @error('board_title') is-invalid @enderror" id="title" placeholder="Enter title">
                                @error('board_title')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4"> --}}
                            {{-- <div class="form-group">
                                <label >Labels</label>
                                <select  wire:model="label" class="form-control   @error('label') is-invalid @enderror" name="label" id="label">
                                    <option value="" readonly hidden> Labels</option>
                                    @forelse($data['labels'] as $label)
                                        <option value="{{$label->id}}">{{ strtoupper($label->title)}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('label')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div> --}}
                        {{-- </div>
                    </div>
                    <div class="form-group">
                        <label for="task-description">Description</label>
                        <textarea wire:model="description" class="form-control  @error('description') is-invalid @enderror" name="description" id="description" rows="3"></textarea>
                        @error('description')
                        <span class="invalid-feedback">
                                {{ $message }}
                        </span>
                    @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"> --}}
                                {{-- <label >Assign To</label>
                                <select wire:model="assign" class="form-control  @error('description') is-invalid @enderror" name="assign" id="assign">
                                    <option value="" readonly hidden> Assign To</option>
                                            <option value={{ Auth::user()->id }}>{{ Auth::user()->name }}</option>
                                </select>
                                @error('assign')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror --}}
                            {{-- </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="text-dark" style="font-weight:500">Due Date</label>
                                <input required type="date" wire:model="due_date"
                                    class="form-control @error('due_date') is-invalid @enderror"
                                    placeholder="Masukkan End Date">
                                @error('due_date')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('updateCard', ($response) => {
            $('#update_modal_card').modal('hide');
            if ($response == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Your Card has been Change',
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
