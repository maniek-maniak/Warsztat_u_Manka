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
      <th scope="col">Data</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($visits as $visit)
        <tr>
          <td>{{$visit->date.' '.$visit->time}}</td>
          <td>{{$visit->car->carPlateNumber}}</td>
          <td>{{$visit->car->brand}}</td>
          <td>{{$visit->car->modell}}</td>
          <td>{{$visit->car->yerOfProduction}}</td>          
          <td>{{$visit->comments}}</td>
          @if ($visit->car->id == 2 )
            <td><a href="{{ URL::to('calendar/' . $visit->id . '/' . $car_id )}}">{{'Zarezerwuj'}}</a></td>
          @endif
        </tr>
    @endforeach
  </tbody>
</table>
@endsection('table')
