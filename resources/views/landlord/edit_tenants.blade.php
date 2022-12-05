@include('landlord.sidebar_landlord')
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
<div class="container-fluid">
    
    {{-- Personal Details --}}
    <h4>Personal Info.</h4>
    <form action="{{ route('landlord.UpdateTenant') }}" method="post">
    <div class="card-body">
    {{-- {{ dd($tenant) }} --}}
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" value="{{ $tenant->fname }}" name="fname" >
            </div>

            <div class="form-group col-md-6">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" value="{{ $tenant->lname }}"  name="lname" >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="DOB">Date of Birth</label>
                <input type="date" class="form-control" value="{{ $tenant->dob }}" id="DOB" name="dob" >
            </div>

            <div class="form-group col-md-3">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option selected value="1">Male</option>
                    <option value="0">Female</option>
                    <option value="X">Other</option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="{{ $tenant->email }}" name="email" >
            </div>

            <div class="form-group col-md-3">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" id="phone" value="{{ $tenant->phone }}" name="phone" >
            </div>
        </div>

    </div>

    <h4>Property Assigned</h4>

    <div class="card-body">
        <div class="form-row">
          
                <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <select id="property" class="form-control" name="property">
                        <option selected>Choose Property...</option>
                       @foreach ($prop as $p)
                       <option value="{{ $p->id }}">{{ $p->address1 .",". $p->address2 .",". $p->city .",". $p->state }}</option>   
                       @endforeach
                    </select>
                </div>
    
                <div class="form-group col-md-3">
                    <label for="unit">unit</label>
                    <input type="text" class="form-control" id="unit" value="{{ $tenant->unit }}" name="unit" >
                </div>
    
                <div class="form-group col-md-3">
                    <label for="room">Room</label>
                    <input type="text" class="form-control" id="room" value="{{ $tenant->room }}" name="room" >
                </div>
           
        </div>
    </div>

    <h4>Legal</h4>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="lease">Lease Type</label>
                     <select id="lease" class="form-control" name="leaseType">
                         <option selected>Choose...</option>
                         <option value="1">Monthly</option>
                         <option value="12">Yearly</option>
                     </select>
            </div>
            <div class="form-group col-md-3">
                <label for="lstart">Lease Signed Date</label>
                <input type="date" class="form-control" id="lstart" value="{{ $tenant->signedDate }}" name="signedDate" >
            </div>
        </div>
    </div>

    <input type="hidden" name="regBy" value="{{ $tenant->regBy }}">
    <input type="hidden" name="tenantID" value="{{ $tenant->id }}">

    <button type="submit" class="btn btn-primary mb-3">Update</button>
</div>
</form>


@include('landlord.footer_landlord')

<script>
    var data ={!! json_encode($tenant->toArray(), JSON_HEX_TAG) !!};
    $(document).ready(function() {
        $("#property").val(data.property).trigger('change');
        $("#lease").val(data.leaseType).trigger('change');
        $('#DOB').val(data.dob);
    });
    $("#pageTitle").text('Add New Tenant');
</script>