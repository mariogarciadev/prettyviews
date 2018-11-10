<nav style="font-family: 'Graduate', cursive; font-size: 1.1rem;" class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
   
        <a style="font-weight: bold" class="navbar-brand" href="/">{{ config('app.name', 'PrettyViews') }}</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navBarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navBarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a style="{{Request::is('/') ? 'font-weight: bold; text-decoration: underline' : ''}}" class="nav-link text-primary" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a style="{{Request::is('albums') ? 'font-weight: bold; text-decoration: underline' : ''}}" class="nav-link text-danger" href="/albums">Albums</a>
                </li>
                <li class="nav-item">
                    <a style="{{Request::is('albums/create') ? 'font-weight bold; text-decoration: underline' : ''}}" class="nav-link text-warning" href="/albums/create">Create/Upload</a>
                </li>
 
            </ul>
          </div>

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/home">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
        </ul>
    
</nav>
