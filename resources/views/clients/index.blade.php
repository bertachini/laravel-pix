@extends('template.fullpainel')

@section('title')
<title>Dashboard</title>
@endsection

@section('content')
<div class="container">
    <div class="row mt-3">
      <a href="{{ route('clients.new') }}" class="btn btn-primary">Novo Cliente</a>
    </div>
    <div class="row mt-3">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">CPF</th>
            <th scope="col">Telefone</th>
            <th scope="col">Acount</th>
            <th scope="col">Balanço</th>
            <th scope="col">Cidade</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($clients as $client)
          <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->cpf }}</td>
            <td>{{ $client->phone }}</td>
            <td>{{ $client->account_number }}</td>
            <td>{{ $client->balance }}</td>
            <td>{{ $client->city->name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
