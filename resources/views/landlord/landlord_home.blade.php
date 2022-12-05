
@if(Session::has('LoggedUserGmail') || Session::has('LoggedUser'))
    
    @if(Session::has('LoggedUser'))
    <?php 
        $id = Session::get('LoggedUser')->getOriginal('id');    
    ?>
    @else
    <?php 
        $id = Session::get('LoggedUserGmail')->getOriginal('id');
    ?>
    @endif
@else
<script>window.location = "{{ route('welcome') }}"; </script>
      <?php exit; ?>
@endif



@include('landlord.sidebar_landlord')

<div class="container-fluid">

    




  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      {{-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> --}}
      <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
              class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                             Overdue Rent Amount</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <a href="{{ route('landlord.viewOverdue') }}">  ${{ $overDue }} </a>
                        </div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-clock fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              Earnings (Month)</div>
                        
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <a href="{{ route('landlord.viewEarnings') }}"> ${{ $totRent }}
                            </a>
                        </div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Property
                          </div>
                          <div class="row no-gutters align-items-center">
                              <div class="col-auto">
                                
                                    @php
                                        $totProperty = DB::table('properties')->where('landlordID',$id)->count();     
                                    @endphp
                                   
                                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <a href="{{ route('landlord.ViewProperty') }}">{{ $totProperty }}</a>    
                                </div>
                              </div>
                              
                          </div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-home fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                              # of Tenants </div>
                        @php
                            $totTenants = DB::table('tenants')->where('regBy',$id)->count();     
                        @endphp
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                            
                           <a href="{{ route('landlord.ViewTenants') }}">{{  $totTenants }}</a> 
                          </div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-user fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Content Row -->

  <div class="row">

     <!-- Complain | Room Sharing-->
    <div class="col-xl-8 col-lg-8">
        {{-- Query Complain --}}
        <div class="row">
            <div class="col-lg-12 col-xl-12">

            
            <div class="card shadow mb-4 ">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings by Month</h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body" style="overflow: hidden; ">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <div id="chart_div"></div>
                </div>
            </div>
        </div>

        </div>
        {{-- Request for Room Sharing --}}
        <div class="row">
            <div class="col-lg-12 col-xl-12">
            <div class="card shadow mb-4 ">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Requests</h6>
                    
                </div>
                
                <div class="card-body" style="overflow: hidden; ">
        
                        @php
                            $tid = array();
                            $address = array();
                            $tname = array();
                            $index=0;
                        @endphp
                        @foreach ($getRequest as $req)

                        @php
                            $tid[$index] = $req->tID;
                            $address[$index] = $req->address1;
                            $tmpadd[$req->address1] = $req->tID;
                            $tname[$index] = $req->fname ." ". $req->lname;
                            $index++;
                        @endphp
                            
                        @endforeach
                        
                        @php
                            $totLen = array_unique($tid);
                            $temp=0;
                        @endphp
                    <ul class="list-group">
                        @for ($i = 0; $i < count($totLen); $i++)
                               
                                    <li class="list-group-item">
                                       <b> {{ $tname[$i] }} </b> <br>
                                                                                
                                        @foreach ($tmpadd as $x => $value)
                                            @if ($value == $totLen[$i])
                                                {{ "\t\t    " }}  -{{ $x }}     <br>             
                                            @endif
                                        @endforeach
                                    </li>   
                        @endfor
                        
                    </ul>
                        
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4">
        {{-- Chart --}}
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Room(s) available for rent</h6>
                
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <ul class="list-group">
                @foreach ($countAvailRoom as $room)
                @if ($room->AvailableRooms > 0)
                    <li class="list-group-item">
                        <b>{{ $room->address1 }}</b> |
                        Available : {{ $room->AvailableRooms }}    
                    </li> 
                @endif
                @endforeach
                </ul>
            </div>
        </div>
    </div>
  </div>

@php
    $pAmount=0;
    $oAmount=0;
    $arr = Array();
    array_push($arr,'Month', 'collected', 'Not Received');
@endphp

@foreach ($getMonth as $m)
        @php
            
        @endphp
        @foreach ($chart as $c)
            @if ($m->month == $c->month)
                @if ($c->status == 0)
                    @php
                        $oAmount+=$c->rent;
                        
                    @endphp
                @else
                    @php
                        $pAmount+=$c->rent;
                        
                    @endphp
                @endif
            @endif
        @endforeach
        
        {{-- {{ $m->monthname." ". $oAmount ." ". $pAmount }} --}}
        @php
            array_push($arr, $m->monthname,$pAmount,$oAmount);
            $oAmount=0;
            $pAmount=0;
        @endphp
@endforeach
@php
    $ar = Array();
    $temp = 0;
@endphp
{{-- {{ dd($arr) }} --}}
@for ($i = 0; $i < count($arr)/3; $i++)
    @php
        $temp = $i * 3;
    @endphp
    @for ($j = 0 ; $j < 3; $j++)
        {{-- {{ $i ." ". $j }} --}}
        {{-- {{ $count }} --}}
        @php
            if ($i>0) {
                $ar[$i][$j] = $arr[$j+ $temp];     
                        
            }else {
                $ar[$i][$j] = $arr[$j];  
            }
           
        @endphp 
    @endfor

    @php
        
    @endphp
    
        
@endfor

 {{-- {{ dd($ar) }} --}}
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


@include('landlord.footer_landlord')
<script type="text/javascript">
    var users = @php echo json_encode($ar) @endphp
</script>

<script>
    var data = @php echo json_encode($arr) @endphp
</script>

<script>
    $("#pageTitle").text('Dashboard');

    console.log(users);
    
    google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable( users );
       
        //   ['APR', 1030, 540]
       
        var options = {
          chart: {
            title: 'Rent Collection',
            subtitle: 'Rent on time & overdue',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
</script>
