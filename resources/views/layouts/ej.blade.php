@include('includes.head')
<link href="https://fonts.googleapis.com/css?family=Satisfy|Open+Sans" rel="stylesheet">
<link href="/css/ej.css" rel="stylesheet">
</head>
<body>
<div class="pure-g ej-template">
    <div class="pure-u-1 pure-u-md-3-4 pure-u-lg-4-5 left-pane">
        <header>
            <a href="/ej/home">Haval</a>
        </header>
        <div class="content">
            @yield('content')
        </div>
    </div>
    <div class="pure-u-1 pure-u-md-1-4 pure-u-lg-1-5 right-pane">
        <div class="perso">
            @if(Session::has('perso'))
                <div class="name">
                {{ Session::get('perso')->nom }}, {{ Session::get('perso')->race }}
                </div>
                <i class="fa fa-user" aria-hidden="true"></i>
            @endif
        </div>
        <div class="bottom">
            <a class="pure-button"
                    href="{{ url('/persos/logout') }}"
                    onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">Déconnexion</a>

            <form id="logout-form" action="{{ url('/persos/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
@include('includes.footer')