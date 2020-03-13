<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('welcome')}}">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="{{route('arrUser')}}">Users</a>
        <a class="nav-item nav-link" href="{{route('arrAvatar')}}">Avatars</a>
        <a class="nav-item nav-link" href="{{route('arrCategorie')}}">Categories</a>
        <a class="nav-item nav-link" href="{{route('arrImage')}}">Images</a>
      </div>
    </div>
  </nav>