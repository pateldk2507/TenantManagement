@include('landlord.sidebar_landlord')
{{-- <script src="{{ asset('js/demo/table2excel.js') }}"></script> --}}
<style>
    
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-2 text-gray-800">Tenants</h1> --}} 
<div class="card shadow mb-4">
<div class="card-header py-3">
        <div class="row">
                <div class="col-sm-12">
                    <h6 class="m-0 font-weight-bold text-primary">Filter Options</h6>
                </div>
        </div>   
</div>
<div class="card-body">
    <form action="{{ route('landlord.getDataByDate') }}" method="post">
    <div class="row">
        @csrf
        <div class="col-sm-4 DateBlock">
            <label for="sDate">Start Date</label>
            <input type="date" name="sDate" id="sDate" placeholder="Start Date" class="form-control" required>
        </div>
        <div class="col-sm-4 DateBlock">
            <label for="eDate">End Date</label>
            <input type="date" name="eDate" id="eDate" placeholder="End Date" class="form-control" required>
        </div>
        <div class="col-sm-3">
            {{-- <label for="btnSearch">Search</label> --}}
            <br>
            <input type="submit" value="Submit" class="btn btn-primary"> |
            <a href="{{ route('landlord.viewEarnings') }}" class="btn btn-danger"> Get {{ now()->format('F') }} Data </a>
        </div>
    </div>
    </form>
</div>
</div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                    <div class="col-sm-12 col-md-10">
                        {{-- <h6 class="m-0 font-weight-bold text-primary" id="cardHeading">Earnings Report</h6> --}}
                        
                        @if (isset($from))
                        <h6 class='m-0 font-weight-bold text-primary' id='cardHeading'>Earnings Report By Month {{ $from }} to {{ $to }}</h6>
                        @else
                        <h6 class='m-0 font-weight-bold text-primary' id='cardHeading'>Earnings Report</h6>
                        @endif
                        
                    </div>
                    
            </div>   
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Property</th>
                            <th>Rent </th>
                            <th>Payment Date & Time</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                       @foreach ($payment as $p)
                                  
                            <tr>
                                <td>{{ $p->fname ." ". $p->lname }}</td>
                                <td>{{ $p->address1 .",". $p->city }}</td>
                                <td>${{ $p->rent }}</td>
                                <td>{{ $p->updated_at }}</td>

                            </tr>
                       @endforeach
                       <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Property</th>
                            <th>Rent </th>
                            <th>Payment Date & Time</th>
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

@include('landlord.footer_landlord')

<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

<script>
    $("#pageTitle").text('Payments Details');
$(document).ready(function() {
  $('#dataTable').DataTable({
    columns: [
      { orderable: true },
      { orderable: true },
      { orderable: true },
      { orderable: true },
    ],    
    buttons: {
      
      buttons: [
        // 'excel', 'pdf', 'print',
        { extend: 'excel', className: 'copyButton btn btn-success', exportOptions: {
          columns: [ 0, 1, 2, 3 ]
      } },
        { extend: 'print', className: 'copyButton btn btn-danger', exportOptions: {
              columns: [ 0, 1, 2, 3 ]
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
// $('#cardHeading').text('Earning Reports from '+ sDate + ' to ' + eDate);

</script>
