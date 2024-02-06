<nav class="navbar navbar-expand-lg bg-body-tertiary py-3 px-2 mt-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('adminhome') }}">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('adminhome') }}">Request</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('managemodel') }}">List Model</a>
          </li>
        
        </ul>
        <span class="navbar pe-3">
          <a class="nav-link text-danger" href="{{ route('logout') }}">Logout</a>
        </span>
      </div>

      
    </div>
  </nav>
