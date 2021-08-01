@extends('dashboard')

@section ('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      Dodawanie nowego auta
    </div>
    <div class="card-body">
      <form action="/indices" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Indeks:</label>
            <input type="text" class="form-control" name="index">

            <label for="name">Nazwa:</label>
            <input type="text" class="form-control" name="shortName">

            <label for="name">Opis:</label>
            <input type="text" class="form-control" name="fullName">

            <label for="name">Nazwa u dostawcy:</label>
            <input type="text" class="form-control" name="ProvName">

            <label for="name">Kod u dostawcy:</label>
            <input type="text" class="form-control" name="ProvCode">

            <label for="name">Jednostka:</label>
            <input type="text" class="form-control" name="unit">
          </div>
          
          <input type="submit" class="btn btn-primary" value="Zapisz">
      </form>
    </div>
  </div>
</div>
@endsection('content')
