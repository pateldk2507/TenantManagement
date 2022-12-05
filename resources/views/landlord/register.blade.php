<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
               
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="{{route('landlord.register')}}" method="post">
                                @csrf
                                

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="fname" id="exampleFirstName"
                                            placeholder="First Name" value="{{old('fname')}}" >
                                            <span class="text-danger">
                                                 @error('fname') 
                                                    {{$message}}
                                                 @enderror 
                                            </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="lname" id="exampleLastName"
                                            placeholder="Last Name" value="{{old('lname')}}">
                                            <span class="text-danger" >
                                                 @error('lname') 
                                                    {{$message}}
                                                 @enderror 
                                            </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail"
                                        placeholder="Email Address" value="{{old('email')}}">
                                        <span class="text-danger">
                                                 @error('email') 
                                                    {{$message}}
                                                 @enderror 
                                            </span>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0" >
                                            <select name="gender" id="gender" name="gender" value="{{old('gender')}}" style="border-radius: 10rem; padding: 1rem 1rem; font-size: .8rem; width: 100%; color: #6e707e;background-color: #fff;background-clip: padding-box;border: 1px solid #d1d3e2;">
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
                                        <input type="tel" class="form-control form-control-user" value="{{old('phone')}}" name="phone" id="examplePhone"
                                            placeholder="Phone">
                                            <span class="text-danger">
                                                 @error('phone') 
                                                    {{$message}}
                                                 @enderror 
                                            </span>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            id="exampleInputPassword" placeholder="Password">
                                            <span class="text-danger">
                                                 @error('password') 
                                                    {{$message}}
                                                 @enderror 
                                            </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="password_confirmation"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                            <span class="text-danger">
                                                 @error('password_confirmation') 
                                                    {{$message}}
                                                 @enderror 
                                            </span>
                                    </div>
                                </div>
                               
                                <input type="submit" value="Register Account" class="btn btn-primary btn-user btn-block" />
                                <hr>
                                <a href="{{route('google.login')}}" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>