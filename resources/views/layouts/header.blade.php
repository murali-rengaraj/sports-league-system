<nav class="navbar navbar-expand bg-dark px-3">
        <h1 class="navbar-header me-auto text-info">Co Sports</h1>
        <ul class="navbar-nav">
        @if (Auth::user())            
        <h2 class="text-white navbar-header me-3">Welcome {{Auth::user()->name}}</h2>
        <form action="{{ url('/logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        @else
            <li class="nav-item">
                <button class="btn-sm btn-warning border-0 me-2">
                    <a href="{{ url('/register') }}" class="nav-link text-white">Register</a>
                </button>
            </li>
            <li class="nav-item">
                <button class="btn-sm btn-warning border-0">
                    <a href="{{ url('/login') }}" class="nav-link text-white">Login</a>
                </button>
            </li>
            @endif
        </ul>
    </nav>