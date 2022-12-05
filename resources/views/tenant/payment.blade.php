<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Message from landlord</title>
    <style>
        body{
            font-family: monospace;
            background-image: url("https://img.freepik.com/free-photo/design-space-paper-textured-background_53876-42312.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
  </head>
  <body>

    <form action="{{ route('updatePayment') }}" method="POST">
    <div class="container">
        <div
          class="row align-items-center" style="min-height: 100vh; margin-left: 5px; margin-right: 5px; ">
          <div class="col-md-12">
            <div class="row">
                <div class="col-md-12" style="padding: 5px;">
                    <div class="text-center">
                        <h1>Message from  <?php echo $_GET['lName']; ?></h1>
                    </div>
                </div>
            <div class="col-md-12" style="padding: 5px;">
                <p> <b> From: </b> <?php echo $_GET['lEmail']; ?> </p>
                <hr>
                <p> <b> To: </b> <?php echo $_GET['tEmail']; ?>  </p>
                <hr>
                <p> <b> Subject: </b> Rent </p>
                <hr>
                
                Hey <?php echo $_GET['tName']; ?> , your rent for this month is $<?php echo $_GET['rent']; ?>  and it is due by <?php echo $_GET['dueDate']; ?>  please pay before 
                due date to avoid any charges.

                
                <p style="margin-top: 10px;">Thank you, <br> <?php echo $_GET['lName']; ?>  </p>
                <hr>
                <div class="text-center">
                    <button class="btn btn-primary text-center" name="status" value="1"  >Approved</button>
                    <button class="btn btn-danger" name="status" value="0" >Failed</button> <br>
                </div>
                <hr>

                <i>If you have any question feel free to reach me @ <?php echo $_GET['lEmail']; ?>  </i>
            </div>
          </div>
          @csrf
          <input type="hidden" id="tranId" name="tranId" value="<?php echo $_GET['tranId']; ?>">
          <input type="hidden" name="rent" value="<?php echo $_GET['rent']; ?>">
        </div>
      </div>
    </form>
      <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>
        var tranId = $('#tranId').val();
        let _token = $('input[name=_token]').val();
        function updateStatus(status) {
            $.ajax({
            url: "{{ route('updatePayment') }}",
            type : "POST",
            data : {
                id  : tranId,
                status: status,
                _token : _token,
            },
            success:function(response){
                if(response){
                    console.log(response);
                }
            }
        });

        }

    </script>

  </body>
</html>