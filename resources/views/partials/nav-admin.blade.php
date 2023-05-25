<nav class="navbar p-2" style="background-color: rgb(0, 0, 0)">
    <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
        <a class="navbar-brand text-center text-light ml-2" href="{{ route('home') }}">
            GIS MASJID
        </a>
        <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse"
            data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-bounding-box"></i>
                Hello! {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="{{ route('welcome') }}">Home</a></li>
                <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#LogoutModal">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
