@extends('template.fullpainel')

@section('title')
<title>Cities</title>
@endsection

@section('content')
<div class="container">
    <div class="row mt-3">
      <a href="{{ route('cities.new') }}" class="btn btn-primary">Nova Cidade</a>
    </div>
    <div class="row mt-3">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Estado</th>
            <th scope="col">País</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($cities as $city)
          <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->name }}</td>
            <td>{{ $city->state }}</td>
            <td>{{ $city->country }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection