<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand font-weight-bold" href="{{route('events.index')}}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav">
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{route('events.index')}}">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('events.create')}}">New Event</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}">My Events</a>
            </li>
            <li class="nav-item">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <a  class="nav-link" 
                        href="{{route('logout')}}"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        Logout
                    </a>
                </form>
            </li>
            @endauth
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Register</a>
                </li>
            @endguest
        </ul>
    </div>
</nav>