<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/index">MUSICALY</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      {{-- Research bar --}}
        <ul class="navbar-nav">
            <div>
                <div class="input-group">
                <form class="user" action="/search" method="POST">
                  {{csrf_field()}}
                  <input type="text" name="search" class="form-control" placeholder="Search for a concert...">
                </form>
                </div>
            </div>
        </ul>
        {{-- End Research bar --}}
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/index">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          @if(auth()->guest())

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/register') }}">Register</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ url('/cart-checkout') }}">Cart</a>
          </li>
          @if(Cart::getContent()->count() >= 1)
          <li class="nav-item">
            <span class="badge badge-secondary badge-pill">{{Cart::getContent()->count()}}</span>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/signout') }}">Log Out</a>
          </li>
          @endif

        </ul>
      </div>
    </div>
  </nav>
