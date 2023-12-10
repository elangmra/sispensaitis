<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-light navbar-light">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img id="SISPENSAITIS-LOGO" class="img-fluid logo-font"
                src="{{ asset('images/logoss.png') }}" alt="SISPENSAITIS LOGO" style="max-height: 60px"
                draggable="false"  />
            <span class="ps-2 fw-bold fst-italic">
                SISPENSAITIS
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item ms-3">
                    <a class="btn btn-dark btn-rounded" href="{{ route('essay.index') }}">Sign in</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar -->
