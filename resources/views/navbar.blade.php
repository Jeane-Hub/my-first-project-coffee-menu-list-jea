<style>
    .navbar-logo {
      width: 70px;
      height: 50px;
      margin-right: -26px;
      filter: brightness(0) saturate(100%) invert(37%) sepia(93%) saturate(3015%) hue-rotate(337deg) brightness(108%) contrast(101%);
    }
    .btn-search { 
      background-color: #8a1616 !important; 
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-1">
  <div class="container">

    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
      <img src="{{ asset('images/img15.png') }}" alt="JeaneCoffee Logo" class="navbar-logo object-fit-contain">
      <span class="fw-bold">JeaneCoffee</span>
    </a>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation Links -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item me-lg-3">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item me-lg-3">
          <a class="nav-link" href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item me-lg-3">
          <a class="nav-link" href="{{ route('contact') }}">Contact</a>
        </li>
        <li class="nav-item me-lg-3">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
      </ul>

      <!-- Search Form -->
      <form class="d-flex" role="search" action="/search" method="GET">
        <input name="query" class="form-control form-control-sm me-2" type="search" placeholder="Find Your Interest" aria-label="Search">
        <button class="btn btn-sm btn-search text-white fw-bold" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>