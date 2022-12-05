<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PropertyAssistance</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="{{  asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Vendor CSS Files -->
  <link href="{{  asset('vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/home-style.css') }}" rel="stylesheet">
  <style>
   .form-control{
    margin-bottom: 7px;
   }
   .crossline  {
   width: 100%; 
   text-align: center; 
   border-bottom: 1px solid #000; 
   line-height: 0.1em;
   margin: 10px 0 20px; 
  } 

.crossline small { 
    background:#fff; 
    padding:0 10px; 
}
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="index.html"><span>PropertyAssistance</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li class="dropdown"><a href="#"><span>Landlord</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                
                <li><a href="#" data-toggle="modal" data-target="#regLandlord">Register</a></li>
                <li><a href="#" data-toggle="modal" data-target="#loginLandlord">Login</a></li>
              </ul>
            </li>
            <li class="dropdown"><a href="#"><span>Tenant</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                
                <li><a href="#" data-toggle="modal" data-target="#regTenant">Register</a></li>
                <li><a href="#" data-toggle="modal" data-target="#loginTenant">Login</a></li>
              </ul>
            </li>
            
            <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>New way to find your home</h1>
      <h2>Share Room | Home with a personality you like </h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="about" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right">
            <div class="content">
              <h3>Why Choose PropertyAssistance ?</h3>
              <p>
                In our platform all the profile are verified by government issue photo id so you do not have to worry about
                fruad profile.
                
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-user-check"></i>
                    <h4>Verified Profile</h4>
                    <p>All of our users are verified before they post anything on our platform</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-check-shield"></i>
                    <h4>Security</h4>
                    <p>We respect your data in our platform</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-money"></i>
                    <h4>14 day free trial</h4>
                    <p>New user get 14 days free trial in our platform you can use all the basic features</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    {{-- Register Model Landlord --}}
    <div class="modal fade" id="regLandlord" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Landlord Register</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                    
              <div class="col-12">
                  <div class="p-1">
                      
                      <form class="user" action="{{route('landlord.register')}}" method="post">
                          @csrf

                          <div class="form-group row">
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFirstName">First Name</label>
                                  <input type="text" class="form-control" name="fname" id="exampleFirstName"
                                       value="{{old('fname')}}" >
                                      <span class="text-danger">
                                           @error('fname') 
                                              {{$message}}
                                           @enderror 
                                      </span>
                              </div>
                              <div class="col-sm-6">
                                <label for="exampleLastName">Last Name</label>
                                  <input type="text" class="form-control" name="lname" id="exampleLastName"
                                      value="{{old('lname')}}">
                                      <span class="text-danger" >
                                           @error('lname') 
                                              {{$message}}
                                           @enderror 
                                      </span>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                              <input type="email" class="form-control" name="email" id="exampleInputEmail"
                                  value="{{old('email')}}">
                                  <span class="text-danger">
                                           @error('email') 
                                              {{$message}}
                                           @enderror 
                                      </span>
                          </div>
                          <div class="form-group row">
                            
                              <div class="col-sm-6 mb-3 mb-sm-0" >
                                <label for="gender">Select Gender</label>
                                      <select name="gender" id="gender" class="form-control" name="gender" value="{{old('gender')}}" >
                                          <option selected="selected" value=""> Select Gender</option>
                                          <option value="1" @if (old('gender') == "1") {{ 'selected' }} @endif>Male</option>
                                          <option value="0" @if (old('gender') == "0") {{ 'selected' }} @endif>Female</option>
                                          <option value="X" @if (old('gender') == "x") {{ 'selected' }} @endif>Other</option>
                                      </select>
                                      <span class="text-danger">
                                           @error('gender') 
                                              {{$message}}
                                           @enderror 
                                      </span>
                                 
                              </div>
                              <div class="col-sm-6">
                                <label for="examplePhone">Phone</label>
                                  <input type="tel" class="form-control" value="{{old('phone')}}" name="phone" id="examplePhone"
                                      >
                                      <span class="text-danger">
                                           @error('phone') 
                                              {{$message}}
                                           @enderror 
                                      </span>
                              </div>
                          </div>
                         
                          <div class="form-group row">
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleInputPassword">Password</label>
                                  <input type="password" class="form-control" name="password"
                                      id="exampleInputPassword" >
                                      <span class="text-danger">
                                           @error('password') 
                                              {{$message}}
                                           @enderror 
                                      </span>
                              </div>
                              <div class="col-sm-6">
                                <label for="exampleRepeatPassword">Repeat Password</label>
                                  <input type="password" class="form-control" name="password_confirmation"
                                      id="exampleRepeatPassword" >
                                      <span class="text-danger">
                                           @error('password_confirmation') 
                                              {{$message}}
                                           @enderror 
                                      </span>
                              </div>
                              <input type="hidden" name="userType" value="1">
                          </div>
                          <div class="text-center">
                            <button type="submit" value="Register Account" class="btn btn-primary btn-user btn-block text-center m-3"><i class="fas fa-check fa-fw"></i> Register </button>
                          
                            <h3 class="crossline"><small>OR</small></h3>
                          
                          <a href="{{route('google.login',['id'=>1])}}" onclick="setCookie('userType',1,1);" class="btn btn-danger ">
                              <i class="fab fa-google fa-fw"></i> Register with Google
                          </a>
                        </div>
                         
                      </form>
                      
                  </div>
              </div>
          </div>
          </div>
          <div class="modal-footer">
            <a class="small float-right mr-4" href="login.html">Already have an account? Login!</a>
          </div>
        </div>
      </div>
    </div>

    {{-- Login Model Landlord --}}
    <div class="modal fade" id="loginLandlord" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Landlord Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                  <div class="p-1">
                    <form action="" method="get">
                      @csrf
                          <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                  <label for="lEmail">Email</label>
                                  <input type="email" name="lEmail" id="lEmail" class="form-control">
                                </div>
                          </div>
                          <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                  <label for="lPwd">Password</label>
                                  <input type="password" name="lPwd" id="lPwd" class="form-control">
                                </div>
                          </div>
                          <input type="hidden" name="userType" value="1">

                          <div class="form-group row">
                                <div class="text-center">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                   <button type="submit" class="btn btn-primary"> <i class="fas fa-lock fa-fw"></i> Login  </button>
                                </div>
                                <h3 class="crossline mt-4"><small>OR</small></h3>
                          
                          <a href="{{route('google.login',['id'=>1])}}" onclick="setCookie('userType',1,1);" class="btn btn-danger ">
                              <i class="fab fa-google fa-fw"></i> Continue with Google
                          </a>
                              </div>
                          </div>
                     
                    </form>
                  </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a class="small float-right mr-4" href="login.html">Don't have an account?</a>
          </div>
        </div>
      </div>
    </div>


    {{-- Register Model Tenant --}}
    <div class="modal fade" id="regTenant" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tenent Register</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                    
              <div class="col-12">
                  <div class="p-1">
                      
                      <form class="user" action="{{route('landlord.register')}}" method="post">
                          @csrf

                          <div class="form-group row">
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleFirstName">First Name</label>
                                  <input type="text" class="form-control" name="fname" id="exampleFirstName"
                                       value="{{old('fname')}}" >
                                      <span class="text-danger">
                                           @error('fname') 
                                              {{$message}}
                                           @enderror 
                                      </span>
                              </div>
                              <div class="col-sm-6">
                                <label for="exampleLastName">Last Name</label>
                                  <input type="text" class="form-control" name="lname" id="exampleLastName"
                                      value="{{old('lname')}}">
                                      <span class="text-danger" >
                                           @error('lname') 
                                              {{$message}}
                                           @enderror 
                                      </span>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                              <input type="email" class="form-control" name="email" id="exampleInputEmail"
                                  value="{{old('email')}}">
                                  <span class="text-danger">
                                           @error('email') 
                                              {{$message}}
                                           @enderror 
                                      </span>
                          </div>
                          <div class="form-group row">
                            
                              <div class="col-sm-6 mb-3 mb-sm-0" >
                                <label for="gender">Select Gender</label>
                                      <select name="gender" id="gender" class="form-control" name="gender" value="{{old('gender')}}" >
                                          <option selected="selected" value=""> Select Gender</option>
                                          <option value="1" @if (old('gender') == "1") {{ 'selected' }} @endif>Male</option>
                                          <option value="0" @if (old('gender') == "0") {{ 'selected' }} @endif>Female</option>
                                          <option value="X" @if (old('gender') == "x") {{ 'selected' }} @endif>Other</option>
                                      </select>
                                      <span class="text-danger">
                                           @error('gender') 
                                              {{$message}}
                                           @enderror 
                                      </span>
                                 
                              </div>
                              <div class="col-sm-6">
                                <label for="examplePhone">Phone</label>
                                  <input type="tel" class="form-control" value="{{old('phone')}}" name="phone" id="examplePhone"
                                      >
                                      <span class="text-danger">
                                           @error('phone') 
                                              {{$message}}
                                           @enderror 
                                      </span>
                              </div>
                          </div>
                         
                          <div class="form-group row">
                              <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="exampleInputPassword">Password</label>
                                  <input type="password" class="form-control" name="password"
                                      id="exampleInputPassword" >
                                      <span class="text-danger">
                                           @error('password') 
                                              {{$message}}
                                           @enderror 
                                      </span>
                              </div>
                              <div class="col-sm-6">
                                <label for="exampleRepeatPassword">Repeat Password</label>
                                  <input type="password" class="form-control" name="password_confirmation"
                                      id="exampleRepeatPassword" >
                                      <span class="text-danger">
                                           @error('password_confirmation') 
                                              {{$message}}
                                           @enderror 
                                      </span>
                              </div>
                              <input type="hidden" name="userType" value="0">
                          </div>
                          <div class="text-center">
                            <button type="submit" value="Register Account" class="btn btn-primary btn-user btn-block text-center m-3"><i class="fas fa-check fa-fw"></i> Register </button>
                          
                            <h3 class="crossline"><small>OR</small></h3>
                          
                          <a href="{{route('google.login',['id'=>0])}}" onclick="setCookie('userType',0,1);" class="btn btn-danger ">
                              <i class="fab fa-google fa-fw"></i> Register with Google
                          </a>
                        </div>
                         
                      </form>
                      
                  </div>
              </div>
          </div>
          </div>
          <div class="modal-footer">
            <a class="small float-right mr-4" href="login.html">Already have an account? Login!</a>
          </div>
        </div>
      </div>
    </div>

    {{-- Login Model Tenant --}}
    <div class="modal fade" id="loginTenant" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tenent Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                  <div class="p-1">
                    <form action="" method="get">
                      @csrf
                          <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                  <label for="lEmail">Email</label>
                                  <input type="email" name="lEmail" id="lEmail" class="form-control">
                                </div>
                          </div>
                          <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                  <label for="lPwd">Password</label>
                                  <input type="password" name="lPwd" id="lPwd" class="form-control">
                                </div>
                          </div>
                          <input type="hidden" name="userType" value="0">

                          <div class="form-group row">
                                <div class="text-center">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                   <button type="submit" class="btn btn-primary"> <i class="fas fa-lock fa-fw"></i> Login  </button>
                                </div>
                                <h3 class="crossline mt-4"><small>OR</small></h3>
                          
                          <a href="{{route('google.login',['id'=>0])}}" onclick="setCookie('userType',0,1);" class="btn btn-danger ">
                              <i class="fab fa-google fa-fw"></i> Continue with Google
                          </a>
                              </div>
                          </div>
                     
                    </form>
                  </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a class="small float-right mr-4" href="login.html">Don't have an account?</a>
          </div>
        </div>
      </div>
    </div>
    
    

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
              <h2>Services</h2>
              <p>Services are offered by our platform is unique and helps you to find best roommates.</p>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-md-6 d-flex align-items-stretch">
                <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                  <div class="icon"><i class="bx bx-pencil"></i></div>
                  <h4><a href="">Set Personal Prefrences</a></h4>
                  <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                </div>
              </div>

              <div class="col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                  <div class="icon"><i class="bx bx-body"></i></div>
                  <h4><a href="">Matchmaking</a></h4>
                  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                </div>
              </div>

              <div class="col-md-6 d-flex align-items-stretch mt-4">
                <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                  <div class="icon"><i class="bx bx-credit-card"></i></div>
                  <h4><a href="">Online Payment</a></h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                </div>
              </div>

              <div class="col-md-6 d-flex align-items-stretch mt-4">
                <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                  <div class="icon"><i class="bx bx-home-smile"></i></div>
                  <h4><a href="">Landlord Platform</a></h4>
                  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

  

    

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
              <h2>Team</h2>
              <p></p>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">

              <div class="col-lg-6">
                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                  <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Nick Kolobutin</h4>
                    <span>Chief Executive Advisor</span>
                    <p></p>
                    <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="member" data-aos="zoom-in" data-aos-delay="200">
                  <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Saagneek Bhakta</h4>
                    <span>Product Manager</span>
                    <p></p>
                    <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4">
                <div class="member" data-aos="zoom-in" data-aos-delay="300">
                  <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Dipen Patel</h4>
                    <span>CTO</span>
                    <p></p>
                    <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4">
                <div class="member" data-aos="zoom-in" data-aos-delay="400">
                  <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Dhaval Patel</h4>
                    <span>Developer</span>
                    <p></p>
                    <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <div class="section-title">
              <h2>Contact</h2>
              <p>If you have any query, suggestion or comments please let us know by this form. </p>
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2648.790016897777!2d-89.27185558444484!3d48.40297554061801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4d5921d099e9d447%3A0x2fdeb4b250a8e1a8!2sConfederation%20College!5e0!3m2!1sen!2sca!4v1666027174546!5m2!1sen!2sca"  loading="lazy" frameborder="0" allowfullscreen></iframe>
            {{-- <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe> --}}
            <div class="info mt-4">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>1450 Nakina Dr, Thunder Bay, ON P7C 4W1</p>
            </div>
            <div class="row">
              <div class="col-lg-6 mt-4">
                <div class="info">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@PA.com</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info w-100 mt-4">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+1 (807) 475-6110</p>
                </div>
              </div>
            </div>

            <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>PropertyAssitance</h3>
            <p>
                1450 Nakina Dr <br>
             Thunder Bay, ON P7C 4W1<br>
              Canada <br><br>
              <strong>Phone:</strong> +1 (807) 457-6110<br>
              <strong>Email:</strong> info@PA.ca<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p></p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>PropertyAssistance</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/ -->
         
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    function setCookie(cname, cvalue, exdays) {
      localStorage.setItem('user', cvalue);
      const d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      let expires = "expires="+ d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      console.log(document.cookie);
    }
  </script>
  {{-- JQuery --}}
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>