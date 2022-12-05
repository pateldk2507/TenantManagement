<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Property Assistance</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
    <ul class="navbar-nav mr-auto"  style="width:100%;">
      <li class="nav-item ">
        <a class="nav-link text-dark font-weight-bold text-dark font-weight-bold" href="#">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark font-weight-bold" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark font-weight-bold" href="#">Property</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark font-weight-bold" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark font-weight-bold" href="#">Contact Us</a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link text-dark font-weight-bold dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Join Us
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('landlord.register') }}">Landlord</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Tanent</a>
        </div>
      </li>

      <li class="nav-item" style="float:right">
        <a  href="#" class="btn btn-primary" >Login</a>
      </li>
      
    </ul>
    
  </div>
</nav>