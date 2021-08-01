@extends('start')

@section ('title')
  @if (isset($title))
    {{ " - ".$title }}
  @endif
@endsection ('title')

@section ('content')
<div class="container" style= "width: 30%">
<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="form-group" style="margin-top: 50px">
    <label for="exampleInputEmail1">Adres e-mail</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hasło</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Zaloguj się</button>
</form>
  <div style= "margin-top: 10px">
    <label for="exampleInputPassword1">Nie masz konta </label>
    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Zarejestruj się</a>
  </div>
</div>
@endsection('content')
