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
<div class="container-fluid">
    
    {{-- Personal Details --}}
    <h4>Announcement Info.</h4>
    <form action="{{ route('mail') }}" method="post">
    <div class="card-body">
    
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="announceText">Announcement Message</label>
                <textarea name="announceText" class="form-control" id="announceText" cols="30" rows="5"></textarea>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="announceType">Type</label>
                <select name="announceType" id="announceType" class="form-control">
                    <option selected value="formal">Formal</option>
                    <option value="criticle">Criticle</option>
                    <option value="needAction">Need Action </option>
                </select>
            </div>

            <div class="form-group col-md-9">
                <label for="sendTo">Send to </label>
                <select name="sendTo[]" id="sendTo" class="form-control" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="2" class="form-control">
                    @foreach ($prop as $p)
                    <option value="{{ $p->id }}" > {{ $p->address1 .",".  $p->city .",". $p->state }}</option>   
                    @endforeach
                </select>
            </div>


           
        </div>

    </div>

    <button type="submit" class="btn btn-primary mb-3">Register</button>
</div>
</form>


@include('landlord.footer_landlord')

<script>
    $("#pageTitle").text('Add New Announcement');
    $('#sendTo').on('change',function() {
        // alert($(this).val());
        console.log($(this).val());
    });


</script>