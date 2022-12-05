@include('tenant.nav')


<style>
    .secBlur,
a.secBlur:hover,
a.secBlur:focus {
  /* color: rgba(0, 0, 0, 0); */
  /* text-shadow: 0 0 10px rgba(0, 0, 0, 0.5); */
    /* -webkit-user-select: none;   */
  /* -moz-user-select: none;      */
  /* -ms-user-select: none;       */
  /* user-select: none;           */
}

.row{
  margin-right: 0;
    margin-left: 0;
}
.card-curved{
  background-color: white;
  border-radius: 20px;
  padding: 10px;
  height: max-content;
}

.card-curved input button{
  text-decoration: none;
  border-width:0px;
  border:none;
}

.vl {
  border-left: 3px solid rgb(188, 189, 188);
  height: inherit;
}
.stickyele{
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index:99;
}

tr{
  background-color: #f0f0f0;
  /* margin: 5px; */
}

</style>
<div class="row" style="height:max-content; width:100vw; min-height:85vh; background-color: rgba(246, 244, 244, 0.828)">
    <div class="col-xl-12 col-sm-12 col-md-12" style="background-color: #f0f0f0; height:auto; width:100vw">
        
        
        <div class="row stickyele">
          
            <div class="card-curved col-xl-12 align-items-center mt-2">
                <form action="{{ route('property.filterProperty') }}" method="POST" class="row ">
                    @csrf
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="city" id="city" placeholder="city" value="{{old('city')}}">
                    </div>
                    <div class="vl"></div>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="min" id="min" placeholder="min price">
                    </div>
                    <div class="vl"></div>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" name="max" id="max" placeholder="max price">
                    </div>
                    <div class="search">
                      <button type="submit" class="btn btn-warning"><i class="fa fa-search"></i> search</button>
                    </div>
                    <div class="vl" style="margin-left: 10px;"></div>
                    <div class="col-sm-2">
                      <div class="input-group ">
                      
                        <select class="custom-select" id="inputGroupSelect01">
                          <option selected value="">--Sort By--</option>
                          <option >Newest</option>
                          <option value="1">Oldest</option>
                          <option value="2">Lowest Price</option>
                          <option value="3">Highest Price</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="vl" ></div>
                    <div class="col-sm-2">
                      <a  class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-filter"></i> Filter</a>
                    </div>
                </form>
            </div>
          
          </div> 
        
        <div class="row" style="padding: 1rem!important;">
            
          

          @foreach ($prop as $property)
          <div class="col-sm-3">
                <div class="card" style="width: 20rem; margin:10px; ">
                  <div id="{{ $property->id }}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    
                     @php
                         $images = explode('|', $property->images);
                     @endphp   
        
                    <div class="carousel-item active">
                        <img src="{{ URL::to($images[0]) }}" style="width:100%;height:250px;" class="d-block" alt="...">
                    </div>
        
                    @foreach (array_slice($images, 1) as $item)    
                      <div class="carousel-item">
                        <img src="{{ URL::to($item) }}" style="width:100%;height:250px;" class="d-block" alt="...">
                      </div>
        
                    @endforeach
                     
                    </div>
                   <button class="carousel-control-prev" type="button" data-target="#{{ $property->id }}" data-slide="prev">
                     
                      <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#{{ $property->id }}" data-slide="next">
                     
                      <span class="sr-only">Next</span>
                    </button>
                  </div>
                    

                    <div class="card-body">
                      <h5 class="card-title">${{ $property->getOriginal('totRent')}}/Month</h5>
                      <div class="card-text secBlur" data-toggle="tooltip" data-placement="bottom" title="choose premium plan to view address"> 
                          <p>{{ $property->address1 .",". $property->address2}}</p> 
                          <p>{{ $property->city .",". $property->state}}</p>
                      </div>
                      <form id="sendData" action="{{ route('sendRequest') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pID" value="{{ $property->id }}">
                        <input type="hidden" name="tID" value="{{ $user->id }}">
  
                        @if (count($getRequest) == 0)
                        <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Send Profile</button>   
                        @else
                          
                       
                        @foreach ($getRequest as $key => $value)
                          @if ($value->pID == $property->id)
                          <h3 class="btn btn-info">Profile Already sent</h3>
                          @php unset($getRequest[$key]); @endphp
                          @else
                          <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Send Profile</button>   
                          @endif
                          @break
                        @endforeach    

                        @endif
                      </form>
                      
                    {{-- <div class="float-right">
                      <a href="" class="btn btn-success"> <i class="fa fa-thumbs-up"></i> </a>
                      <a href=""  class="btn btn-danger"><i class="fa fa-thumbs-down"></i></a>
                    </div> --}}
                        {{-- <div class="progress mt-3">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Match 100%</div>
                        </div> --}}
                    </div>
                </div>
          </div>
          @endforeach

        </div>
        
        
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Set Advance Filter options</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
          <div class="col-sm-3">
            <input type="checkbox" name="student" id="student">
            <label for="student">Student?</label>
          </div>
          <div class="col-sm-3">
            <input type="checkbox" name="couple" id="couple">
            <label for="couple">couple?</label>
          </div>
          <div class="col-sm-3">
            <input type="checkbox" name="parking" id="parking">
            <label for="parking">parking?</label>
          </div>
          <div class="col-sm-3">
            <input type="checkbox" name="smoking" id="smoking">
            <label for="smoking">smoking?</label>
          </div>
          <div class="col-sm-6">
            <input type="checkbox" name="pet" id="pet">
            <label for="pet">pet friendly?</label>
          </div>
          

          <div class="col-sm-6">
            <input type="checkbox" name="disablity" id="disablity">
            <label for="disablity">need disablity access?</label>
          </div>
          <div class="col-sm-3">
            <input type="checkbox" name="utility" id="utility">
            <label for="utility">utility?</label>
          </div>
          <div class="col-sm-4">
            <input type="checkbox" name="furnished" id="furnished">
            <label for="furnished">furnished?</label>
          </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Search</button>
      </div>
    </div>
  </div>
</div>


<script>
 
 var data ={!! json_encode($prop->toArray(), JSON_HEX_TAG) !!};

function sendProfile(id) {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
    }
  });

  $.ajax({
      url: "{{ route('sendRequest') }}", 
      type: 'POST',
      data: $('#sendData').serialize(),
      success: function(result){
        console.log(result);
    }
  });
}

 function doFilter() {
  var city = $('#city').val();
  var min  = $('#min').val();
  var max = $('#max').val();

  data.forEach(element => {
    if(element.city == city){

    }
 });

 }

 

</script>


@include('tenant.footer')