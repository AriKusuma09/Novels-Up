<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="/assets/img/icon/icon.png" width="40" height="40" alt="">
        Novels Up
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link navbar-link {{ Request::is('/') ? 'text-primary':'' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navbar-link {{ Request::is('list-novel') ? 'text-primary':'' }}" href="/list-novel">Daftar Novel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navbar-link" href="/about">About</a>
          </li>
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle fs-5"></i> {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu">
              @if (auth()->user()->role_as == '1')
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> My Dashboard</a></li>
              @endif
              <li><a class="dropdown-item" href="/profile"><i class="bi bi-person-fill"></i> My Profile</a></li>
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</button>
              </form>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link btn btn-primary text-white px-3" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
          @endauth
          <span class="icon dark-theme-icon fs-4 me-5" onclick="setDarkMode()" id="darkButton"><i class="bi bi-moon-fill"></i></span>
        </ul>
      </div>
    </div>
  </nav>