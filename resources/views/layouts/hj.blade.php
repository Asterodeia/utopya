@include('includes.head')
<header>
    <div class="hj-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="">Utopya</a>
        <ul class="pure-menu-list">
            @if (Auth::guest())
                <li class="pure-menu-item"><a class="pure-menu-link" href="{{ url('/login') }}">Login</a></li>
                <li class="pure-menu-item"><a class="pure-menu-link" href="{{ url('/register') }}">Créer un compte</a>
                </li>
            @else
                <li class="pure-menu-item">{{ Auth::user()->name }}<a class="pure-menu-link"
                                                                      href="{{ url('/logout') }}"
                                                                      onclick="event.preventDefault();
                                                                       document.getElementById('logout-form').submit();">Déconnexion</a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endif
        </ul>
    </div>
</header>
<div class="content-wrapper">
    <div class="content">
        @yield('content')
    </div>
</div>
@include('includes.footer')