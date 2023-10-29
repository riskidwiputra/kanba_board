<x-app-layout>
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
                    @forelse ($data['list'] as $task)
                    <div class="tasks" data-plugin="dragula" >
                        <div class=" task-header d-flex justify-content-between align-items-center">
                        <h5 class="mt-0"> {{strtoupper($task->name)}}</h5>  
                        <button class="btn btn-sm btn-primary float-right"><i class="fa fa-plus"></i> Add a Card</button>
                        </div>
                        
                        <div id="task-list-one" class="task-list-items">
                          
                            @forelse ($task['cards'] as $card)
                            <!-- Task Item -->
                            <div class="card mb-0">
                                <div class="card-body p-3">
                                    <small class="float-right text-muted"> {{ date('D M d Y', strtotime($card->created_at)) }} </small>
                                    @if ($card->label->title == 'low')
                                        <span class="badge badge-danger">{{ strtoupper($card->label->title) }} </span>
                                    @elseif ($card->label->title == 'medium')
                                        <span class="badge badge-info">{{ strtoupper($card->label->title) }} </span>
                                    @elseif ($card->label->title == 'high')
                                        <span class="badge badge-success">{{ strtoupper($card->label->title) }} </span>
                                    @else
                                        <span class="badge badge-success">{{ strtoupper($card->label->title) }} </span>
                                    @endif

    
                                    <h5 class="mt-3 mb-2">
                                        <a href="#" data-toggle="modal" data-target="#task-detail-modal" class="text-body"> {{strtoupper($card->title)}} </a>
                                    </h5>
    
                                    <p class="mt-2">
    
                                    </p>
    
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="#" data-toggle="modal" data-target="#edit-task-modal"  class="dropdown-item editTaks"><i class="mdi mdi-pencil mdi-delete mr-1"></i>Edit</a>
                                            <!-- item-->
 
                                           
                                        </div>
                                    </div>
    
                                    <span class="mb-0 align-middle" style="display: flex;">
                                        @forelse ($card['assigns'] as $assigns)
                                        <img src="https://eu.ui-avatars.com/api/?name={{$assigns->name}}" alt="user-img" class="avatar-xs rounded-circle mr-1" />
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
    
    
    
    
           
    
    
    
           <!--  edit task modal -->
          
    </div>
   
</x-app-layout>
