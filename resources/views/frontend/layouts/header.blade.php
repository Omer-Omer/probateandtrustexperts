<header id="header">
    <div class="row d-flex justify-content-center bg-black text-white d-none d-md-block">
        <div class="offset-3 col-7">
            <span>
                <i class="fas fa-phone"></i><span style="margin-left: 5px;"> Office - Northern California: (415) 524-2218</span>
                <span style="padding: 0px 20px;">|</span>
                <i class="fas fa-phone"></i><span style="margin-left: 5px;">Office - Southern California: (310) 602-0548</span>
            </span>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><img class="img-fluid"
                    src="{{ asset('frontend/images/logo.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/living-trust/qa') }}">Living Trust Q & A</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Racial Discrimination</a>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Living Trust
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('/have-will') }}">Having only a Will</a></li>
                            <li><a class="dropdown-item" href="{{ url('/trust-without-will') }}">Trust without a will</a></li>
                            <li><a class="dropdown-item" href="{{ url('/trust-importance') }}">Trust Importance</a></li>
                            {{-- <li><a class="dropdown-item" href="#">International Employment Law</a></li>
                            <li><a class="dropdown-item" href="#">LGBTQ Rights</a></li>
                            <li><a class="dropdown-item" href="#">Wrongful Termination</a></li>
                            <li><a class="dropdown-item" href="#">Pregnant Workers’ Rights</a></li>
                            <li><a class="dropdown-item" href="#">Whistleblower Rights</a></li>
                            <li><a class="dropdown-item" href="#">Workplace Retaliation</a></li>
                            <li><a class="dropdown-item" href="#">Equal Pay</a></li>
                            <li><a class="dropdown-item" href="#">Executive Employee Representation</a></li>
                            <li><a class="dropdown-item" href="#">Family & Medical Leave Rights</a></li>
                            <li><a class="dropdown-item" href="#">Age Discrimination</a></li>
                            <li><a class="dropdown-item" href="#">Employment Law</a></li>
                            <li><a class="dropdown-item" href="#">Employee Privacy</a></li> --}}
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Mediation
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('/why-mediation') }}">Why Mediation</a></li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Success</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                </ul>
                {{-- <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
                <div class="d-fex">
                    <a class="me-2 c-contact-us" href="{{ url('/') }}">Contact Us</a>
                </div>
            </div>

        </div>
    </nav>

</header>
