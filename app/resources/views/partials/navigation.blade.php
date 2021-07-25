<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('post-list') }}">Bloger laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest

                @auth
                    <li class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> {{auth()->user()->email}}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
{{--                            <li>--}}
{{--                                <a class="dropdown-item" href="{{ route('logout') }}">Profile</a>--}}
{{--                            </li>--}}
                            <li>
                                <a class="dropdown-item" href="{{ route('post-list-by-author') }}">My Posts</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
