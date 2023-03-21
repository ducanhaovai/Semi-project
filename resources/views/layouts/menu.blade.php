<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">DapDo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        @if (auth()->check())

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{route('index')}}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>

                <li class="nav-item"><a href="{{route('hotel-1')}}" class="nav-link">Hotels</a></li>

                <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
                <li class="nav-item cta">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>



                <li class="nav-item cta"><a href="{{route('user.detail', ['id' => auth()->user()->id])}}" class="nav-link"><span>Welcome, {{ auth()->user()->name }}!</span></a></li>

            </ul>
        </div>
        @else
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{route('index')}}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>

                <li class="nav-item"><a href="{{route('hotel')}}" class="nav-link">Hotels</a></li>

                <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>



                <li class="nav-item cta"><a href="{{route('login')}}" class="nav-link"><span>Login</span></a></li>

            </ul>
        </div>
        @endif
    </div>
</nav>