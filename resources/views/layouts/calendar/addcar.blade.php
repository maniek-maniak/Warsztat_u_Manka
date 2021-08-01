@extends('dashboard')

@section ('title')
  @if (isset($title))
    {{ " - ".$title }}
  @endif
@endsection ('title')

@section ('table')

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Numer rejestracyjny</th>
      <th scope="col">Marka</th>
      <th scope="col">Model</th>
      <th scope="col">Rok produkcji</th>
      <th scope="col">Umów się na wizytę</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($listCars as $car)
    @if ($car['id']>2)
        <tr>
          <th scope="row">{{$car['id']}}</th>
          <td>{{$car->carPlateNumber}}</a></td>
          <td>{{$car->brand}}</td>
          <td>{{$car->modell}}</td>
          <td>{{$car->yearOfProduction}}</td>

          <td><a href="{{ URL::to('calendar/' . $visit_id . '/' . $car->id )}}">{{'Wybież auto'}}</a></td>
        </tr>
     @endif
    @endforeach
  </tbody>
</table>
@endsection('table')
