@extends('template.fullpainel')

@section('title')
<title>Dashboard</title>
@endsection

@section('content')
<div class="container">
    <div class="row mt-3">
      <a href="{{ route('status.new') }}" class="btn btn-primary">Novo</a>
    </div>
    <div class="row mt-3">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($status as $status)
          <tr>
            <td>{{ $status->id }}</td>
            <td>{{ $status->name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection