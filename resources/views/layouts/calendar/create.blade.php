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
      {{$title}}
    </div>
    <div class="card-body">
      <form action="/addnewterm" method="POST">
          @csrf
          <div class="form-group">
            <label for="name">Data godzina wizyty:</label>
            <input type="Date" class="form-control" name="date">

            <label for="name">Marka:</label>
            <input type="Time" class="form-control" name="time">


          </div>
          
          <input type="submit" class="btn btn-primary" value="Zapisz">
      </form>
    </div>
  </div>
</div>
@endsection('form')
