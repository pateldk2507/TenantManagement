@include('landlord.sidebar_landlord')
 
@php 
    $question = array("Are you preferred Students?", "Ideal for Couple ?","Parking Available?", "Smoking Preffered?","Utilities Included ?","Pet Friendly?","Disiblity Access avialable?","Fully Furnished?"); 
    $index=0;
@endphp
<script>
     var q = ["Are you preferred Students?", "Ideal for Couple ?","Parking Available?", "Smoking Preffered?","Utilities Included ?","Pet Friendly?","Disiblity Access avialable?","Fully Furnished?"];
    var i = 0;
    var q_size = q.length;

    var intrest=[];
</script>
<style>

    .question{
       
        text-align: center;
       
    }
    .card-body{
        background-color:white; 
        height: 100%; 
        width:100%; 
        border-color: transparent;
        border-radius:10px; 
        box-shadow: 0 2px 3px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        padding: 10px;
        margin-bottom: 15px;
    }

    .card-body:hover{
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    /* .question:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    } */

    .card-body>label {
        font-size: 25px;
    }
</style>

  <!-- Begin Page Content -->
  <div class="container-fluid">

   
    <form action="{{ route('landlord.updateProperty') }}" method="POST" enctype="multipart/form-data">
        <h4>Property Info.</h4>
        @csrf

        @if ($message= Session::get('success'))
            <strong>{{ $message }}</strong>
        @endif

    {{-- <div class="card"> --}}
        <div class="card-body ">
    
            
    <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" value="{{ $prop->address1 }}" name="address1" id="inputAddress" placeholder="1234 Main St" required>
        </div>
        {{-- <div class="form-group col-md-6">
          <label for="inputAddress2">Address 2</label>
          <input type="text" class="form-control" value="{{ $prop->address2 }}" name="address2" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div> --}}
    </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="inputCity">City</label>
            <input type="text" name="city" class="form-control" value="{{ $prop->city }}" id="inputCity" required>
          </div>
          <div class="form-group col-md-3">
            <label for="inputState">State</label>
            <select id="inputState" name="state" class="form-control" required>
              <option value="">select state...</option>
                <option value="AB">Alberta</option>
                <option value="BC">British Columbia</option>
                <option value="MB">Manitoba</option>
                <option value="NB">New Brunswick</option>
                <option value="NL">Newfoundland and Labrador</option>
                <option value="NS">Nova Scotia</option>
                <option value="NT">Northwest Territories</option>
                <option value="NU">Nunavut</option>
                <option value="ON">Ontario</option>
                <option value="PE">Prince Edward Island</option>
                <option value="QC">Quebec</option>
                <option value="SK">Saskatchewan</option>
                <option value="YT">Yukon</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" name="zip" value="{{ $prop->zip }}" class="form-control" id="inputZip" required>
          </div>

          <div class="form-group col-md-2">
            <label for="totBed">Total Room(s)</label>
            <input type="number" min="1" name="totBed" value="{{ $prop->totBed }}" class="form-control" id="totBed" required>
          </div>
          <div class="form-group col-md-2">
            <label for="totBath">Total Bathroom(s)</label>
            <input type="number" min="1" name="totBath" value="{{ $prop->totBath }}" class="form-control" id="totBath" required>
          </div>
        
        <div class="form-group col-md-12">
            <label for="desc">Description</label>
            <textarea  id="desc" name="desc"  class="form-control" required>{{ $prop->desc }}
            </textarea>
        </div>
        <div class="form-group col-md-3">
            <label for="parking">Available Parking Slot</label>
            <input type="number" name="parking" min="0" value="{{ $prop->parking }}" id="parking" class="form-control" required> 
        </div>
    <!-- </div>
        <div class="form-row"> -->
            <div class="form-group col-md-3 ml-1" style="margin-top: 2rem !important;">
                <label for="files" class="custom-file-label">Select property Photos</label>
                <input id="files" type="file" name="image[]"  multiple="multiple" class="custom-file-input" accept="image/jpeg, image/png, image/jpg" />
                <span class="text-danger">
                    @error('image') 
                       {{$message}}
                    @enderror 
               </span>
            </div>
            <div class="form-group col-md-12">
                <div class="imageS">
                    {{-- {{ dd($prop) }} --}}
                    @php
                        $AllImages = $prop->getOriginal('images');
                        $imageArr = explode('|', $AllImages);
                        // dd($imageArr);
                        
                    @endphp
                    @foreach ( $imageArr as $item)
                        
                        <img src="{{ URL::to($item) }}" alt="" class="thumbnail" srcset="">
                    @endforeach
                </div>
                <output id="result" > </output>      
            </div>    
        </div>
    </div>
{{-- </div> --}}
        <h4>Prefrences</h4>
    <div class="row mb-3">
        <div class="col-md-6 offset-md-3" >
                <div class="card-body">
                    <div class="question">
                            
                                <h3 id="question">  </h3>

                                @php
                                   $myArray = array(); 
                                @endphp
                                
                                

                                @foreach ($pref as $item)
                                         @php array_push($myArray,$item); @endphp
                                @endforeach

                               
                                @php $output = array_slice($myArray, 4); @endphp

                                {{-- {{ dd($output[3])}} --}}

                              
                                <div id="true">
                                    <div id="DivY">
                                        <input type="radio" name="{{ $index }}" id="Y" value="1"  @if ($output[$index] == 1) checked @endif> 
                                        <label for="Y" style="cursor:pointer; margin-right:20px">Yes</label>
                                    </div>
                                    </div>              
                         

                                <div id="false">
                                    <div id="DivN">
                                    <input type="radio" name="{{ $index }}" id="N" value="0" >
                                    <label for="N" style="cursor:pointer; margin-right:25px">No</label>
                                    </div>
                                </div>
                                
                                
                    
                            <div class="row">
                                <div class="col-md-12">

                                    @if ($index != 0)
                                        
                                    @else
                                        <button class="btn btn-primary float-left ml-10" id="btnPrev">Previous</button>
                                    @endif
                                    
                                        <button class="btn btn-primary float-right mr-10" id="btnNext">Next</button>

                                </div>
                            </div>
     
                    </div>
                    
                </div>
          
        </div>

    </div>

    <h4>Legal</h4>
    <div class="form-row card-body">
        <div class="form-group col-md-3">
          <label for="lease">Lease Type</label>
          <select id="lease" name="lease" class="form-control" required>
            <option value="">Choose lease type...</option>
            <option value="1">Monthly</option>
            <option value="12">Yearly</option>
          </select>
        </div>

        <div class="form-group col-md-3">
            <label for="tenant">Allowed Tenants</label>
            <input type="number" name="maxTenant" value="{{ $prop->maxTenant }}" id="tenant" class="form-control" required>
        </div>

        <div class="form-group col-md-3">
            <label for="rent">Rent</label>
            <input type="number" name="rent" id="rent" value="{{ $prop->totRent }}" class="form-control" required>
        </div>
        <div class="form-group col-md-3">
            <label for="utilitiesExp">Utilities Expense</label>
            <input type="number" name="misc" id="rent" value="{{ $prop->misc }}" class="form-control" required>
        </div>
        
    </div>

    <input type="hidden" name="pref[]" id="pref"  >
    <input type="hidden" name="images" value="{{ $prop->images }}">
    <input type="hidden" name="propertyID" value="{{ $prop->id }}">
    <input type="hidden" name="landlordID" value="{{ $prop->landlordID }}">


        <button type="submit" class="btn btn-primary mb-3">Update</button>
      </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>






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

var data ={!! json_encode($prop->toArray(), JSON_HEX_TAG) !!};

console.log("data.pref " + Array.from(data.pref));

var pref= [];
pref = Array.from(data.pref); 

var myArray = pref[0].split(",");
console.log(myArray);

intrest = myArray;

$(document).ready(function() {
        $("#inputState").val(data.state).trigger('change');
        $("#lease").val(data.leaseType).trigger('change');
        $("#pref").val(data.pref);
});


    

// $(`#inputState option[value=$data.state]`).attr("selected", "selected");
// console.log(i);

// console.log(data.pref[0][i*2]);


if(data.pref[0][i*2]==0){
        $('#Y').prop('checked',false);
        $('#N').prop('checked',true);
    }else if(data.pref[0][i*2]==1){
        $('#Y').prop('checked',true);
        $('#N').prop('checked',false);
    }

    $(function() {
        $('#question').text(q[0]);
    });

    $('#btnPrev').hide();

    $('#Y').attr('name',i);
    $('#N').attr('name',i);

    $('input[type=radio]').on('change', function() {
        console.log( $(this)[0].name + " is "+ $(this).val());
        intrest[i] = $(this).val();
        $('#pref').val(intrest);

        

    });

  
    $('#btnPrev').on('click',function(e){
        e.preventDefault();
        $('#Y').prop('checked',false);
        $('#N').prop('checked',false);
        if(data.pref[i]==0){
        $('#Y').prop('checked',false);
        $('#N').prop('checked',true);
    }else if(data.pref[i]==1){
        $('#Y').prop('checked',true);
        $('#N').prop('checked',false);
    }
        
console.log("Value of I " + i);
    
    
        if(i==0){
            $( "#btnPrev" ).hide( "slow", function() {
               
            });
            
        }else{
            i--;
            if(i==0){
                $( "#btnPrev" ).hide( "slow", function() {
                    
            });
            }
            $( "#btnNext" ).show( "slow", function() {
                
            });
        }
        console.log("Value of I " + i);
        if(intrest[i] == "1"){
            // $('#Y').attr('checked', 'checked');
            $("input[value='1']").prop("checked",true);
            console.log("Prev Y");
        }else if(intrest[i]=="0"){
            // $('#N').attr('checked', 'checked');
            $("input[value='0']").prop("checked",true);
            console.log("Prev N");
        }else{
            $('#Y').prop('checked',false);
            $('#N').prop('checked',false);
            console.log("Prev N/A");
        }
    
        $('#Y').attr('name',i);
        $('#N').attr('name',i);

        

        $('#question').text( q[i] );
        $('#Y').prop('checked',false);
        $('#N').prop('checked',false);

        console.log("Prev Click");

    });

    $('#btnNext').on('click',function(e){

        e.preventDefault();
        $('#Y').prop('checked',false);
        $('#N').prop('checked',false);

        console.log(i);
        console.log(data.pref[0][i*2]);

        

        if(i>=q_size-2){
            $( "#btnNext" ).hide( "slow", function() {
                  
            });
            i++;  
        }else{
            i++;
            $( "#btnPrev" ).show( "slow", function() { 
            });
        }



        if(intrest[i] == "1"){
            $('#Y').prop('checked',true);
            console.log("Next Y");
        }else if(intrest[i]=="0"){
            $('#N').prop('checked',true);
            console.log("Next N");
        }else{
            $('#Y').prop('checked',false);
            $('#N').prop('checked',false);
            console.log("Next N/A");
        }



        console.log(i);
        $('input[name='+i+']').attr('checked',false);
        $('#Y').attr('name',i);
        $('#N').attr('name',i);
        $('#question').text( q[i] );
        // $('#Y').prop('checked',false);
        // $('#N').prop('checked',false);
        if(data.pref[0][i*2]==0){
        $('#Y').prop('checked',false);
        $('#N').prop('checked',true);
    }else if(data.pref[0][i*2]==1){
        $('#Y').prop('checked',true);
        $('#N').prop('checked',false);
    }
        console.log("Next Click");
        console.log(intrest);
    });


</script>
<script>
    $("#pageTitle").text('Add New Property');
</script>