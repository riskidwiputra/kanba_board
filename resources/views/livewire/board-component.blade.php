

    <div class="py-12">

        <div class="container-fro">
            <div class="container-fruid mr-5 ml-5">
                <h2>Boards</h2>
                <hr> 
                <div class="row">
                    
                    @include('livewire.add-modal-board')
                    
                    <div class="col-md-3">
                        <a data-toggle="modal" data-target="#add_modal_board">
                        <div class="card custom-card mb-4 d-flex justify-content-center align-items-center" style="width: 100%; height: 200px; background-color: #d9d9d9; color: black;">
                            <h3 class="text-center">  <i class="fa fa-plus"></i> Create New Board</h3>
                        </div>
                    </a>
                    </div>
                    @forelse($data as $board)
                        <div class="col-md-3">
                            <a href="/board/{{$board->id}}">
                                <div class="card custom-card mb-4">
                                    <img src="https://eu.ui-avatars.com/api/?name={{$board->title}}" class="card-img-top" alt="Project 1 Image">
                                    <h3 class="card-title">{{$board->title}}</h3>
                                </div>
                            </a>
                        </div>
                    @empty
                    @endforelse
                </div>
             </div> 
        </div>
    </div>
