@extends('start')

@section ('title')
  @if (isset($title))
    {{ " - ".$title }}
  @endif
@endsection ('title')

@section ('content')
<div class="container" style= "width: 30%">
<form method="POST" action="{{ route('register') }}">
  @csrf
  <div class="form-group">
    <label for="inputName">Nazwa użytkownika</label>
    <input type="text" name="name" class="form-control" id="inputName" placeholder="Podaj nazwę użytkownika">
  </div>

  <div class="form-group">
    <label for="inputEmail">Adres e-mail</label>
    <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Podaj email">
  </div>

  <div class="form-group">
    <label for="inputPassword1">Hasło</label>
    <input type="password" name="password" class="form-control" id="inputPassword1" placeholder="Podaj hasło">
  </div>

  <div class="form-group">
    <label for="inputPassword2">Powtórz hasło</label>
    <input type="password" name="password_confirmation" class="form-control" id="inputPassword2" placeholder="Powtórz hasło">
  </div>
  


  <button type="submit" class="btn btn-primary">Zarejestruj się</button>
</form>
  <div style= "margin-top: 10px">
    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
      {{ ('Already registered?') }}
    </a>
  </div>
</div>
@endsection('content')