<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Utopya</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>

    <body>
      <nav class="light-blue lighten-2" role="navigation">
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo"><i class="material-icons">cloud</i>Utopya</a>
        </div>
      </nav>
      <div class="container">
        @yield('content')
      </div>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    </body>
</html>
