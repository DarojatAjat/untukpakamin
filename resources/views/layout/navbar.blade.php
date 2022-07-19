<nav class="navbar navbar-expand-lg">
    <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
      aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
          class="fas fa-bars fa-1x"></i></span></button>
    <div class="collapse navbar-collapse tm-nav" id="navbarSupportedContent1">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
          <a class="nav-link tm-nav-link" href="{{url('/')}}">Dashboard</a>
        </li>
        <li class="nav-item {{ (request()->segment(1) == 'kategori') ? 'active' : '' }}">
          <a class="nav-link tm-nav-link" href="{{url('kategori')}}"> Data Katergori</a>
        </li>
        <li class="nav-item {{ (request()->segment(1) == 'barang') ? 'active' : '' }}">
          <a class="nav-link tm-nav-link" href="{{url('barang')}}"> Data Barang</a>
        </li>
        <li class="nav-item {{ (request()->segment(1) == 'contact') ? 'active' : '' }}">
          <a class="nav-link tm-nav-link" href="{{url('contact')}}">Contact</a>
        </li>
      </ul>
    </div>
  </nav>