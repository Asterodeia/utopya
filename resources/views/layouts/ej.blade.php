@include('includes.head')
<link href="/css/ej.css" rel="stylesheet">
</head>
<body>
<header>
<div class="pure-g ej-template">
    <div class="pure-u-1 pure-u-md-3-4 pure-u-lg-4-5 left-pane">
        @yield('content')
    </div>
    <div class="pure-u-1 pure-u-md-1-4 pure-u-lg-1-5 right-pane">
        <div class="perso">
            @if(Session::has('perso'))
                {{ Session::get('perso')->name }}
                <br/>
                {{ Session::get('perso')->race }}
            @endif
        </div>
        <div class="bottom">
            <a
               href="{{ url('/persos/logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">Déconnexion</a>

            <form id="logout-form" action="{{ url('/persos/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
</header>
@include('includes.footer')