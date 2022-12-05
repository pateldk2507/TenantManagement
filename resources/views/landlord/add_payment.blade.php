@include('landlord.sidebar_landlord')
<script src="{{ asset('js/multiselect/multiselect-dropdown.js') }}"></script>
<style>
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
</style>

@php
    $count=0;
    $propSelected;
@endphp
<div class="container-fluid">
    
    {{-- Personal Details --}}
    <h4>Tenant Info.</h4>
<form action="{{ route('landlord.AddPayment') }}" method="post">
     <div class="card-body">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-5 col-sm-12">
                <label for="property">Select Property </label>
                <select name="property[]" id="property" class="form-control" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="2" required class="form-control">
                    @foreach ($prop as $p)
                        <option value="{{ $p->id }}" > {{ $p->address1 .",".  $p->city .",". $p->state }}</option>       
                    @endforeach
                </select>
            </div>   
            {{-- <div class="col-md-3 form-group">
                 <br>
                 <button id="btnSendMail" value="Get Tenants" class="btn btn-warning"> Get Tenants </button>
            </div> --}}
        </div>

    </div>


<div class="card-body">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-5 col-sm-12" id="TBlock">
             <label for="tenant">Select Tenant(s) </label>
            <select name="tenant[]" id="tenant" class="form-control" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="2" class="form-control">
                
            </select>
        </div>   

        <div class="form-group col-md-3 col-sm-4">
            <label for="dueDate">Due Date</label>
            <input type="date" class="form-control" name="dueDate" id="dueDate">
        </div>
    </div>
</div>

    <button type="submit" class="btn btn-primary mb-3">Send Payment Link</button>
</div>
</form>


@include('landlord.footer_landlord')

<script>
    $("#pageTitle").text('Add New Payment');
    $('#property').on('change',function() {
        var val = $(this).val();
        let property = $('#property').val();
        let tenants = $('#tenant').val();
        let _token = $('input[name=_token]').val();
        $.ajax({
            url: "{{ route('landlord.getTenants') }}",
            type : "POST",
            data : {
                property : property,
                _token : _token,
            },
            success:function(response){
                if(response){
                    $("#tenant").empty();
                    console.log(response);
                    var count =1;
                    var sel1 = document.getElementById("tenant");
                    response.forEach(element => {
                        sel1.innerHTML += `<option value="${element.id}"> ${count++} ${element.fname} ${element.lname}</option>`;
                        sel1.loadOptions();
                    });
                }
            }
        });


    });

    $('#tenant').on('change',function() {
        console.log($(this).val());
    });

    try {
        var propSelected ={!! json_encode($propSelected, JSON_HEX_TAG) !!};
    } catch (error) {
        
    }

    // $('#btnSendMail').on('click',function(e){
    //     e.preventDefault();
    //     let property = $('#property').val();
    //     let tenants = $('#tenant').val();
    //     let _token = $('input[name=_token]').val();
    //     $.ajax({
    //         url: "{{ route('landlord.getTenants') }}",
    //         type : "POST",
    //         data : {
    //             property : property,
    //             _token : _token,
    //         },
    //         success:function(response){
    //             if(response){
    //                 $("#tenant").empty();
    //                 console.log(response);
    //                 var count =1;
    //                 var sel1 = document.getElementById("tenant");
    //                 response.forEach(element => {
    //                     sel1.innerHTML += `<option value="${element.id}"> ${count++} ${element.fname} ${element.lname}</option>`;
    //                     sel1.loadOptions();
    //                 });
    //             }
    //         }
    //     });

    // });
    
    $(document).ready(function() {
        $("#property").val(propSelected).trigger('change');
    });

    function createCookie(name, value, days) {
        var expires;
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        }else {
            expires = "";
        }
        document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
    }

</script>

