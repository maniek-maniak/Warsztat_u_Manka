@extends('template')

@section ('title')
  @if (isset($title))
    {{ " - ".$title }}
  @endif
@endsection ('title')

@section ('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        
        <li class="nav-item active">
          <a class="nav-link" href="../visits">Terminy<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="../cars">Auta<span class="sr-only">(current)</span></a>
        </li>    

      </ul>
    </div>
    </div>
  </nav>

<div class="container">
  @yield('table')
  @yield('form')
</div>
@endsection ('navbar')

