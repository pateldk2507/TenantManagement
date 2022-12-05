@include('landlord.sidebar_landlord')
<script src="{{ asset('js/demo/table2excel.js') }}"></script>
<style>
    
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-2 text-gray-800">Tenants</h1> --}}
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('landlord.AddTenants') }}" class="btn btn-primary mb-4 float-right"> <i class="fa fa-plus"></i> Add New Tenant</a>
            {{-- <h1 class="h3 mb-4 text-gray-800 float-right">All Listed Property</h1> --}}
        </div>
    </div>
    
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                    <div class="col-sm-4">
                        <h6 class="m-0 font-weight-bold text-primary">Tenants Details</h6>
                    </div>
                    {{-- <div class="col-sm-8">
                        <div class="dropdown">
                            <button class="btn btn-success float-right dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-share"></i> 
                                Export
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#"> <i class="fas fa-file-excel"></i>  Excel</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-file-pdf"></i>  PDF</a>
                              
                            </div>
                          </div>
                        
                    </div> --}}
            </div>   
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Property</th>
                            <th>Lease </th>
                            <th>Contact</th>
                            <th>Room</th>
                            <th>Rent</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                        @php
                             function getEndDate($signedDate,$leaseType){
                                    $date = new DateTime($signedDate);
                                    $date->modify("+".$leaseType.' month'); 
                                    $date = $date->format('Y-m-d');
                                    return $date;
                                  }
                        @endphp
                       @foreach ($tenants as $tenant)
                                  
                            <tr>
                                <td>{{ $tenant->fname ." ". $tenant->lname }}</td>
                                @php
                                  $prop =  DB::table('properties')->select('address1','address2','city', 'state', 'zip')->where('id', '=', $tenant->property)->first();          
                                @endphp
                                  

                                <td> {{ $prop->address1 .",". $prop->address2 }} <br> {{ $prop->city .",". $prop->state .",". $prop->zip }}</td>
                                <td>Start: {{ $tenant->signedDate }} <br> End: @php echo getEndDate($tenant->signedDate,$tenant->leaseType); @endphp</td>
                                <td>{{ $tenant->phone }}</td>
                                <td>{{ $tenant->room }} </td>
                                <td>${{ $tenant->rent }}</td>
                                <td>
                                    <a href="EditTenant/{{ $tenant->id }}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit Tenant Details">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="EditTenant/{{ $tenant->id }}" class="btn btn-danger" data-toggle="modal" data-target="#mailModal">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                </td>
                            </tr>
                       @endforeach
                       <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Property</th>
                            <th>Lease </th>
                            <th>Contact</th>
                            <th>Room</th>
                            <th>Rent</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="mailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="personalMsg">Message</label>
                  <textarea name="personalMsg" class="form-control" id="personalMsg" cols="30" rows="10"></textarea>
                </div>
                
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send</button>
        </div>
      </div>
    </div>
  </div>
  

{{-- <script src="{{ asset('js/demo/datatables-demo.js') }}"></script> --}}
@include('landlord.footer_landlord')

<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

<script>
    $("#pageTitle").text('Tenants Details');
    
$(document).ready(function() {
  $('#dataTable').DataTable({
    columns: [
      { orderable: true },
      { orderable: false },
      { orderable: false },
      { orderable: false },
      { orderable: false },
      { orderable: false },
      { orderable: false },
    ],    
    buttons: {
      
      buttons: [
        // 'excel', 'pdf', 'print',
        { extend: 'excel', className: 'copyButton btn btn-success', exportOptions: {
          columns: [ 0, 1, 2, 3, 4,5 ]
      } },
        { extend: 'pdf', className: 'copyButton btn btn-secondary', exportOptions: {
          columns: [ 0, 1, 2, 3, 4,5 ]
      } },
        { extend: 'print', className: 'copyButton btn btn-danger', exportOptions: {
              columns: [ 0, 1, 2, 3, 4,5 ]
      } },
      'colvis'
      ]
  },
  dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'f><'col-sm-12 col-md-4'B>>" +
  "<'row'<'col-sm-12'tr>>" +
  "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",  
  
  });
  $(".dt-buttons").prepend("Export to:<br>");
});
   
</script>

<style>
    .dt-buttons {

}


</style>