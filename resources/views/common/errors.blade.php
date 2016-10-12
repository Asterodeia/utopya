@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="card blue-grey darken-1">
      <div class="card-content white-text">
        <span class="card-title">Erreur!</span>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    </div>
@endif
