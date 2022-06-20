<nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-dark">
    <div class="container-fluid mw-100">
      {{-- <a class="navbar-brand" href="#">Excel To PDF</a> --}}
      <a class="navbar-brand pl-4" id="main-nav" href="#">    
        <img class="nav-img img-fluid" src="{{asset('images/logo.png')}}" style="display: block;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          {{-- <li class="nav-item">
            <a class="nav-link {{ request()->is('home/upload') ? 'active' : '' }}" href="{{ route('upload') }}">Home</a>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>