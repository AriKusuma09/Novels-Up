<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/">
      <img src="/assets/img/icon/icon.png" width="20" height="20" alt="">
      Novels Up
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <form action="/logout" method="POST">
          @csrf
          <button class="nav-link logout-dashboard" type="submit">Log Out</button>
        </form>
      </div>
    </div>
  </header>
  
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard') ? 'active':'' }}" aria-current="page" href="/dashboard">
                <span data-feather="home" class="align-text-bottom"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/novel-controller') ? 'active':'' }}" href="/dashboard/novel-controller">
                <span data-feather="file" class="align-text-bottom"></span>
                Novel Controller
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/chapter-controller') ? 'active':'' }}" href="/dashboard/chapter-controller">
                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                Chapter Novel Controller
              </a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/manga-controller') ? 'active':'' }}" href="/dashboard/manga-controller">
                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                Manga Controller
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/chapter-manga-controller') ? 'active':'' }}" href="/dashboard/chapter-manga-controller">
                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                Chapter Manga Controller
              </a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/users') ? 'active':'' }}" href="/dashboard/users">
                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                Admin And Users 
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/trash') ? 'active':'' }}" href="/dashboard/trash">
                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                Trash
              </a>
            </li>
          </ul>
        </div>
      </nav>