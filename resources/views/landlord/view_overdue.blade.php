@include('landlord.sidebar_landlord')
<div class="container-fluid">
@php
  $count=0;
@endphp
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                    <div class="col-sm-12 col-md-10">                        
                        @if (isset($from))
                        <h6 class='m-0 font-weight-bold text-primary' id='cardHeading'>Earnings Report By Month {{ $from }} to {{ $to }}</h6>
                        @else
                        <h6 class='m-0 font-weight-bold text-primary' id='cardHeading'>Overdue Rent Report</h6>
                        @endif
                        
                    </div>
                    
            </div>   
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Name</th>
                            <th>Property</th>
                            <th>Rent </th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                       @foreach ($payment as $p)
                              
                            <tr>
                                <td> <input type="checkbox" name="overDue" value="{{ $p->id }}" id="{{ $count++ }}" /> </td>
                                <td>{{ $p->fname ." ". $p->lname }}</td>
                                <td>{{ $p->address1 .",". $p->city }}</td>
                                <td>${{$p->rent }}</td>
                                <td>{{ $p->dueDate }}</td>

                            </tr>
                            
                       @endforeach
                       <tfoot>
                        <tr>
                            <th>Select</th>
                            <th>Name</th>
                            <th>Property</th>
                            <th>Rent </th>
                            <th>Due Date</th>
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
    var data = [];
    $('input[name="overDue"]').change(function() {
      data[this.id]= this.value;
      console.log(data);
    });

    

$(document).ready(function() {
  $('#dataTable').DataTable({
    columns: [
      { orderable: false },
      { orderable: true },
      { orderable: true },
      { orderable: true },
      { orderable: true },
    ],    
    buttons: {
      
      buttons: [
        // 'excel', 'pdf', 'print',
        { extend: 'excel', className: 'copyButton btn btn-success', exportOptions: {
          columns: [ 1, 2, 3,4 ]
      } },
        { extend: 'print', className: 'copyButton btn btn-danger', exportOptions: {
              columns: [ 1, 2, 3,4 ]
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
