<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Utopya</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>
@if (Auth::check())
    <ul id="user_dropdown" class="dropdown-content" role="menu">
        <li>

        </li>
        <li>
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                Déconnexion
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
@endif
<nav role="navigation">
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Utopya</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Créer un compte</a></li>
            @else
                <li><a class="dropdown-button" href="#!" data-activates="user_dropdown">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
            @endif
        </ul>
    </div>
</nav>
<div class="container global">
    @yield('content')
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".dropdown-button").dropdown();
    });
</script>
</body>
</html>
