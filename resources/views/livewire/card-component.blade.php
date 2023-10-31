
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $data['board']['title'] }}
    </h2>
</x-slot>

<div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <h2 class="page-title">Card</h2>
            </div>
        </div>
    </div>

    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="board">
                @include('livewire.detail-modal-card')
                @include('livewire.add-modal-card')
                @include('livewire.update-modal-card')
                @forelse ($data['list'] as $task)
                <div class="tasks" data-plugin="dragula">
                    <div class=" task-header d-flex justify-content-between align-items-center">
                        <h5 class="mt-0"> {{strtoupper($task->name)}}</h5>
                        <button type="button"  onclick="myFunction({{$task->id}})" id="" data-toggle="modal" data-target="#add_modal_card" class="btn btn-sm btn-primary float-right"><i class="fa fa-plus"></i> 
                            Add A Card
                        </button>
                        
                    </div>

                    <div id="task-list-one" class="task-list-items">

                        @forelse ($task['cards'] as $card)
                        <!-- Task Item -->
                        <div class="card mb-0">
                            <div class="card-body p-3">
                                <small class="float-right text-muted">
                                    {{ date('D M d Y', strtotime($card->created_at)) }} </small>
                                @if($card->label)
                                    @if ($card->label->title == 'low')
                                    <span class="badge badge-danger">{{ strtoupper($card->label->title) }} </span>
                                    @elseif ($card->label->title == 'medium')
                                    <span class="badge badge-info">{{ strtoupper($card->label->title) }} </span>
                                    @elseif ($card->label->title == 'high')
                                    <span class="badge badge-success">{{ strtoupper($card->label->title) }} </span>
                                    @else
                                    <span class="badge badge-success">{{ strtoupper($card->label->title) }} </span>
                                    @endif
                                @else
                                    <span class="badge badge-danger">Not Found</span>
                                @endif

                                <h5 class="mt-3 mb-2">
                                    <div class="title-card text-body">                                    
                                        <a wire:click.prevent="DetailCardFunction({{$card->id}})" data-toggle="modal" data-target="#detail_modal_card"   >
                                        {{strtoupper($card->title)}} </a>
                                    </div>
                                </h5>
                               

                                <p class="mt-2">

                                </p>

                             
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle text-muted arrow-none" data-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical font-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- item-->
                                        <a href="javascript:;" wire:click.prevent="updateDataCard({{ $card->id }})" data-toggle="modal" data-target="#update_modal_card"  class="dropdown-item editTaks"><i class="mdi mdi-pencil mdi-delete mr-1"></i>Edit</a>
                                        <!-- item-->
                                        {{-- wire:click.prevent="updateDataCard({{ $card->id }})" --}}
                                        
                                        <a href="javascript:;" wire:click="deleteDataCard('{{ $card->id }}')" class="dropdown-item"  >
                                            <i class="mdi mdi-delete mr-1"></i>Delete
                                        </a>
                                       
                                    </div>
                                </div>
                                
                                <span class="mb-0 align-middle" style="display: flex;">
                                    @forelse ($card['assigns'] as $assigns)
                                    <img src="https://eu.ui-avatars.com/api/?name={{$assigns->name}}" alt="user-img"
                                        class="avatar-xs rounded-circle mr-1" />
                                    @empty
                                    @endforelse
                                </span>
                            </div> <!-- end card-body -->
                        </div>

                        @empty
                        @endforelse
                        <!-- Task Item End -->


                    </div> <!-- end company-list-1-->
                </div>
                @empty
                @endforelse

            </div> <!-- end .board-->
        </div> <!-- end col -->
    </div>
    <!-- end row-->


</div>
<script>
    $('form').on('submit', function() {
        $('button[type="submit"]').prop('disabled', true);
    });
</script>
<script>
    function myFunction(id) {
        Livewire.emit('updateIdList', id);
    }
  
        document.addEventListener('livewire:load', function() {
            Livewire.on('confirmDeleteCard', (data) => {
                Swal.fire({
                    title: "Apakah Anda yakin ingin menghapus Card ini?",
                    text: data.title,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus Card',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('deleteConfirmedCard', data.id);
                    }
                });
            });
            Livewire.on('deleleCard', ($response) => {
                if($response == "success"){
                    Swal.fire({
                        icon: 'success',
                        title: 'Your Card has been Deleted',
                        timer: 5000
                    })
                }else {
                    Swal.fire(
                        'Erorr!',
                        'Something went wrong!',
                        'error'
                    )
                }
            });
        });
   
</script>