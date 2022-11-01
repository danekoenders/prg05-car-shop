@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Admin page</h1>

            <a href="{{route('cars.create')}}" class="btn btn-primary">Create</a>

            <table>
                @foreach ($cars as $car)

                    <tr>
                        <td>{{$car['brand']}}</td>
                        <td>{{$car['model']}}</td>
                        <td>{{$car['engine']}}</td>
                        <td>{{$car['transmission']}}</td>
                        <td>{{$car['options']}}</td>
                        <td>{{$car['price']}}</td>
                        <td>
                            @if($car['status'] === 0)
                                <form action="{{ route('admin.status')}}" method="post">
                                    @csrf {{ csrf_field() }}
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $car->id }}">
                                    <input type="hidden" name="status" value="1">
                                    <button class="btn btn-secondary" type="submit">Disabled</button>
                                </form>
                            @else
                                <form action="{{ route('admin.status')}}" method="post">
                                    @csrf {{ csrf_field() }}
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $car->id }}">
                                    <input type="hidden" name="status" value="0">
                                    <button class="btn btn-primary" type="submit">Enabled</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('cars.edit', $car->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('cars.destroy', $car->id)}}" method="post">
                                @csrf {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

            </table>

            <a href="{{route('cars.index')}}">Terug naar de Car page</a>
        </div>
    </div>
@endsection
