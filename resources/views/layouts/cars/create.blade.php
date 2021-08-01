@extends('dashboard')

@section ('title')
  @if (isset($title))
    {{ " - ".$title }}
  @endif
@endsection ('title')

@section ('form')
<div class="container">
  <div class="card" style= "margin-top: 20px">
    <div class="card-header">
      Dodawanie nowego auta
    </div>
    <div class="card-body">
      <form action="/addcar" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Numer rejestracyjny:</label>
            <input type="text" class="form-control" name="carPlateNumber">

            <label for="name">Marka:</label>
            <input type="text" class="form-control" name="brand">

            <label for="name">Model:</label>
            <input type="text" class="form-control" name="modell">

            <label for="name">Rok produkcji:</label>
            <input type="number" class="form-control" name="yearOfProduction">

          </div>
          
          <input type="submit" class="btn btn-primary" value="Zapisz">
      </form>
    </div>
  </div>
</div>
@endsection('form')
