<nav class="navbar navbar-expand-sm navbar-light bg-light mb-5" style="font-family: 'Montserrat', sans-serif; font-weight:500; color:black;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}"><img src="/images/logos/logo_top.svg" style=" width:90px; height:auto;" alt=""></a>
            </li>
           
        </ul>
        <ul class="nav navbar-nav mx-auto ">
 
            <li class="nav-item text-dark"><a class="nav-link " href="{{ route('home') }}">Home</a></li>
            <li class="nav-item "><a class="nav-link" href="{{ route('about') }}" id="about">About</a></li>
 
            <li class="nav-item "><a class="nav-link" href="{{ route('pricing') }}" id="pricing">Pricing</a></li>

            <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}" id="contact">Contact</a></li>

        </ul>
        <ul class="nav navbar-nav" id="liste">
            <li class="nav-item" >
                <a class="nav-link" href="{{ route('login') }}" id="lien1">Sign In</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
            </li>
           
        </ul>
    </div>


</nav>
