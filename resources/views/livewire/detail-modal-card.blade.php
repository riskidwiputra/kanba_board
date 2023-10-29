

<div  wire:ignore.self class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
  id="detail_modal_card">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="justify-content: space-between; display: flex; flex-direction:column; align-items: normal;">
        <h4 class="modal-title" style="color: black">{{$detailNameCard}}<button style="align-items: right;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>
        <sub style="margin-top: 5px" >In List <font style="text-decoration: underline">{{ strtoupper($detailNameBacklog)}}</font> </sub>  
      </div>
        
          <div class="modal-body">
        
            <form wire:submit.prevent="insertCard">
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label >Assignees</label>
                  <span class="mb-0 align-middle" style="display: flex;">
                      @if ($detailAssign)
                        
                        @forelse ($detailAssign as $assigns)
                        <img src="https://eu.ui-avatars.com/api/?name={{$assigns->name}}" alt="user-img"
                        class=" rounded-circle mr-1" style="width: 2rem;height:2rem;" />
                        @empty
                        @endforelse
                      @else
                        <!-- Tampilkan data yang sudah dimuat -->
                      @endif
                   
                </span>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label >Created By</label>
                  <span class="mb-0 align-middle" style="display: flex;">
                    
                    <img  src="https://eu.ui-avatars.com/api/?name={{$detailCreatedBy}}" alt="user-img"
                        class=" rounded-circle mr-1" style="width: 2rem;height:2rem;" />
                </span>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label >Labels</label>
                  
                  <div class="mb-0 align-middle" style="display: flex;">
                  
                    @if($detailLabel)
                      @if ($detailLabel == 'low')
                        <span style="padding:10px"  class="badge badge-danger">{{ strtoupper($detailLabel) }} </span>
                      @elseif ($detailLabel == 'medium')
                        <span style="padding:10px"  class="badge badge-info">{{ strtoupper($detailLabel) }} </span>
                      @elseif ($detailLabel == 'high')
                        <span style="padding:10px"  class="badge badge-success">{{ strtoupper($detailLabel) }} </span>
                      @else
                        <span style="padding:10px"  class="badge badge-success">{{ strtoupper($detailLabel) }} </span>
                      @endif
                    @else
                      <span style="padding:10px"  class="badge badge-success">Not Found </span>
                    @endif
                  </div>
                </div>
              </div>
              
              <div class="col-md-2">
                <div class="form-group">
                  <label >Created Date</label>
                  <div class="mb-0 align-middle" style="display: flex;">
                    <p class="d-flex align-items-center justify-content-center">
                      {{ date('D M d Y', strtotime($detailCreatedAt)) }}
                      
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label >Due Date</label>
                  <div class="mb-0 align-middle" style="display: flex;">
                    <p>
                      {{ date('D M d Y', strtotime($detailDueDate)) }}
                    </p>
                  </div>
                </div>
              </div>
             
              
            </div>
            <div class="row mt-2">
              <div class="col-md-12">
                <div class="form-group" style="word-wrap: break-word;">
                  <label >Description</label>
                  <textarea class="form-control" id="exampleTextarea" rows="15" readonly>
                    {{$detailDescription}}
                  </textarea>
                 
                </div>
              </div>
              
            </div>
           
            </form>
          </div>
       
      
    </div>
  </div>
</div>
