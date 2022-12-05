<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PA | Landlord-Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{  asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{  asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
         #result{
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  padding: 10px 0;
}
.thumbnail {
  height: 192px;
}

    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('landlord.home') }}">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Landlord <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('landlord.home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Property
            </div>

            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landlord.ViewProperty') }}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Property</span></a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('landlord.ViewProperty') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>View All Property</span></a>
            </li> --}}

            <!-- Nav Item - Utilities Collapse Menu -->
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tenants
            </div>

            
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landlord.ViewTenants') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Tenants</span></a>
            </li>

            <!-- Nav Item - Tables -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('landlord.ViewTenants') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>View All Tenants</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">
                Broadcast 
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('landlord.AddAnnouncement') }}">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Announcement</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">
                Financial 
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('landlord.payment') }}">
                    <i class="fas fa-fw fa-money-bill"></i>
                    <span>Payment</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
               
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    
                    <h2 style="color:black; width:100%" id="pageTitle" class="font-weight-bold h3">Title</h2>
                
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                         <div class="topbar-divider d-none d-sm-block"></div>
                         
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(Session::has('LoggedUserGmail') || Session::has('LoggedUser'))
                                
                                <span id="LoggedUser" class="mr-2 d-none d-lg-inline text-gray-600 small">
                                  
                                        {{-- {{ dd(Session::get('LoggedUser')) }} --}}
                                    @if (Session::has('LoggedUserGmail'))
                                            {{ Session::get('LoggedUserGmail')->getOriginal('name') }}
                                    @elseif(Session::get('LoggedUser'))
                                            {{Session::get('LoggedUser')->getOriginal('name')}}
                                    @endif
                                   
                                </span>
                                @if (Session::has('LoggedUserGmail'))
                                <img class="img-profile rounded-circle" src={{ Session::get('LoggedUserGmail')->getOriginal('imageURL')}} />
                                @endif
                                @else
                                @php
                                    //   header("Location: http://127.0.0.1:8000/", true, 301);
                                    // exit();
                                @endphp
 
                                
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
