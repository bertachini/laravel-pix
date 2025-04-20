@extends('template.fullpainel')

@section('title')
<title>Dashboard</title>
@endsection

@section('content')
<div class="container">
    <div class="row mt-3">
      <a href="{{ route('transactions.new') }}" class="btn btn-primary">Nova Transação</a>
    </div>
    <div class="row mt-3">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Empresa Parceira</th>
            <th scope="col">Cliente</th>
            <th scope="col">Valor</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transactions as $transaction)
          <tr>
            <td>{{ $transaction->id }}</td>
            <td>{{ $transaction->company->company_name }}</td>
            <td>{{ $transaction->client->name }}</td>
            <td>{{ $transaction->amount }}</td>
            <td>{{ $transaction->transactionStatus->name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection