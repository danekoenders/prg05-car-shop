@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Car page</h1>

        <ul>
            <li><h3>{{ $car->brand }}</h3></li>
            <li><h4>{{ $car->model }}</h4></li>
            <li>{{ $car->engine }}</li>
            <li>{{ $car->transmission }}</li>
            <li>{{ $car->options }}</li>
            <li>{{ $car->price }}</li>
        </ul>

        <a href="{{route('cars.index')}}">Terug naar de Cars page</a>
    </div>
</div>
@endsection
