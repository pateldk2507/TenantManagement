@include('landlord.sidebar_landlord')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('landlord.AddProperty') }}" class="btn btn-primary mb-4 float-right"> <i class="fa fa-plus"></i> Add New Property</a>
            {{-- <h1 class="h3 mb-4 text-gray-800 float-right">All Listed Property</h1> --}}
        </div>
    </div>
    


    <div class="row">

        @php
           if (Session::has('LoggedUserGmail')) {
            $reg = Session::get('LoggedUserGmail')->getOriginal('id');
         }elseif(Session::has('LoggedUser')){
             $reg = Session::get('LoggedUser')->getOriginal('id');
         }else{
             return redirect('/')->withCookie(Cookie::forget('userType'));
         }
            $allProp = DB::table('properties')->where('landlordID',$reg)->get();
            // dd($allProp);
        @endphp

        @foreach ($allProp as $property)
            
        
        <div class="col-lg-4 mb-4">
            <div class="card border-bottom-primary">

                <div class="card-img">
                    <div id="{{ $property->id }}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                        
                         @php
                            //  $property = DB::table('properties')->where('landlordID',4)->first();

                             $images = explode('|', $property->images);
                            // dd($images[0]);
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
                          {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
                          <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#{{ $property->id }}" data-slide="next">
                          {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
                          <span class="sr-only">Next</span>
                        </button>
                      </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-10 ">
                            <h2>${{ $property->totRent }}/month </h2>
                        </div>
                        <div class="col-2">
                            <a href="EditProperty/{{ $property->id }}" class="btn btn-outline-primary float-right" data-toggle="tooltip" data-placement="bottom" title="Edit Property Details">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <address>
                                <small> {{ $property->address1 ." " . $property->address2 }} </small> <br>
                                <small> {{ $property->city .",". $property->state . " " . $property->zip }}</small>
                             </address>
                        </div>
                    </div>
                   
                        
                    <hr>
                    {{-- <div class="row">
                        <div class="col-xl-12 col-lg-12">
                               <div class="card shadow">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardExample" class="d-block card-header py-3 " data-toggle="collapse"
                                        role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">View All 8 Tenants </h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseCardExample">
                                        <div class="card-body">
                                            This is a collapsable card example using Bootstrap's built in collapse
                                            functionality. <strong>Click on the card header</strong> to see the card body
                                            collapse and expand!
                                        </div>
                                    </div>
                                </div>
                        
                    </div> --}}
                        {{-- </div> --}}
                    

                </div>

            </div>
        </div>

        @endforeach
    </div>
                    

</div>
<!-- /.container-fluid -->

</div>


@include('landlord.footer_landlord')
<script>
    document.querySelector("#files").addEventListener("change", (e) => { //CHANGE EVENT FOR UPLOADING PHOTOS
if (window.File && window.FileReader && window.FileList && window.Blob) { //CHECK IF FILE API IS SUPPORTED
const files = e.target.files; //FILE LIST OBJECT CONTAINING UPLOADED FILES
const output = document.querySelector("#result");
output.innerHTML = "";
for (let i = 0; i < files.length; i++) { // LOOP THROUGH THE FILE LIST OBJECT
    if (!files[i].type.match("image")) continue; // ONLY PHOTOS (SKIP CURRENT ITERATION IF NOT A PHOTO)
    const picReader = new FileReader(); // RETRIEVE DATA URI 
    picReader.addEventListener("load", function (event) { // LOAD EVENT FOR DISPLAYING PHOTOS
      const picFile = event.target;
      const div = document.createElement("div");
      div.innerHTML = `<img class="thumbnail" src="${picFile.result}" title="${picFile.name}"/>`;
      output.appendChild(div);
    });
    picReader.readAsDataURL(files[i]); //READ THE IMAGE
}
} else {
alert("Your browser does not support File API");
}
});
</script>

<script>
    $("#pageTitle").text('Property Details');
</script>