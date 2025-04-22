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
      @foreach ($transactions as $transaction)
        <div class="transacao-card">
          <div class="transacao-info">
              <span class="label">ID de Transação</span><br />
              <span class="valor">{{$transaction->id}}</span>
          </div>
          <div class="card-secondary pagador">
              <span class="label">Pagador</span><br />
              <span class="valor">{{ $transaction->client->name }}</span>
          </div>
          <div class="card-secondary recebedor">
              <span class="label">Recebedor</span><br />
              <span class="valor">{{ $transaction->company->company_name }}</span>
          </div>
          <div class="card-secondary amount">
              <span class="label">Valor</span><br />
              <span class="valor">R$ {{ $transaction->amount }}</span>
          </div>
          <div class="card-status">
              @if ($transaction->transactionStatus->name == 'pending')
              <span class="status status-pending">Pendente</span>
              @elseif ($transaction->transactionStatus->name == 'approved')
              <span class="status status-approved">Aprovada</span>
              @elseif ($transaction->transactionStatus->name == 'rejected')
              <span class="status status-rejected">Rejeitada</span>
              @endif
          </div>
          <div class="transacao-acoes">
              @if ($transaction->transactionStatus->name == 'pending')
              <a class="btn-aprovar fa-solid fa-file-circle-check" href="{{ route('transactions.approve', $transaction->id) }}"></a>
              <a class="btn-reprovar fa-solid fa-file-circle-xmark" href="{{ route('transactions.reject', $transaction->id) }}"></a>
              @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection